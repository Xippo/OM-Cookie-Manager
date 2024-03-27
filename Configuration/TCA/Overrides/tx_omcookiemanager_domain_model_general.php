<?php

$GLOBALS['TCA']['tx_omcookiemanager_domain_model_cookie']['ctrl']['security']['ignorePageTypeRestriction'] = true;
$GLOBALS['TCA']['tx_omcookiemanager_domain_model_cookiegroup']['ctrl']['security']['ignorePageTypeRestriction'] = true;
$GLOBALS['TCA']['tx_omcookiemanager_domain_model_cookiepanel']['ctrl']['security']['ignorePageTypeRestriction'] = true;
$GLOBALS['TCA']['tx_omcookiemanager_domain_model_cookiehtml']['ctrl']['security']['ignorePageTypeRestriction'] = true;

$versionInformation = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Information\Typo3Version::class);

if($versionInformation->getMajorVersion() < 12){

}
