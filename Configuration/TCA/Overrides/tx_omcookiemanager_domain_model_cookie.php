<?php

if(\TYPO3\CMS\Core\Utility\VersionNumberUtility::convertVersionNumberToInteger(\TYPO3\CMS\Core\Utility\VersionNumberUtility::getCurrentTypo3Version()) < 9005000){
 unset($GLOBALS['TCA']['tx_omcookiemanager_domain_model_cookie']['columns']['hidden']['config']['renderType']);
    $GLOBALS['TCA']['tx_omcookiemanager_domain_model_cookie']['columns']['hidden']['label'] = 'LLL:EXT:lang/locallang_general.xlf:LGL.hidden';
    $GLOBALS['TCA']['tx_omcookiemanager_domain_model_cookie']['columns']['sys_language_uid']['label'] = 'LLL:EXT:lang/locallang_general.xlf:LGL.language';
    $GLOBALS['TCA']['tx_omcookiemanager_domain_model_cookie']['columns']['l10n_parent']['label'] = 'LLL:EXT:lang/locallang_general.xlf:LGL.l18n_parent';
    $GLOBALS['TCA']['tx_omcookiemanager_domain_model_cookie']['columns']['t3ver_label']['label'] = 'LLL:EXT:lang/locallang_general.xlf:LGL.versionLabel';
}
// < typo3 8
if(\TYPO3\CMS\Core\Utility\VersionNumberUtility::convertVersionNumberToInteger(\TYPO3\CMS\Core\Utility\VersionNumberUtility::getCurrentTypo3Version()) < 8007000){
    $GLOBALS['TCA']['tx_omcookiemanager_domain_model_cookie']['columns']['l10n_parent']['config']['foreign_table_where'] = 'AND tx_omcookiemanager_domain_model_cookie.pid=###CURRENT_PID### AND tx_omcookiemanager_domain_model_cookie.sys_language_uid IN (-1,0)';
}