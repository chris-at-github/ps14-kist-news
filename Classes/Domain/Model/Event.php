<?php

declare(strict_types=1);

namespace Ps14\KistNews\Domain\Model;


use TYPO3\CMS\Extbase\Utility\DebuggerUtility;
use TYPO3\CMS\Extbase\Utility\LocalizationUtility;

/**
 * This file is part of the "Ps14 News" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2022 Christian Pschorr <pschorr.christian@gmail.com>
 */
class Event extends News {

	/**
	 * @return bool
	 */
	public function isTypeEvent() {
		return true;
	}

	/**
	 * @return array
	 */
	public function getFormattedEventDate() {

		$format = '';
		$components	= [
			':startday' => '',
			':endday' => '',
			':startmonth' => '',
			':startyear' => '',
			':startdate' => '',
			':enddate' => '',
			':starttime' => '',
			':endtime' => '',
		];

		if($this->getEventStartdate() !== null) {
			$startdateTimestamp = (int) $this->getEventStartdate()->format('U');
			$format = LocalizationUtility::translate('LLL:EXT:ps14_kist_news/Resources/Private/Language/locallang.xlf:tx_newsextended.date.date', 'KistNews');

			$components[':startday'] = $this->getEventStartdate()->format('d');
			$components[':startmonth'] = strftime('%B', $startdateTimestamp);
			$components[':startyear'] = $this->getEventStartdate()->format('Y');
			$components[':startdate'] = strftime(LocalizationUtility::translate('LLL:EXT:xo/Resources/Private/Language/locallang_frontend.xlf:tx_xo_date.format.date', 'Xo'), $startdateTimestamp);

			// von bis Datum
			if($this->getEventEnddate() !== null) {
				$enddateTimestamp = (int) $this->getEventEnddate()->format('U');

				$components[':endday'] = $this->getEventEnddate()->format('d');
				$components[':enddate'] = strftime(LocalizationUtility::translate('LLL:EXT:xo/Resources/Private/Language/locallang_frontend.xlf:tx_xo_date.format.date', 'Xo'), $enddateTimestamp);

				// 22. - 24. Oktober 2022
				// February 12 - 14, 2022
				if($this->getEventStartdate()->format('mY') === $this->getEventEnddate()->format('mY')) {
					$format = LocalizationUtility::translate('LLL:EXT:ps14_kist_news/Resources/Private/Language/locallang.xlf:tx_newsextended.date.dayRange', 'KistNews');

				// 22. Oktober - 24. November 2022
				// February 12, 2022 - March 14, 2022
				} else {
					$format = LocalizationUtility::translate('LLL:EXT:ps14_kist_news/Resources/Private/Language/locallang.xlf:tx_newsextended.date.dateRange', 'KistNews');
				}
			} else {

				if($this->getEventStarttime() !== null) {
					$starttime = new \DateTime('@' . (int) $this->getEventStarttime()->format('U'), new \DateTimeZone('UTC'));
					$components[':starttime'] = $starttime->format(LocalizationUtility::translate('LLL:EXT:xo/Resources/Private/Language/locallang_frontend.xlf:tx_xo_date.format.time', 'Xo'));

					// 14:00 - 16:00 Uhr 24. November 2022
					if($this->getEventEndtime() !== null) {
						$endtime = new \DateTime('@' . (int) $this->getEventEndtime()->format('U'), new \DateTimeZone('UTC'));
						$components[':endtime'] = $endtime->format(LocalizationUtility::translate('LLL:EXT:xo/Resources/Private/Language/locallang_frontend.xlf:tx_xo_date.format.time', 'Xo'));
						$format = LocalizationUtility::translate('LLL:EXT:ps14_kist_news/Resources/Private/Language/locallang.xlf:tx_newsextended.date.timeRange', 'KistNews');

						// 16:00 Uhr 24. November 2022
					} else {
						$format = LocalizationUtility::translate('LLL:EXT:ps14_kist_news/Resources/Private/Language/locallang.xlf:tx_newsextended.date.time', 'KistNews');
					}
				}
			}
		}

		return explode('|', str_replace(
			array_keys($components),
			array_values($components),
			$format
		));
	}
}
