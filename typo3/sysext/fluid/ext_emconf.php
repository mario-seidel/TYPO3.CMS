<?php
$EM_CONF[$_EXTKEY] = [
    'title' => 'Fluid Templating Engine',
    'description' => 'Fluid is a next-generation templating engine which makes the life of extension authors a lot easier!',
    'category' => 'fe',
    'author' => 'TYPO3 Core Team',
    'author_email' => 'typo3cms@typo3.org',
    'author_company' => '',
    'state' => 'stable',
    'createDirs' => '',
    'clearCacheOnLoad' => 0,
    'version' => '10.0.0',
    'constraints' => [
        'depends' => [
            'core' => '10.0.0',
            'extbase' => '10.0.0',
        ],
        'conflicts' => [],
        'suggests' => [],
    ],
];
