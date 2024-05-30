<?php

declare(strict_types=1);

namespace Ps14\KistNews\Domain\Model;


use TYPO3\CMS\Core\Localization\DateFormatter;
use TYPO3\CMS\Extbase\Utility\DebuggerUtility;
use TYPO3\CMS\Extbase\Utility\LocalizationUtility;
use TYPO3\CMS\Frontend\Controller\TypoScriptFrontendController;

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
	 * @return \TYPO3\CMS\Core\Localization\Locale
	 */
	protected function getLocale() {

		/** @var SiteLanguage $siteLanguage */
		$siteLanguage = $GLOBALS['TSFE']->getLanguage();

		return $siteLanguage->getLocale();
	}

	/**
	 * @return array
	 */
	public function getFormattedEventDate() {
		$locale = $this->getLocale();
		$dateFormatter =new DateFormatter();
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
			$format = LocalizationUtility::translate('LLL:EXT:ps14_kist_news/Resources/Private/Language/locallang.xlf:date.date', 'KistNews');

			$components[':startday'] = $this->getEventStartdate()->format('d');
			$components[':startmonth'] = $dateFormatter->strftime('%B', $this->getEventStartdate(), $locale);
			$components[':startyear'] = $this->getEventStartdate()->format('Y');
			$components[':startdate'] = $dateFormatter->strftime(
				LocalizationUtility::translate('LLL:EXT:ps14_foundation/Resources/Private/Language/locallang_frontend.xlf:date.format.date'),
				$this->getEventStartdate(),
				$locale
			);

			// von bis Datum
			if($this->getEventEnddate() !== null) {
				$components[':endday'] = $this->getEventEnddate()->format('d');
				$components[':enddate'] = $dateFormatter->strftime(
					LocalizationUtility::translate('LLL:EXT:ps14_foundation/Resources/Private/Language/locallang_frontend.xlf:date.format.date'),
					$this->getEventEnddate(),
					$locale
				);

				// 22. - 24. Oktober 2022
				// February 12 - 14, 2022
				if($this->getEventStartdate()->format('mY') === $this->getEventEnddate()->format('mY')) {
					$format = LocalizationUtility::translate('LLL:EXT:ps14_kist_news/Resources/Private/Language/locallang.xlf:date.dayRange');

				// 22. Oktober - 24. November 2022
				// February 12, 2022 - March 14, 2022
				} else {
					$format = LocalizationUtility::translate('LLL:EXT:ps14_kist_news/Resources/Private/Language/locallang.xlf:date.dateRange');
				}

			} else {

				if($this->getEventStarttime() !== null) {
					$starttime = new \DateTime('@' . (int) $this->getEventStarttime()->format('U'), new \DateTimeZone('UTC'));
					$components[':starttime'] = $starttime->format(LocalizationUtility::translate('LLL:EXT:ps14_foundation/Resources/Private/Language/locallang_frontend.xlf:date.format.time'));

					// 14:00 - 16:00 Uhr 24. November 2022
					if($this->getEventEndtime() !== null) {
						$endtime = new \DateTime('@' . (int) $this->getEventEndtime()->format('U'), new \DateTimeZone('UTC'));
						$components[':endtime'] = $endtime->format(LocalizationUtility::translate('LLL:EXT:ps14_foundation/Resources/Private/Language/locallang_frontend.xlf:date.format.time'));
						$format = LocalizationUtility::translate('LLL:EXT:ps14_kist_news/Resources/Private/Language/locallang.xlf:date.timeRange');

						// 16:00 Uhr 24. November 2022
					} else {
						$format = LocalizationUtility::translate('LLL:EXT:ps14_kist_news/Resources/Private/Language/locallang.xlf:date.time');
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
