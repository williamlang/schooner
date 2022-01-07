<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use William\Schooner\Category\SmallStraight;

class SmallStraightTest extends TestCase {

    protected $smallStraight;

    public function setUp() : void {
        $this->smallStraight = new SmallStraight();
    }

    /**
     * @doesNotPerformAssertions
     */
    public function testConstructor() {
        $category = new SmallStraight();
    }

    public function testSmallStraight() {
        $this->assertEquals(SmallStraight::SCORE, $this->smallStraight->score([1, 2, 3, 4, 7]));
    }

    public function testSmallStraightOutOfOrder() {
        $this->assertEquals(SmallStraight::SCORE, $this->smallStraight->score([1, 4, 2, 3, 7]));
    }

    public function testLargeStraightIsAlsoSmallStraight() {
        $this->assertEquals(SmallStraight::SCORE, $this->smallStraight->score([1, 2, 5, 4, 3]));
    }
}