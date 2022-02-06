<?php

declare(strict_types=1);

namespace Ps14\NewsExtended\Domain\Model;


/**
 * This file is part of the "Ps14 News" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2022 Christian Pschorr <pschorr.christian@gmail.com>
 */
class News extends \GeorgRinger\News\Domain\Model\News {

	/**
	 * @var bool
	 */
	protected $noDetail = false;

	/**
	 * @var string
	 */
	protected $location = '';

	/**
	 * @var \DateTime
	 */
	protected $eventStartdate = null;

	/**
	 * @var \DateTime
	 */
	protected $eventEnddate = null;

	/**
	 * @var \DateTime
	 */
	protected $eventStarttime = null;

	/**
	 * @var \DateTime
	 */
	protected $eventEndtime = null;

	/**
	 * @var string
	 */
	protected $layout = '';

	/**
	 * @return string
	 */
	public function getLayout(): string {
		return $this->layout;
	}

	/**
	 * @param string $layout
	 */
	public function setLayout(string $layout): void {
		$this->layout = $layout;
	}

	/**
	 * @return string
	 */
	public function getLocation(): string {
		return $this->location;
	}

	/**
	 * @param string $location
	 */
	public function setLocation(string $location): void {
		$this->location = $location;
	}

	/**
	 * @return \DateTime
	 */
	public function getEventStartdate(): ?\DateTime {
		return $this->eventStartdate;
	}

	/**
	 * @param \DateTime $eventStartdate
	 */
	public function setEventStartdate(?\DateTime $eventStartdate): void {
		$this->eventStartdate = $eventStartdate;
	}

	/**
	 * @return \DateTime
	 */
	public function getEventEnddate(): ?\DateTime {
		return $this->eventEnddate;
	}

	/**
	 * @param \DateTime $eventEnddate
	 */
	public function setEventEnddate(?\DateTime $eventEnddate): void {
		$this->eventEnddate = $eventEnddate;
	}

	/**
	 * @return \DateTime
	 */
	public function getEventStarttime(): ?\DateTime {
		return $this->eventStarttime;
	}

	/**
	 * @param \DateTime $eventStarttime
	 */
	public function setEventStarttime(?\DateTime $eventStarttime): void {
		$this->eventStarttime = $eventStarttime;
	}

	/**
	 * @return \DateTime
	 */
	public function getEventEndtime(): ?\DateTime {
		return $this->eventEndtime;
	}

	/**
	 * @param \DateTime $eventEndtime
	 */
	public function setEventEndtime(?\DateTime $eventEndtime): void {
		$this->eventEndtime = $eventEndtime;
	}

	/**
	 * @return bool
	 */
	public function isNoDetail(): bool {
		return $this->noDetail;
	}

	/**
	 * @param bool $noDetail
	 */
	public function setNoDetail(bool $noDetail): void {
		$this->noDetail = $noDetail;
	}
}
