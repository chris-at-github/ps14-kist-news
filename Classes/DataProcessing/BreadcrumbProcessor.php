<?php

namespace Ps14\NewsExtended\DataProcessing;

use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Core\Database\Query\QueryBuilder;
use TYPO3\CMS\Core\Utility\ArrayUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Utility\DebuggerUtility;
use TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer;
use TYPO3\CMS\Frontend\ContentObject\DataProcessorInterface;
use TYPO3\CMS\Frontend\Controller\TypoScriptFrontendController;

class BreadcrumbProcessor implements DataProcessorInterface {

	/**
	 * @return TypoScriptFrontendController
	 */
	protected function getTypoScriptFrontendController() {
		return $GLOBALS['TSFE'];
	}

	/**
	 * Parst die Inhalte aller verknupeften Inhaltselemente
	 *
	 * @param ContentObjectRenderer $cObject The data of the content element or page
	 * @param array $contentObjectConfiguration The configuration of Content Object
	 * @param array $processorConfiguration The configuration of this processor
	 * @param array $processedData Key/value store of processed data (e.g. to be passed to a Fluid View)
	 * @return array the processed data as key/value store
	 */
	public function process(ContentObjectRenderer $cObject, array $contentObjectConfiguration, array $processorConfiguration, array $processedData) {
		if(isset($processedData['breadcrumb']) === true) {

			try {
				$arguments = $this->getTypoScriptFrontendController()->getPageArguments()->getArguments();
				$uid = (int) $arguments['tx_news_pi1']['news'];

				/** @var QueryBuilder $queryBuilder */
				$queryBuilder = GeneralUtility::makeInstance(ConnectionPool::class)->getQueryBuilderForTable('tx_news_domain_model_news');
				$statement = $queryBuilder
					->select('title')
					->from('tx_news_domain_model_news')
					->orWhere(
						$queryBuilder->expr()->eq('uid', $queryBuilder->createNamedParameter($uid)),
						$queryBuilder->expr()->eq('l10n_parent', $queryBuilder->createNamedParameter($uid))
					)
					->andWhere($queryBuilder->expr()->eq('sys_language_uid', $queryBuilder->createNamedParameter($this->getTypoScriptFrontendController()->getLanguage()->getLanguageId())))
					->execute();

				if(($row = $statement->fetch()) !== false) {
					$processedData['breadcrumb'][] = [
						'title' => $row['title']
					];
				}

			// es gibt nichts abzufangen -> wenn der Parameter nicht in der vorhanden ist fuege nichts dem Breadcrumb hinzu
			} catch(\RuntimeException $exception) {}
		}

		return $processedData;
	}
}