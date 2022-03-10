<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function()
    {

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('mod.web_list.hideTables =  tx_omcookiemanager_domain_model_cookie,tx_omcookiemanager_domain_model_cookiehtml' . PHP_EOL . ' mod.web_list.deniedNewTables = tx_omcookiemanager_domain_model_cookie,tx_omcookiemanager_domain_model_cookiehtml');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_omcookiemanager_domain_model_cookie', 'EXT:om_cookie_manager/Resources/Private/Language/locallang_csh_tx_omcookiemanager_domain_model_cookie.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_omcookiemanager_domain_model_cookie');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_omcookiemanager_domain_model_cookiegroup', 'EXT:om_cookie_manager/Resources/Private/Language/locallang_csh_tx_omcookiemanager_domain_model_cookiegroup.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_omcookiemanager_domain_model_cookiegroup');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_omcookiemanager_domain_model_cookiepanel', 'EXT:om_cookie_manager/Resources/Private/Language/locallang_csh_tx_omcookiemanager_domain_model_cookiepanel.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_omcookiemanager_domain_model_cookiepanel');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_omcookiemanager_domain_model_cookiehtml', 'EXT:om_cookie_manager/Resources/Private/Language/locallang_csh_tx_omcookiemanager_domain_model_cookiehtml.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_omcookiemanager_domain_model_cookiehtml');

    }
);
