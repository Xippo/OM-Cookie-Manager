<?php
defined('TYPO3') || die('Access denied.');

call_user_func(
    function()
    {
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile('om_cookie_manager', 'Configuration/TypoScript', 'OM Cookie Manager');
    }
);
