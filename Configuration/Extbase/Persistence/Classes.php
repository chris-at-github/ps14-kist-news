<?php

declare(strict_types=1);

return [
	\GeorgRinger\News\Domain\Model\News::class => [
		'subclasses' => [
			3 => \Ps14\NewsExtended\Domain\Model\Event::class,
		]
	],
	\Ps14\NewsExtended\Domain\Model\Event::class => [
		'tableName' => 'tx_news_domain_model_news',
		'recordType' => 3,
	]
];
