<?php

defined('TYPO3') || die();

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'OmCookieManager',
    'Info',
    [
        \OM\OmCookieManager\Controller\CookiePanelController::class => 'show',
    ]
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'OmCookieManager',
    'Main',
    [
        \OM\OmCookieManager\Controller\CookiePanelController::class => 'info',
    ]
);

// wizards
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
    'mod {
        wizards.newContentElement.wizardItems.plugins {
            elements {
                main {
                    iconIdentifier = om_cookie_manager-plugin-main
                    title = LLL:EXT:om_cookie_manager/Resources/Private/Language/locallang_db.xlf:tx_om_cookie_manager_main.name
                    description = LLL:EXT:om_cookie_manager/Resources/Private/Language/locallang_db.xlf:tx_om_cookie_manager_main.description
                    tt_content_defValues {
                        CType = list
                        list_type = omcookiemanager_main
                    }
                }
            }
            show = *
        }
   }'
);

$iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);
$iconRegistry->registerIcon(
    'om_cookie_manager-plugin-main',
    \TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
    ['source' => 'EXT:om_cookie_manager/Resources/Public/Icons/Extension.svg']
);

// hook registration
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_tcemain.php']['processDatamapClass'][] = \OM\OmCookieManager\Hook\ProcessDatamapClass::class;
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_tcemain.php']['processCmdmapClass'][] = \OM\OmCookieManager\Hook\ProcessCmdmapClass::class;

