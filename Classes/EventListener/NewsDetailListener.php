<?php

declare(strict_types=1);

namespace Ps14\NewsExtended\EventListener;

use GeorgRinger\News\Event\NewsDetailActionEvent;
use TYPO3\CMS\Extbase\Utility\DebuggerUtility;
use TYPO3\CMS\Core\MetaTag\MetaTagManagerRegistry;
use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * Use NewsListActionEvent from ext:news
 */
class NewsDetailListener {

	/**
	 * @param NewsDetailActionEvent $event
	 * @return void
	 */
	public function detailActionEvent(NewsDetailActionEvent $event): void {

		$metaTagManager = GeneralUtility::makeInstance(MetaTagManagerRegistry::class)->getManagerForProperty('robots');
		//$metaTagManager->addProperty('robots', 'index, follow');

		//DebuggerUtility::var_dump($event);
//		$values = $event->getAssignedValues();
//
//		// Do some stuff
//
//		$event->setAssignedValues($values);
	}
}