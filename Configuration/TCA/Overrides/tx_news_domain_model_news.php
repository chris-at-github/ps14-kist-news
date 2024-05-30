<?php

if(defined('TYPO3') === false) {
	die('Access denied.');
}

(function () {
	// -------------------------------------------------------------------------------------------------------------------
	// Weitere Felder in Pages
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('tt_content', [
		'tx_kist_news_no_detail' => [
			'exclude' => true,
			'l10n_mode' => 'exclude',
			'label' => 'LLL:EXT:ps14_kist_news/Resources/Private/Language/locallang_tca.xlf:news.no-detail',
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
		'tx_kist_news_location' => [
			'exclude' => true,
			'label' => 'LLL:EXT:ps14_kist_news/Resources/Private/Language/locallang_tca.xlf:news.location',
			'config' => [
				'type' => 'text',
				'cols' => 30,
				'rows' => 2,
				'eval' => 'trim',
				'default' => ''
			]
		],
		'tx_kist_news_event_startdate' => [
			'exclude' => true,
			'l10n_mode' => 'exclude',
			'label' => 'LLL:EXT:ps14_kist_news/Resources/Private/Language/locallang_tca.xlf:news.event-startdate',
			'config' => [
				'dbType' => 'date',
				'type' => 'input',
				'renderType' => 'inputDateTime',
				'size' => 7,
				'eval' => 'date',
				'default' => null,
			],
		],
		'tx_kist_news_event_enddate' => [
			'exclude' => true,
			'l10n_mode' => 'exclude',
			'label' => 'LLL:EXT:ps14_kist_news/Resources/Private/Language/locallang_tca.xlf:news.event-enddate',
			'config' => [
				'dbType' => 'date',
				'type' => 'input',
				'renderType' => 'inputDateTime',
				'size' => 7,
				'eval' => 'date',
				'default' => null,
			],
		],
		'tx_kist_news_event_starttime' => [
			'exclude' => true,
			'l10n_mode' => 'exclude',
			'label' => 'LLL:EXT:ps14_kist_news/Resources/Private/Language/locallang_tca.xlf:news.event-starttime',
			'config' => [
				'type' => 'input',
				'renderType' => 'inputDateTime',
				'dbType' => 'time',
				'size' => 4,
				'eval' => 'time',
				'default' => null
			]
		],
		'tx_kist_news_event_endtime' => [
			'exclude' => true,
			'l10n_mode' => 'exclude',
			'label' => 'LLL:EXT:ps14_kist_news/Resources/Private/Language/locallang_tca.xlf:news.event-endtime',
			'config' => [
				'type' => 'input',
				'renderType' => 'inputDateTime',
				'dbType' => 'time',
				'size' => 4,
				'eval' => 'time',
				'default' => null
			]
		],
		'tx_kist_news_layout' => [
			'exclude' => true,
			'l10n_mode' => 'exclude',
			'label' => 'LLL:EXT:ps14_kist_news/Resources/Private/Language/locallang_tca.xlf:news.layout',
			'config' => [
				'type' => 'select',
				'renderType' => 'selectSingle',
				'items' => [
					['LLL:EXT:ps14_kist_news/Resources/Private/Language/locallang_tca.xlf:news.layout.0', 0],
					['LLL:EXT:ps14_kist_news/Resources/Private/Language/locallang_tca.xlf:news.layout.1', 1],
					['LLL:EXT:ps14_kist_news/Resources/Private/Language/locallang_tca.xlf:news.layout.2', 2],
					['LLL:EXT:ps14_kist_news/Resources/Private/Language/locallang_tca.xlf:news.layout.3', 3],
					['LLL:EXT:ps14_kist_news/Resources/Private/Language/locallang_tca.xlf:news.layout.4', 4],
				],
			],
		],
	]);

	// -------------------------------------------------------------------------------------------------------------------
	// Neue Paletten hinzufuegen
	$GLOBALS['TCA']['tx_news_domain_model_news']['palettes']['eventDate'] = [
		'label' => 'LLL:EXT:ps14_kist_news/Resources/Private/Language/locallang_tca.xlf:news.palette.event-date',
		'showitem' => 'tx_kist_news_event_startdate, tx_kist_news_event_starttime, --linebreak--, tx_kist_news_event_enddate, tx_kist_news_event_endtime,'
	];

	$GLOBALS['TCA']['tx_news_domain_model_news']['palettes']['appearance'] = [
		'label' => 'LLL:EXT:ps14_kist_news/Resources/Private/Language/locallang_tca.xlf:news.palette.appearance',
		'showitem' => 'tx_kist_news_layout,'
	];

	$GLOBALS['TCA']['tx_news_domain_model_news']['palettes']['location'] = [
		'label' => 'LLL:EXT:ps14_kist_news/Resources/Private/Language/locallang_tca.xlf:news.palette.location',
		'showitem' => 'tx_kist_news_location,'
	];

	// -------------------------------------------------------------------------------------------------------------------
	// Felder im TCA einordnen
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes('tx_news_domain_model_news', 'tx_kist_news_layout,', '0, 1, 2', 'after:bodytext');
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes('tx_news_domain_model_news', 'tx_kist_news_no_detail,', '0, 1, 2', 'after:hidden');

	// -------------------------------------------------------------------------------------------------------------------
	// Neuer News Event-Type
	$GLOBALS['TCA']['tx_news_domain_model_news']['columns']['type']['config']['items']['3'] = ['Event', 3] ;
})();

//$GLOBALS['TCA']['tx_news_domain_model_news']['types']['3'] = [
//	'showitem' => '
//		--palette--;;paletteCore,title,--palette--;;paletteSlug,teaser,
//			internalurl,
//			--palette--;;eventDate,
//			--palette--;;location,
//			--palette--;;appearance,
//		--div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.media,
//			fal_media,
//		--div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:categories,
//			categories,
//		--div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:language,
//			--palette--;;paletteLanguage,
//		--div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access,
//			--palette--;;paletteHidden, tx_kist_news_no_detail,
//			--palette--;;paletteAccess,
//		--div--;LLL:EXT:news/Resources/Private/Language/locallang_db.xlf:notes,
//			notes,
//		--div--;LLL:EXT:frontend/Resources/Private/Language/locallang_tca.xlf:pages.tabs.extended,
//	'
//];

// ---------------------------------------------------------------------------------------------------------------------
// Konfigurationsanpassungen Global
//$GLOBALS['TCA']['tx_news_domain_model_news']['columns']['fal_media']['config']['maxitems'] = 1;
//$GLOBALS['TCA']['tx_news_domain_model_news']['columns']['fal_media']['config']['overrideChildTca']['columns']['showinpreview']['config']['default'] = 1;
//$GLOBALS['TCA']['tx_news_domain_model_news']['columns']['fal_media']['config']['overrideChildTca']['columns']['crop']['config']['cropVariants'] = [
//	'thumbnail' => [
//		'title' => 'LLL:EXT:xo/Resources/Private/Language/locallang_tca.xlf:tx_xo_crop_variant.thumbnail',
//		'allowedAspectRatios' => [
//			'16_9' => [
//				'title' => 'LLL:EXT:core/Resources/Private/Language/locallang_wizards.xlf:imwizard.ratio.16_9',
//				'value' => 16 / 9
//			],
//			'NaN' => [
//				'title' => 'LLL:EXT:core/Resources/Private/Language/locallang_wizards.xlf:imwizard.ratio.free',
//				'value' => 0.0
//			],
//		],
//		'selectedRatio' => 'NaN',
//	],
//];

// ---------------------------------------------------------------------------------------------------------------------
// Konfigurationsanpassungen News
//$GLOBALS['TCA']['tx_news_domain_model_news']['types']['0']['columnsOverrides']['fal_media']['config']['overrideChildTca']['columns']['crop']['config']['cropVariants'] = [
//	'default' => [
//		'title' => 'LLL:EXT:xo/Resources/Private/Language/locallang_tca.xlf:tx_xo_crop_variant.default',
//		'allowedAspectRatios' => [
//			'4_3' => [
//				'title' => 'LLL:EXT:core/Resources/Private/Language/locallang_wizards.xlf:imwizard.ratio.4_3',
//				'value' => 4 / 3
//			],
//			'16_9' => [
//				'title' => 'LLL:EXT:core/Resources/Private/Language/locallang_wizards.xlf:imwizard.ratio.16_9',
//				'value' => 16 / 9
//			],
//			'NaN' => [
//				'title' => 'LLL:EXT:core/Resources/Private/Language/locallang_wizards.xlf:imwizard.ratio.free',
//				'value' => 0.0
//			],
//		],
//		'selectedRatio' => '4_3',
//	],
//	'thumbnail' => [
//		'title' => 'LLL:EXT:xo/Resources/Private/Language/locallang_tca.xlf:tx_xo_crop_variant.thumbnail',
//		'allowedAspectRatios' => [
//			'16_9' => [
//				'title' => 'LLL:EXT:core/Resources/Private/Language/locallang_wizards.xlf:imwizard.ratio.16_9',
//				'value' => 16 / 9
//			],
//			'NaN' => [
//				'title' => 'LLL:EXT:core/Resources/Private/Language/locallang_wizards.xlf:imwizard.ratio.free',
//				'value' => 0.0
//			],
//		],
//		'selectedRatio' => '16_9',
//	],
//];

// ---------------------------------------------------------------------------------------------------------------------
// Konfigurationsanpassungen Event
//$GLOBALS['TCA']['tx_news_domain_model_news']['types']['3']['columnsOverrides']['internalurl']['label'] = 'LLL:EXT:ps14_kist_news/Resources/Private/Language/locallang_tca.xlf:news.event-link';
//$GLOBALS['TCA']['tx_news_domain_model_news']['types']['3']['columnsOverrides']['internalurl']['config']['eval'] = 'trim';
//$GLOBALS['TCA']['tx_news_domain_model_news']['types']['3']['columnsOverrides']['tx_kist_news_no_detail']['config']['default'] = '1';
//$GLOBALS['TCA']['tx_news_domain_model_news']['types']['3']['columnsOverrides']['fal_media']['config']['overrideChildTca']['columns']['crop']['config']['cropVariants']['thumbnail']['selectedRatio'] = 'NaN';
