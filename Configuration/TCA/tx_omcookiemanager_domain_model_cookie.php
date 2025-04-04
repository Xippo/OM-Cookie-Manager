<?php
return [
    'ctrl' => [
        'title' => 'LLL:EXT:om_cookie_manager/Resources/Private/Language/locallang_db.xlf:tx_omcookiemanager_domain_model_cookie',
        'label' => 'name',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'versioningWS' => true,
        'languageField' => 'sys_language_uid',
        'transOrigPointerField' => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
        'delete' => 'deleted',
        'enablecolumns' => [
            'disabled' => 'hidden',
            'starttime' => 'starttime',
            'endtime' => 'endtime',
        ],
        'searchFields' => 'name,description,lifetime,provider',
        'iconfile' => 'EXT:om_cookie_manager/Resources/Public/Icons/Extension.svg'
    ],
    'types' => [
        '1' => ['showitem' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, name, description, lifetime, provider, cookie_group, cookie_html'],
    ],
    'columns' => [
        'sys_language_uid' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.language',
            'config' => [
                'type' => 'language'
            ],
        ],
        'l10n_parent' => [
            'displayCond' => 'FIELD:sys_language_uid:>:0',
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.l18n_parent',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'default' => 0,
                'items' => [],
                'foreign_table' => 'tx_omcookiemanager_domain_model_cookie',
                'foreign_table_where' => 'AND {#tx_omcookiemanager_domain_model_cookie}.{#pid}=###CURRENT_PID### AND {#tx_omcookiemanager_domain_model_cookie}.{#sys_language_uid} IN (-1,0)',
            ],
        ],
        'l10n_diffsource' => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],
        't3ver_label' => [
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.versionLabel',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'max' => 255,
            ],
        ],
        'hidden' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.visible',
            'config' => [
                'type' => 'check',
                'renderType' => 'checkboxToggle',
                'items' => [
                    [
                        'label' => '',
                        'invertStateDisplay' => true
                    ]
                ],
            ],
        ],
        'starttime' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.starttime',
            'config' => [
                'type' => 'input',
                'renderType' => 'datetime',
                'default' => 0,
                'behaviour' => [
                    'allowLanguageSynchronization' => true
                ]
            ],
        ],
        'endtime' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.endtime',
            'config' => [
                'type' => 'input',
                'renderType' => 'datetime',
                'default' => 0,
                'range' => [
                    'upper' => mktime(0, 0, 0, 1, 1, 2038)
                ],
                'behaviour' => [
                    'allowLanguageSynchronization' => true
                ]
            ],
        ],

        'name' => [
            'exclude' => true,
            'label' => 'LLL:EXT:om_cookie_manager/Resources/Private/Language/locallang_db.xlf:tx_omcookiemanager_domain_model_cookie.name',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
                'required' => true
            ],
        ],
        'description' => [
            'exclude' => true,
            'label' => 'LLL:EXT:om_cookie_manager/Resources/Private/Language/locallang_db.xlf:tx_omcookiemanager_domain_model_cookie.description',
            'config' => [
                'type' => 'text',
                'enableRichtext' => true,
                'richtextConfiguration' => 'default',
                'fieldControl' => [
                    'fullScreenRichtext' => [
                        'disabled' => false,
                    ],
                ],
                'cols' => 40,
                'rows' => 15,
                'eval' => 'trim',
            ],
            
        ],
        'lifetime' => [
            'exclude' => true,
            'label' => 'LLL:EXT:om_cookie_manager/Resources/Private/Language/locallang_db.xlf:tx_omcookiemanager_domain_model_cookie.lifetime',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'provider' => [
            'exclude' => true,
            'label' => 'LLL:EXT:om_cookie_manager/Resources/Private/Language/locallang_db.xlf:tx_omcookiemanager_domain_model_cookie.provider',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'cookie_html' => [
            'exclude' => true,
            'label' => 'LLL:EXT:om_cookie_manager/Resources/Private/Language/locallang_db.xlf:tx_omcookiemanager_domain_model_cookie.cookie_html',
            'config' => [
                'type' => 'inline',
                'foreign_table' => 'tx_omcookiemanager_domain_model_cookiehtml',
                'foreign_field' => 'cookie',
                'maxitems' => 9999,
                'appearance' => [
                    'collapseAll' => 0,
                    'levelLinksPosition' => 'top',
                    'showSynchronizationLink' => 1,
                    'showPossibleLocalizationRecords' => 1,
                    'showAllLocalizationLink' => 1
                ],
            ],
        ],
    
        'cookiegroup' => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],
    ],
];
