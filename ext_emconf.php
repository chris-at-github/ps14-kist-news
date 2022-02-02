<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'Ps14 News',
    'description' => '',
    'category' => 'plugin',
    'author' => 'Christian Pschorr',
    'author_email' => 'pschorr.christian@gmail.com',
    'state' => 'alpha',
    'clearCacheOnLoad' => 0,
    'version' => '1.0.0',
    'constraints' => [
        'depends' => [
            'typo3' => '10.4.0-10.4.99',
            'news' => '9.2.0-9.2.99',
        ],
        'conflicts' => [],
        'suggests' => [],
    ],
];
