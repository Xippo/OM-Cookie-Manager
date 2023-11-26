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
use TYPO3\CMS\Core\Configuration\ExtensionConfiguration;
use TYPO3\CMS\Core\Database\Query\Restriction\QueryRestrictionInterface;
use TYPO3\CMS\Extbase\Mvc\RequestInterface;
use TYPO3\CMS\Frontend\Controller\TypoScriptFrontendController;

class JsBuilder
{
    private static $flatSetup = [];

    /**
     * @param $groups array|QueryRestrictionInterface
     */
    public static function buildCompleteGrpJson($groups, RequestInterface $request)
    {
        $grpArray = [];
        $fetchTsConstants = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(ExtensionConfiguration::class)->get('om_cookie_manager', 'injectTsConstants');
        if((int)$fetchTsConstants === 1){
            /** @var TypoScriptFrontendController $frontendController */
            $frontendController = $request->getAttribute('frontend.controller');
            self::$flatSetup = $frontendController->tmpl->flatSetup;;
        }
        /** @var CookieGroup $group */
        foreach ($groups as $group){
            if (is_object($group->getCookies()) || $group->getCookies()->count() > 0){
                $grpArray['group-' . $group->getUid()]['gtm'] = $group->getGtmEventName();
                /** @var Cookie $cookie */
                foreach ($group->getCookies() as $cookie){
                    if (is_object($cookie->getCookieHtml()) || $cookie->getCookieHtml()->count() > 0){
                        /** @var CookieHtml $html */
                        foreach ($cookie->getCookieHtml() as $html){
                            $cookieHtmlCode = $html->getHtml();
                            if((int)$fetchTsConstants === 1){
                                $cookieHtmlCode = self::substituteConstants($html->getHtml());
                            }
                            $grpArray['group-' . $group->getUid()]['cookie-'.$cookie->getUid()][$html->getInsertPlace() === 0 ? 'header' : 'body'][] = $cookieHtmlCode;
                        }
                    }
                }
            }
        }
        return json_encode($grpArray);
    }

    /**
     * @param $subject
     *
     * @return string
     */
    private static function substituteConstants($subject)
    {
        $noChange = false;
        for ($i = 0; $i < 10 && !$noChange; $i++) {
            $oldSubject = $subject;
            $subject = preg_replace_callback('/\\{\\$(.[^}]*)\\}/', function ($matches) {
                $flatSetup = JsBuilder::$flatSetup;
                // Replace {$CONST} if found in $this->flatSetup, else leave unchanged
                return isset($flatSetup[$matches[1]]) && !is_array($flatSetup[$matches[1]]) ? $flatSetup[$matches[1]] : $matches[0];
            }, $subject);
            if ($oldSubject == $subject) {
                $noChange = true;
            }
        }
        return $subject;
    }
}
