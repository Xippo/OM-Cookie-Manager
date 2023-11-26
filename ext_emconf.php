<?php


$EM_CONF[$_EXTKEY] = [
    'title' => 'Cookie manager - Consent Panel (Optin)',
    'description' => 'Features: Consent Panel (Optin), Grouping and Google Tag Manager support. With this Extension you can manage the script/html tags that generates cookies on your site or simply build a consent panel. You can creat different groups like essential, tracking, preferences and so on. The associated scripts will be loaded only after the optin process is done.',
    'category' => 'plugin',
    'author' => 'Oliver Pfaff',
    'author_email' => 'info@olli-machts.de',
    'state' => 'stable',
    'uploadfolder' => 0,
    'createDirs' => '',
    'clearCacheOnLoad' => 0,
    'version' => '11.0.1',
    'constraints' => [
        'depends' => [
            'typo3' => '7.6.0-11.5.99',
        ],
        'conflicts' => [],
        'suggests' => [],
    ],
];
