<?php
// < typo3 9
if(\TYPO3\CMS\Core\Utility\VersionNumberUtility::convertVersionNumberToInteger(\TYPO3\CMS\Core\Utility\VersionNumberUtility::getCurrentTypo3Version()) < 9005000){
    unset($GLOBALS['TCA']['tx_omcookiemanager_domain_model_cookiepanel']['columns']['hidden']['config']['renderType']);
    $GLOBALS['TCA']['tx_omcookiemanager_domain_model_cookiepanel']['columns']['hidden']['label'] = 'LLL:EXT:lang/locallang_general.xlf:LGL.hidden';
    $GLOBALS['TCA']['tx_omcookiemanager_domain_model_cookiepanel']['columns']['sys_language_uid']['label'] = 'LLL:EXT:lang/locallang_general.xlf:LGL.language';
    $GLOBALS['TCA']['tx_omcookiemanager_domain_model_cookiepanel']['columns']['l10n_parent']['label'] = 'LLL:EXT:lang/locallang_general.xlf:LGL.l18n_parent';
    $GLOBALS['TCA']['tx_omcookiemanager_domain_model_cookiepanel']['columns']['t3ver_label']['label'] = 'LLL:EXT:lang/locallang_general.xlf:LGL.versionLabel';
}
// < typo3 8
if(\TYPO3\CMS\Core\Utility\VersionNumberUtility::convertVersionNumberToInteger(\TYPO3\CMS\Core\Utility\VersionNumberUtility::getCurrentTypo3Version()) < 8007000){
    unset($GLOBALS['TCA']['tx_omcookiemanager_domain_model_cookiepanel']['columns']['link']['config']['renderType']);
    $GLOBALS['TCA']['tx_omcookiemanager_domain_model_cookiepanel']['columns']['link']['config']['wizards'] = array(
        '_PADDING' => 2,
        'link' => array(
            'type' => 'popup',
            'title' => 'LLL:EXT:cms/locallang_ttc.xml:header_link_formlabel',
            'icon' => 'EXT:backend/Resources/Public/Images/FormFieldWizard/wizard_link.gif',
            'module' => array(
                'name' => 'wizard_element_browser',
                'urlParameters' => array(
                    'mode' => 'wizard',
                    'act' => 'page'
                )
            ),
            'JSopenParams' => 'height=300,width=500,status=0,menubar=0,scrollbars=1',
        ),
    );
    $GLOBALS['TCA']['tx_omcookiemanager_domain_model_cookiepanel']['columns']['link']['config']['softref'] = 'typolink';
    $GLOBALS['TCA']['tx_omcookiemanager_domain_model_cookiepanel']['columns']['l10n_parent']['config']['foreign_table_where'] = 'AND tx_omcookiemanager_domain_model_cookiepanel.pid=###CURRENT_PID### AND tx_omcookiemanager_domain_model_cookiepanel.sys_language_uid IN (-1,0)';

}