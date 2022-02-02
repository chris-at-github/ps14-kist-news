<?php

declare(strict_types=1);

namespace Ps14\NewsExtended\Tests\Unit\Domain\Model;

use PHPUnit\Framework\MockObject\MockObject;
use TYPO3\TestingFramework\Core\AccessibleObjectInterface;
use TYPO3\TestingFramework\Core\Unit\UnitTestCase;

/**
 * Test case
 *
 * @author Christian Pschorr <pschorr.christian@gmail.com>
 */
class NewsTest extends UnitTestCase
{
    /**
     * @var \Ps14\NewsExtended\Domain\Model\News|MockObject|AccessibleObjectInterface
     */
    protected $subject;

    protected function setUp(): void
    {
        parent::setUp();

        $this->subject = $this->getAccessibleMock(
            \Ps14\NewsExtended\Domain\Model\News::class,
            ['dummy']
        );
    }

    protected function tearDown(): void
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getTxPs14NoDetailReturnsInitialValueForBool(): void
    {
        self::assertFalse($this->subject->getTxPs14NoDetail());
    }

    /**
     * @test
     */
    public function setTxPs14NoDetailForBoolSetsTxPs14NoDetail(): void
    {
        $this->subject->setTxPs14NoDetail(true);

        self::assertEquals(true, $this->subject->_get('txPs14NoDetail'));
    }

    /**
     * @test
     */
    public function getTxPs14LocationReturnsInitialValueForString(): void
    {
        self::assertSame(
            '',
            $this->subject->getTxPs14Location()
        );
    }

    /**
     * @test
     */
    public function setTxPs14LocationForStringSetsTxPs14Location(): void
    {
        $this->subject->setTxPs14Location('Conceived at T3CON10');

        self::assertEquals('Conceived at T3CON10', $this->subject->_get('txPs14Location'));
    }

    /**
     * @test
     */
    public function getTxPs14EventStartdateReturnsInitialValueForDateTime(): void
    {
        self::assertEquals(
            null,
            $this->subject->getTxPs14EventStartdate()
        );
    }

    /**
     * @test
     */
    public function setTxPs14EventStartdateForDateTimeSetsTxPs14EventStartdate(): void
    {
        $dateTimeFixture = new \DateTime();
        $this->subject->setTxPs14EventStartdate($dateTimeFixture);

        self::assertEquals($dateTimeFixture, $this->subject->_get('txPs14EventStartdate'));
    }

    /**
     * @test
     */
    public function getTxPs14EventEnddateReturnsInitialValueForDateTime(): void
    {
        self::assertEquals(
            null,
            $this->subject->getTxPs14EventEnddate()
        );
    }

    /**
     * @test
     */
    public function setTxPs14EventEnddateForDateTimeSetsTxPs14EventEnddate(): void
    {
        $dateTimeFixture = new \DateTime();
        $this->subject->setTxPs14EventEnddate($dateTimeFixture);

        self::assertEquals($dateTimeFixture, $this->subject->_get('txPs14EventEnddate'));
    }

    /**
     * @test
     */
    public function getTxPs14EventStarttimeReturnsInitialValueForDateTime(): void
    {
        self::assertEquals(
            null,
            $this->subject->getTxPs14EventStarttime()
        );
    }

    /**
     * @test
     */
    public function setTxPs14EventStarttimeForDateTimeSetsTxPs14EventStarttime(): void
    {
        $dateTimeFixture = new \DateTime();
        $this->subject->setTxPs14EventStarttime($dateTimeFixture);

        self::assertEquals($dateTimeFixture, $this->subject->_get('txPs14EventStarttime'));
    }

    /**
     * @test
     */
    public function getTxPs14EventEndtimeReturnsInitialValueForDateTime(): void
    {
        self::assertEquals(
            null,
            $this->subject->getTxPs14EventEndtime()
        );
    }

    /**
     * @test
     */
    public function setTxPs14EventEndtimeForDateTimeSetsTxPs14EventEndtime(): void
    {
        $dateTimeFixture = new \DateTime();
        $this->subject->setTxPs14EventEndtime($dateTimeFixture);

        self::assertEquals($dateTimeFixture, $this->subject->_get('txPs14EventEndtime'));
    }

    /**
     * @test
     */
    public function getTxPs14LayoutReturnsInitialValueForString(): void
    {
        self::assertSame(
            '',
            $this->subject->getTxPs14Layout()
        );
    }

    /**
     * @test
     */
    public function setTxPs14LayoutForStringSetsTxPs14Layout(): void
    {
        $this->subject->setTxPs14Layout('Conceived at T3CON10');

        self::assertEquals('Conceived at T3CON10', $this->subject->_get('txPs14Layout'));
    }
}
