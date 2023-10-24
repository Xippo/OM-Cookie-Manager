<?php
defined('TYPO3') || die('Access denied.');

call_user_func(
    function()
    {
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('mod.web_list.hideTables =  tx_omcookiemanager_domain_model_cookie,tx_omcookiemanager_domain_model_cookiehtml' . PHP_EOL . ' mod.web_list.deniedNewTables = tx_omcookiemanager_domain_model_cookie,tx_omcookiemanager_domain_model_cookiehtml');
    }
);
