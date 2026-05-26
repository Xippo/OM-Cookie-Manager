<?php

defined('TYPO3') or die();

$GLOBALS['TCA']['pages']['columns']['module']['config']['items'][] = [
    'label' => 'Seite mit Cookie Plugins',
    'value' => 'omCookieManager',
    'icon' => 'EXT:om_cookie_manager/Resources/Public/Icons/Extension.svg',
];

$GLOBALS['TCA']['pages']['columns']['module']['config']['items'][] = [
    'label' => 'Seite mit Cookie Gruppen',
    'value' => 'omCookieManager_Groups',
    'icon' => 'EXT:om_cookie_manager/Resources/Public/Icons/Extension.svg',
];
