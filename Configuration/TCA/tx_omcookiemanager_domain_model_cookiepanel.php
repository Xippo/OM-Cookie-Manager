<?php
return [
    'ctrl' => [
        'title' => 'LLL:EXT:om_cookie_manager/Resources/Private/Language/locallang_db.xlf:tx_omcookiemanager_domain_model_cookiepanel',
        'label' => 'name',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
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
        'searchFields' => 'name,description,link',
        'iconfile' => 'EXT:om_cookie_manager/Resources/Public/Icons/cookie_panel_icon.svg'
    ],
    'types' => [
        '1' => ['showitem' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, name, description, link, link_text, link_legal_notice, link_legal_notice_text, groups'],
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
                'items' => [
                    ['', 0],
                ],
                'foreign_table' => 'tx_omcookiemanager_domain_model_cookiepanel',
                'foreign_table_where' => 'AND tx_omcookiemanager_domain_model_cookiepanel.pid=###CURRENT_PID### AND tx_omcookiemanager_domain_model_cookiepanel.sys_language_uid IN (-1,0)',
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
                        0 => '',
                        1 => '',
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
                'renderType' => 'inputDateTime',
                'eval' => 'datetime,int',
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
                'renderType' => 'inputDateTime',
                'eval' => 'datetime,int',
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
            'label' => 'LLL:EXT:om_cookie_manager/Resources/Private/Language/locallang_db.xlf:tx_omcookiemanager_domain_model_cookiepanel.name',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim,required'
            ],
        ],
        'description' => [
            'exclude' => true,
            'label' => 'LLL:EXT:om_cookie_manager/Resources/Private/Language/locallang_db.xlf:tx_omcookiemanager_domain_model_cookiepanel.description',
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
        'link' => [
            'exclude' => true,
            'label' => 'LLL:EXT:om_cookie_manager/Resources/Private/Language/locallang_db.xlf:tx_omcookiemanager_domain_model_cookiepanel.link',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputLink',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'link_text' => [
            'exclude' => true,
            'label' => 'LLL:EXT:om_cookie_manager/Resources/Private/Language/locallang_db.xlf:tx_omcookiemanager_domain_model_cookiepanel.link_text',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'link_legal_notice' => [
            'exclude' => true,
            'label' => 'LLL:EXT:om_cookie_manager/Resources/Private/Language/locallang_db.xlf:tx_omcookiemanager_domain_model_cookiepanel.link_legal_notice',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputLink',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'link_legal_notice_text' => [
            'exclude' => true,
            'label' => 'LLL:EXT:om_cookie_manager/Resources/Private/Language/locallang_db.xlf:tx_omcookiemanager_domain_model_cookiepanel.link_legal_notice_text',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'groups' => [
            'exclude' => true,
            'label' => 'LLL:EXT:om_cookie_manager/Resources/Private/Language/locallang_db.xlf:tx_omcookiemanager_domain_model_cookiepanel.groups',
            'config' => [
                'type' => 'select',
                'maxitems' => 99,
                'renderType' => 'selectMultipleSideBySide',
                'foreign_table' => 'tx_omcookiemanager_domain_model_cookiegroup',
                'foreign_table_where' => 'AND tx_omcookiemanager_domain_model_cookiegroup.sys_language_uid = ###REC_FIELD_sys_language_uid###',
            ],
        ],
    ],
];
