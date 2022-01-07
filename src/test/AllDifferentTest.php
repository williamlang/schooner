<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use William\Schooner\Category\AllDifferent;

class AllDifferentTest extends TestCase {

    protected $allDifferent;

    public function setUp() : void {
        $this->allDifferent = new AllDifferent();
    }

    /**
     * @doesNotPerformAssertions
     */
    public function testConstructor() {
        $category = new AllDifferent();
    }

    public function testAllDifferent() {
        $this->assertEquals(AllDifferent::SCORE, $this->allDifferent->score([1, 3, 5, 6, 8]));
    }

    public function testAllDifferentWithJustTwoNumbers() {
        $this->assertEquals(0, $this->allDifferent->score([2, 4, 4, 4, 4]));
    }

    public function testLargeStraightIsAlsoAllDifferent() {
        $this->assertEquals(AllDifferent::SCORE, $this->allDifferent->score([1, 2, 3, 4, 5]));
    }
}