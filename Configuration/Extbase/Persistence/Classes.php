<?php

declare(strict_types=1);

return [
	\GeorgRinger\News\Domain\Model\News::class => [
		'subclasses' => [
			3 => \Ps14\NewsExtended\Domain\Model\Event::class,
		],
		'properties' => [
			'noDetail' => [
				'fieldName' => 'tx_ps14_no_detail'
			],
			'location' => [
				'fieldName' => 'tx_ps14_location'
			],
			'eventStartdate' => [
				'fieldName' => 'tx_ps14_event_startdate'
			],
			'eventEnddate' => [
				'fieldName' => 'tx_ps14_event_enddate'
			],
			'eventStarttime' => [
				'fieldName' => 'tx_ps14_event_starttime'
			],
			'eventEndtime' => [
				'fieldName' => 'tx_ps14_event_endtime'
			],
			'layout' => [
				'fieldName' => 'tx_ps14_layout'
			],
		]
	],
	\Ps14\NewsExtended\Domain\Model\Event::class => [
		'tableName' => 'tx_news_domain_model_news',
		'recordType' => 3,
	]
];
