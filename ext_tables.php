<?php

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
    '
    mod.web_list { 
        hideTables = tx_omcookiemanager_domain_model_cookie,tx_omcookiemanager_domain_model_cookiehtml 
        deniedNewTables = tx_omcookiemanager_domain_model_cookie,tx_omcookiemanager_domain_model_cookiehtml
    }
    '
);

// page module conditions
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
    '
    [traverse(page, "module") == "omCookieManager"]
        mod.web_list.allowedNewTables = tx_omcookiemanager_domain_model_cookiegroup, tx_omcookiemanager_domain_model_cookiehtml, tx_omcookiemanager_domain_model_cookiepanel
        mod.web_list.hideTables = tx_omcookiemanager_domain_model_cookie, tx_omcookiemanager_domain_model_cookiehtml
    [global]
    [traverse(page, "module") == "omCookieManager_Groups"]
        mod.web_list.allowedNewTables = tx_omcookiemanager_domain_model_cookiegroup, tx_omcookiemanager_domain_model_cookie
        mod.web_list.hideTables = tx_omcookiemanager_domain_model_cookiehtml 
    [global]
    '
);

//compatibility to TYPO3 11 @todo migrate in TYPO3 13
// @extensionScannerIgnoreLine
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_omcookiemanager_domain_model_cookiehtml');
// @extensionScannerIgnoreLine
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_omcookiemanager_domain_model_cookie');
// @extensionScannerIgnoreLine
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_omcookiemanager_domain_model_cookiegroup');
// @extensionScannerIgnoreLine
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_omcookiemanager_domain_model_cookiepanel');
