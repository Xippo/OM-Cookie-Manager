<?php
$boot = static function () {
    $GLOBALS['TCA']['tx_omcookiemanager_domain_model_cookie']['ctrl']['security']['ignorePageTypeRestriction'] = true;
    $GLOBALS['TCA']['tx_omcookiemanager_domain_model_cookiegroup']['ctrl']['security']['ignorePageTypeRestriction'] = true;
    $GLOBALS['TCA']['tx_omcookiemanager_domain_model_cookiepanel']['ctrl']['security']['ignorePageTypeRestriction'] = true;
    $GLOBALS['TCA']['tx_omcookiemanager_domain_model_cookiehtml']['ctrl']['security']['ignorePageTypeRestriction'] = true;

    $versionInformation = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Information\Typo3Version::class);

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns(
        'tx_omcookiemanager_domain_model_cookiegroup',
        [
            'gtm_consent_grps' => [
                'exclude' => true,
                'label' => 'LLL:EXT:om_cookie_manager/Resources/Private/Language/locallang_db.xlf:tx_omcookiemanager_domain_model_cookiegroup.gtm_groups',
                'description' => 'LLL:EXT:om_cookie_manager/Resources/Private/Language/locallang_db.xlf:tx_omcookiemanager_domain_model_cookiegroup.gtm_groups.description',
                'config' => [
                    'type' => 'select',
                    'maxitems' => 99,
                    'renderType' => 'selectMultipleSideBySide',
                    'items' => $versionInformation->getMajorVersion() < 12 ? [
                        [
                            'LLL:EXT:om_cookie_manager/Resources/Private/Language/locallang_db.xlf:tx_omcookiemanager_domain_model_cookiegroup.gtm_groups.ad_storage', 'ad_storage'
                        ],
                        [
                            'LLL:EXT:om_cookie_manager/Resources/Private/Language/locallang_db.xlf:tx_omcookiemanager_domain_model_cookiegroup.gtm_groups.ad_user_data', 'ad_user_data'
                        ],
                        [
                            'LLL:EXT:om_cookie_manager/Resources/Private/Language/locallang_db.xlf:tx_omcookiemanager_domain_model_cookiegroup.gtm_groups.ad_personalization', 'ad_personalization',
                        ],
                        [
                            'LLL:EXT:om_cookie_manager/Resources/Private/Language/locallang_db.xlf:tx_omcookiemanager_domain_model_cookiegroup.gtm_groups.analytics_storage', 'analytics_storage',
                        ],
                    ] : [
                        [
                            'label' => 'LLL:EXT:om_cookie_manager/Resources/Private/Language/locallang_db.xlf:tx_omcookiemanager_domain_model_cookiegroup.gtm_groups.ad_storage',
                            'value' => 'ad_storage',
                        ],
                        [
                            'label' => 'LLL:EXT:om_cookie_manager/Resources/Private/Language/locallang_db.xlf:tx_omcookiemanager_domain_model_cookiegroup.gtm_groups.ad_user_data',
                            'value' => 'ad_user_data',
                        ],
                        [
                            'label' => 'LLL:EXT:om_cookie_manager/Resources/Private/Language/locallang_db.xlf:tx_omcookiemanager_domain_model_cookiegroup.gtm_groups.ad_personalization',
                            'value' => 'ad_personalization',
                        ],
                        [
                            'label' => 'LLL:EXT:om_cookie_manager/Resources/Private/Language/locallang_db.xlf:tx_omcookiemanager_domain_model_cookiegroup.gtm_groups.analytics_storage',
                            'value' => 'analytics_storage',
                        ],
                    ],
                ],
            ],
        ]
    );
};
$boot();
unset($boot);
