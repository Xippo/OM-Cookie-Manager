<?php

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('mod.web_list.hideTables = tx_omcookiemanager_domain_model_cookie,tx_omcookiemanager_domain_model_cookiehtml' . PHP_EOL . ' mod.web_list.deniedNewTables = tx_omcookiemanager_domain_model_cookie,tx_omcookiemanager_domain_model_cookiehtml');

//compatibility to TYPO3 11 @todo migrate in TYPO3 13
// @extensionScannerIgnoreLine
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_omcookiemanager_domain_model_cookiehtml');
// @extensionScannerIgnoreLine
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_omcookiemanager_domain_model_cookie');
// @extensionScannerIgnoreLine
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_omcookiemanager_domain_model_cookiegroup');
// @extensionScannerIgnoreLine
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_omcookiemanager_domain_model_cookiepanel');
