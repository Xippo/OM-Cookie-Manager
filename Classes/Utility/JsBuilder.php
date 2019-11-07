<?php
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

namespace OM\OmCookieManager\Utility;


use OM\OmCookieManager\Domain\Model\Cookie;
use OM\OmCookieManager\Domain\Model\CookieGroup;
use OM\OmCookieManager\Domain\Model\CookieHtml;
use TYPO3\CMS\Core\Database\Query\Restriction\QueryRestrictionInterface;
use TYPO3\CMS\Extbase\Persistence\QueryInterface;
use TYPO3\CMS\Extbase\Utility\DebuggerUtility;

class JsBuilder
{
    /**
     * @param $groups array|QueryRestrictionInterface
     */
    public static function buildCompleteGrpJson($groups)
    {
        $grpArray = [];
        /** @var CookieGroup $group */
        foreach ($groups as $group){
            if (is_object($group->getCookies()) || $group->getCookies()->count() > 0){
                $grpArray['group-' . $group->getUid()]['gtm'] = $group->getGtmEventName();
                /** @var Cookie $cookie */
                foreach ($group->getCookies() as $cookie){
                    if (is_object($cookie->getCookieHtml()) || $cookie->getCookieHtml()->count() > 0){
                        /** @var CookieHtml $html */
                        foreach ($cookie->getCookieHtml() as $html){
                            $grpArray['group-' . $group->getUid()]['cookie-'.$cookie->getUid()][$html->getInsertPlace() === 0 ? 'header' : 'body'][] = $html->getHtml();
                        }
                    }
                }
            }
        }
        return json_encode($grpArray);
    }
}