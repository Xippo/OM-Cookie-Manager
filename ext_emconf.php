<?php
$EM_CONF[$_EXTKEY] = [
    'title' => 'Cookie manager - Consent Panel (Optin)',
    'description' => 'Features: Consent Panel (Optin), Grouping and Google Tag Manager support. With this Extension you can manage the script/html tags that generates cookies on your site or simply build a consent panel. You can creat different groups like essential, tracking, preferences and so on. The associated scripts will be loaded only after the optin process is done.',
    'category' => 'plugin',
    'constraints' => [
        'depends' => [
            'typo3' => '11.5.0-12.4.99',
        ],
        'conflicts' => [],
        'suggests' => [],
    ],
    'author' => 'Oliver Pfaff',
    'author_email' => 'info@olli-machts.de',
    'state' => 'beta',
    'uploadfolder' => 0,
    'createDirs' => '',
    'clearCacheOnLoad' => 0,
    'version' => '12.0.0',
];
