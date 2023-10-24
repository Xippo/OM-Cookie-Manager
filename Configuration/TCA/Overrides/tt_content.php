<?php
defined('TYPO3') || die('Access denied.');

call_user_func(
    function()
    {
        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
            'OM.OmCookieManager',
            'Main',
            'OM Cookie Manager'
        );
    }
);
