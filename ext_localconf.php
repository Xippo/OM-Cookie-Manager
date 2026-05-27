<?php

declare(strict_types=1);

use TYPO3\CMS\Extbase\Utility\ExtensionUtility;
use OM\OmCookieManager\Controller\CookiePanelController;
use OM\OmCookieManager\Hook\ProcessDatamapClass;
use OM\OmCookieManager\Hook\ProcessCmdmapClass;

defined('TYPO3') || die();

ExtensionUtility::configurePlugin(
    'OmCookieManager',
    'Info',
    [
        CookiePanelController::class => 'show',
    ],
    [],
    ExtensionUtility::PLUGIN_TYPE_CONTENT_ELEMENT
);

ExtensionUtility::configurePlugin(
    'OmCookieManager',
    'Main',
    [
        CookiePanelController::class => 'info',
    ],
    [],
    ExtensionUtility::PLUGIN_TYPE_CONTENT_ELEMENT
);

// hook registration
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_tcemain.php']['processDatamapClass'][] = ProcessDatamapClass::class;
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_tcemain.php']['processCmdmapClass'][] = ProcessCmdmapClass::class;

