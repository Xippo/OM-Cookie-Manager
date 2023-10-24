<?php
namespace OM\OmCookieManager\Domain\Repository;


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
/**
 * The repository for CookiePanels
 */
class CookiePanelRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{

    public function initializeObject() {
        //set default translation behavior. So we hopefully avoid problems with different system settings
        $querySettings = $this->createQuery()->getQuerySettings();
        $this->setDefaultQuerySettings($querySettings);
    }
}
