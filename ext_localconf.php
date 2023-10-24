<?php

defined('TYPO3') || die();

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'OmCookieManager',
    'Main',
    [
        \OM\OmCookieManager\Controller\CookiePanelController::class => 'show',
    ],
    // non-cacheable actions
    []
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'OmCookieManager',
    'Info',
    [
        \OM\OmCookieManager\Controller\CookiePanelController::class => 'info',
    ],
    // non-cacheable actions
    []
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
                info {
                    iconIdentifier = om_cookie_manager-plugin-main
                    title = LLL:EXT:om_cookie_manager/Resources/Private/Language/locallang_db.xlf:tx_om_cookie_manager_main.name
                    description = LLL:EXT:om_cookie_manager/Resources/Private/Language/locallang_db.xlf:tx_om_cookie_manager_main.description
                    tt_content_defValues {
                        CType = list
                        list_type = omcookiemanager_info
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

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_omcookiemanager_domain_model_cookie', 'EXT:om_cookie_manager/Resources/Private/Language/locallang_csh_tx_omcookiemanager_domain_model_cookie.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_omcookiemanager_domain_model_cookie');
$GLOBALS['TCA']['tx_omcookiemanager_domain_model_cookie']['ctrl']['security']['ignorePageTypeRestriction'] = true;

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_omcookiemanager_domain_model_cookiegroup', 'EXT:om_cookie_manager/Resources/Private/Language/locallang_csh_tx_omcookiemanager_domain_model_cookiegroup.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_omcookiemanager_domain_model_cookiegroup');
$GLOBALS['TCA']['tx_omcookiemanager_domain_model_cookiegroup']['ctrl']['security']['ignorePageTypeRestriction'] = true;

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_omcookiemanager_domain_model_cookiepanel', 'EXT:om_cookie_manager/Resources/Private/Language/locallang_csh_tx_omcookiemanager_domain_model_cookiepanel.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_omcookiemanager_domain_model_cookiepanel');
$GLOBALS['TCA']['tx_omcookiemanager_domain_model_cookiepanel']['ctrl']['security']['ignorePageTypeRestriction'] = true;

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_omcookiemanager_domain_model_cookiehtml', 'EXT:om_cookie_manager/Resources/Private/Language/locallang_csh_tx_omcookiemanager_domain_model_cookiehtml.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_omcookiemanager_domain_model_cookiehtml');
$GLOBALS['TCA']['tx_omcookiemanager_domain_model_cookiehtml']['ctrl']['security']['ignorePageTypeRestriction'] = true;
