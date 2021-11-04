<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function()
    {
        if (\TYPO3\CMS\Core\Utility\VersionNumberUtility::convertVersionNumberToInteger(\TYPO3\CMS\Core\Utility\VersionNumberUtility::getCurrentTypo3Version()) < 10004000){
            \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
                'OM.OmCookieManager',
                'Main',
                [
                    'CookiePanel' => 'info'
                ],
                // non-cacheable actions
                [
                    'Cookie' => '',
                ]
            );
        } else {
            \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
                'OM.OmCookieManager',
                'Main',
                [
                    \OM\OmCookieManager\Controller\CookiePanelController::class => 'info'
                ],
                // non-cacheable actions
                [
                    'Cookie' => '',
                ]
            );
        }

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
        $GLOBALS ['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_tcemain.php']['processCmdmapClass'][] = \OM\OmCookieManager\Hook\ProcessCmdmapClass::class;

    }
);
