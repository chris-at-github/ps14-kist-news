<?php
defined('TYPO3_MODE') || die();

// ---------------------------------------------------------------------------------------------------------------------
// Neue Paletten
//$GLOBALS['TCA']['tx_news_domain_model_news']['palettes']['layout'] = [
//	'showitem' => 'layout,'
//];

//if (!isset($GLOBALS['TCA']['tx_news_domain_model_news']['ctrl']['type'])) {
//    // no type field defined, so we define it here. This will only happen the first time the extension is installed!!
//    $GLOBALS['TCA']['tx_news_domain_model_news']['ctrl']['type'] = 'tx_extbase_type';
//    $tempColumnstx_newsextended_tx_news_domain_model_news = [];
//    $tempColumnstx_newsextended_tx_news_domain_model_news[$GLOBALS['TCA']['tx_news_domain_model_news']['ctrl']['type']] = [
//        'exclude' => true,
//        'label' => 'LLL:EXT:news_extended/Resources/Private/Language/locallang_tca.xlf:tx_newsextended.tx_extbase_type',
//        'config' => [
//            'type' => 'select',
//            'renderType' => 'selectSingle',
//            'items' => [
//                ['', ''],
//                ['News', 'Tx_NewsExtended_News']
//            ],
//            'default' => 'Tx_NewsExtended_News',
//            'size' => 1,
//            'maxitems' => 1,
//        ]
//    ];
//    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('tx_news_domain_model_news', $tempColumnstx_newsextended_tx_news_domain_model_news);
//}
//
//\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes(
//    'tx_news_domain_model_news',
//    $GLOBALS['TCA']['tx_news_domain_model_news']['ctrl']['type'],
//    '',
//    'after:' . $GLOBALS['TCA']['tx_news_domain_model_news']['ctrl']['label']
//);

$tmpNewsColumns = [
	'tx_ps14_no_detail' => [
		'exclude' => true,
		'l10n_mode' => 'exclude',
		'label' => 'LLL:EXT:news_extended/Resources/Private/Language/locallang_tca.xlf:tx_newsextended_domain_model_news.tx_ps14_no_detail',
		'config' => [
			'type' => 'check',
			'renderType' => 'checkboxToggle',
			'items' => [
				[
					0 => '',
					1 => '',
				]
			],
			'default' => 0,
		]
	],
	'tx_ps14_location' => [
		'exclude' => true,
		'label' => 'LLL:EXT:news_extended/Resources/Private/Language/locallang_tca.xlf:tx_newsextended_domain_model_news.tx_ps14_location',
		'config' => [
			'type' => 'text',
			'cols' => 40,
			'rows' => 15,
			'eval' => 'trim',
			'default' => ''
		]
	],
	'tx_ps14_event_startdate' => [
		'exclude' => true,
		'l10n_mode' => 'exclude',
		'label' => 'LLL:EXT:news_extended/Resources/Private/Language/locallang_tca.xlf:tx_newsextended_domain_model_news.tx_ps14_event_startdate',
		'config' => [
			'dbType' => 'date',
			'type' => 'input',
			'renderType' => 'inputDateTime',
			'size' => 7,
			'eval' => 'date',
			'default' => null,
		],
	],
	'tx_ps14_event_enddate' => [
		'exclude' => true,
		'l10n_mode' => 'exclude',
		'label' => 'LLL:EXT:news_extended/Resources/Private/Language/locallang_tca.xlf:tx_newsextended_domain_model_news.tx_ps14_event_enddate',
		'config' => [
			'dbType' => 'date',
			'type' => 'input',
			'renderType' => 'inputDateTime',
			'size' => 7,
			'eval' => 'date',
			'default' => null,
		],
	],
	'tx_ps14_event_starttime' => [
		'exclude' => true,
		'l10n_mode' => 'exclude',
		'label' => 'LLL:EXT:news_extended/Resources/Private/Language/locallang_tca.xlf:tx_newsextended_domain_model_news.tx_ps14_event_starttime',
		'config' => [
			'type' => 'input',
			'renderType' => 'inputDateTime',
			'dbType' => 'time',
			'size' => 4,
			'eval' => 'time',
			'default' => null
		]
	],
	'tx_ps14_event_endtime' => [
		'exclude' => true,
		'l10n_mode' => 'exclude',
		'label' => 'LLL:EXT:news_extended/Resources/Private/Language/locallang_tca.xlf:tx_newsextended_domain_model_news.tx_ps14_event_endtime',
		'config' => [
			'type' => 'input',
			'renderType' => 'inputDateTime',
			'dbType' => 'time',
			'size' => 4,
			'eval' => 'time',
			'default' => null
		]
	],
	'tx_ps14_layout' => [
		'exclude' => true,
		'l10n_mode' => 'exclude',
		'label' => 'LLL:EXT:news_extended/Resources/Private/Language/locallang_tca.xlf:tx_newsextended_domain_model_news.tx_ps14_layout',
		'config' => [
			'type' => 'input',
			'size' => 30,
			'eval' => 'trim',
			'default' => ''
		],
	],

];

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('tx_news_domain_model_news', $tmpNewsColumns);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes('tx_news_domain_model_news', 'tx_ps14_no_detail, tx_ps14_no_detail, tx_ps14_event_startdate, tx_ps14_event_enddate, tx_ps14_event_starttime, tx_ps14_event_endtime, tx_ps14_layout,', '', 'after:notes');

