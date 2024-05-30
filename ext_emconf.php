<?php

$EM_CONF[$_EXTKEY] = [
	'title' => 'Ps14 Kist News',
	'description' => 'Extension of the news for Kist + Escherich',
	'category' => 'plugin',
	'author' => 'Christian Pschorr',
	'author_email' => 'pschorr.christian@gmail.com',
	'state' => 'beta',
	'clearCacheOnLoad' => 0,
	'uploadfolder' => 0,
	'version' => '2.0.0',
	'constraints' => [
		'depends' => [
			'typo3' => '12.0.0-12.4.99',
			'ps14_foundation' => '2.0.0-2.9.99',
			'news' => '11.4.0-11.9.99',
		],
		'conflicts' => [],
		'suggests' => [],
	],
];
