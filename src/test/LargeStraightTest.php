<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use William\Schooner\Category\LargeStraight;

class LargeStraightTest extends TestCase {

    protected $largeStraight;

    public function setUp() : void {
        $this->largeStraight = new LargeStraight();
    }

    /**
     * @doesNotPerformAssertions
     */
    public function testConstructor() {
        $category = new LargeStraight();
    }

    public function testLargeStraight() {
        $this->assertEquals(LargeStraight::SCORE, $this->largeStraight->score([1, 2, 3, 4, 5]));
    }

    public function testLargeStraightOutOfOrder() {
        $this->assertEquals(LargeStraight::SCORE, $this->largeStraight->score([1, 4, 2, 3, 5]));
    }
}