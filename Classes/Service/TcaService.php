<?php
namespace Ps14\KistNews\Service;

use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Utility\DebuggerUtility;

/**
 * Class TokenService
 * @package Ps\EntityProductImport
 */
class TcaService {

	/**
	 * @param string $status
	 * @param string $table
	 * @param string $id
	 * @param array $fields
	 * @param \TYPO3\CMS\Core\DataHandling\DataHandler $dataHandler
	 */
	function processDatamap_afterDatabaseOperations($status, $table, $id, &$fields, &$dataHandler) {
		if($table == 'tx_news_domain_model_news' && empty($fields['tx_kist_news_event_startdate']) === false) {

			// neue Datensaetze abfangen
			if($status === 'new') {
				$id = (int) $dataHandler->substNEWwithIDs[$id];
			}

			// Event Start Date in News Date kopieren -> damit die Sortierung im Plugin verwendet werden kann
			$connection = GeneralUtility::makeInstance(ConnectionPool::class)->getConnectionForTable($table);
			$sql = "UPDATE " . $table . " SET 
				datetime = UNIX_TIMESTAMP(tx_kist_news_event_startdate)
				WHERE uid = " . (int) $id;
			$connection->executeQuery($sql);
		}
	}
}