<?php

declare(strict_types=1);

return [
	\GeorgRinger\News\Domain\Model\News::class => [
		'subclasses' => [
			3 => \Ps14\KistNews\Domain\Model\Event::class,
		],
		'properties' => [
			'noDetail' => [
				'fieldName' => 'tx_kist_news_no_detail'
			],
			'location' => [
				'fieldName' => 'tx_kist_news_location'
			],
			'eventStartdate' => [
				'fieldName' => 'tx_kist_news_event_startdate'
			],
			'eventEnddate' => [
				'fieldName' => 'tx_kist_news_event_enddate'
			],
			'eventStarttime' => [
				'fieldName' => 'tx_kist_news_event_starttime'
			],
			'eventEndtime' => [
				'fieldName' => 'tx_kist_news_event_endtime'
			],
			'layout' => [
				'fieldName' => 'tx_kist_news_layout'
			],
		]
	],
	\Ps14\KistNews\Domain\Model\Event::class => [
		'tableName' => 'tx_news_domain_model_news',
		'recordType' => 3,
	]
];
