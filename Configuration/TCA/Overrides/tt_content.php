<?php
defined('TYPO3') || die('Access denied.');

call_user_func(
    function()
    {
        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
            'OmCookieManager',
            'Info',
            'LLL:EXT:om_cookie_manager/Resources/Private/Language/locallang_db.xlf:tx_om_cookie_manager_info.name'
        );
    }
);
