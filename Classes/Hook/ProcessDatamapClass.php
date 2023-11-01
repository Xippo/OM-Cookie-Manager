<?php

namespace OM\OmCookieManager\Hook;

use TYPO3\CMS\Core\Cache\CacheManager;
use TYPO3\CMS\Core\Configuration\ExtensionConfiguration;
use TYPO3\CMS\Core\DataHandling\DataHandler;
use TYPO3\CMS\Core\Utility\GeneralUtility;

/***
 *
 * This file is part of the "OM Cookie Manager " Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2019 Oliver Pfaff <info@olli-machts.de>, Olli machts
 *
 ***/

class ProcessDatamapClass
{
    /**
     * Generates the files out of the TCA data.
     *
     * @param DataHandler $dataHandler
     * @return void
     */
    public function processDatamap_afterAllOperations(DataHandler $dataHandler)
    {
        if (isset($dataHandler->datamap['tx_omcookiemanager_domain_model_cookiepanel']) === false && isset($dataHandler->datamap['tx_omcookiemanager_domain_model_cookiegroup']) === false) {
            return;
        }
        $clearCacheOpt = GeneralUtility::makeInstance(ExtensionConfiguration::class)->get('om_cookie_manager', 'clearCache');
        if((int)$clearCacheOpt === 1){
            /** @var CacheManager $cacheManager */
            $cacheManager = GeneralUtility::makeInstance(CacheManager::class);
            $cacheManager->flushCachesInGroup('pages');
            $GLOBALS['BE_USER']->writelog(4,0,0,15728,'Frontend Cache Clear by saving Om Cookie Panel or Group(OM Cookie manager)',[]);
        }
    }
}
