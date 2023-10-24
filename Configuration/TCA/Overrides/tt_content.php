<?php
defined('TYPO3') || die('Access denied.');

call_user_func(
    function()
    {
        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
            'OmCookieManager',
            'Main',
            'OM Cookie Manager'
        );
        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
            'OmCookieManager',
            'Info',
            'OM Cookie Manager - Info'
        );
    }
);