$GLOBALS['TCA']['tx_news_domain_model_news']['columns']['type']['config']['items']['3'] =
	['Event', 3] ;

$GLOBALS['TCA']['tx_news_domain_model_news']['types']['3'] = [
	'showitem' => 'type, title, bodytext'
];

//// inherit and extend the show items from the parent class
//if (isset($GLOBALS['TCA']['tx_news_domain_model_news']['types']['1']['showitem'])) {
//    $GLOBALS['TCA']['tx_news_domain_model_news']['types']['Tx_NewsExtended_News']['showitem'] = $GLOBALS['TCA']['tx_news_domain_model_news']['types']['1']['showitem'];
//} elseif (is_array($GLOBALS['TCA']['tx_news_domain_model_news']['types'])) {
//    // use first entry in types array
//    $tx_news_domain_model_news_type_definition = reset($GLOBALS['TCA']['tx_news_domain_model_news']['types']);
//    $GLOBALS['TCA']['tx_news_domain_model_news']['types']['Tx_NewsExtended_News']['showitem'] = $tx_news_domain_model_news_type_definition['showitem'];
//} else {
//    $GLOBALS['TCA']['tx_news_domain_model_news']['types']['Tx_NewsExtended_News']['showitem'] = '';
//}
//$GLOBALS['TCA']['tx_news_domain_model_news']['types']['Tx_NewsExtended_News']['showitem'] .= ',--div--;LLL:EXT:news_extended/Resources/Private/Language/locallang_tca.xlf:tx_newsextended_domain_model_news,';
//$GLOBALS['TCA']['tx_news_domain_model_news']['types']['Tx_NewsExtended_News']['showitem'] .= 'tx_ps14_no_detail, tx_ps14_location, tx_ps14_event_startdate, tx_ps14_event_enddate, tx_ps14_event_starttime, tx_ps14_event_endtime, tx_ps14_layout';
//
//$GLOBALS['TCA']['tx_news_domain_model_news']['columns'][$GLOBALS['TCA']['tx_news_domain_model_news']['ctrl']['type']]['config']['items'][] = [
//    'LLL:EXT:news_extended/Resources/Private/Language/locallang_tca.xlf:tx_news_domain_model_news.tx_extbase_type.Tx_NewsExtended_News',
//    'Tx_NewsExtended_News'
//];

// ---------------------------------------------------------------------------------------------------------------------
// Konfigurationsanpassungen Global
$GLOBALS['TCA']['tx_news_domain_model_news']['columns']['fal_media']['config']['maxitems'] = 1;
$GLOBALS['TCA']['tx_news_domain_model_news']['columns']['fal_media']['config']['overrideChildTca']['columns']['showinpreview']['config']['default'] = 1;
$GLOBALS['TCA']['tx_news_domain_model_news']['columns']['fal_media']['config']['overrideChildTca']['columns']['crop']['config']['cropVariants'] = [
	'default' => [
		'title' => 'LLL:EXT:xo/Resources/Private/Language/locallang_tca.xlf:tx_xo_crop_variant.default',
		'allowedAspectRatios' => [
			'4_3' => [
				'title' => 'LLL:EXT:core/Resources/Private/Language/locallang_wizards.xlf:imwizard.ratio.4_3',
				'value' => 4 / 3
			],
			'16_9' => [
				'title' => 'LLL:EXT:core/Resources/Private/Language/locallang_wizards.xlf:imwizard.ratio.16_9',
				'value' => 16 / 9
			],
			'NaN' => [
				'title' => 'LLL:EXT:core/Resources/Private/Language/locallang_wizards.xlf:imwizard.ratio.free',
				'value' => 0.0
			],
		],
		'selectedRatio' => '4_3',
	],
	'thumbnail' => [
		'title' => 'LLL:EXT:xo/Resources/Private/Language/locallang_tca.xlf:tx_xo_crop_variant.thumbnail',
		'allowedAspectRatios' => [
			'16_9' => [
				'title' => 'LLL:EXT:core/Resources/Private/Language/locallang_wizards.xlf:imwizard.ratio.16_9',
				'value' => 16 / 9
			],
			'NaN' => [
				'title' => 'LLL:EXT:core/Resources/Private/Language/locallang_wizards.xlf:imwizard.ratio.free',
				'value' => 0.0
			],
		],
		'selectedRatio' => '16_9',
	],
];
