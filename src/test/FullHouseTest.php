<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use William\Schooner\Category\FullHouse;

class FullHouseTest extends TestCase {

    protected $fullHouse;

    public function setUp() : void {
        $this->fullHouse = new FullHouse();
    }

    /**
     * @doesNotPerformAssertions
     */
    public function testConstructor() {
        $category = new FullHouse();
    }

    public function testFullHouse() {
        $this->assertEquals(FullHouse::SCORE, $this->fullHouse->score([2, 2, 4, 4, 4]));
    }

    public function testFullHouseWithJustTwoNumbers() {
        $this->assertEquals(0, $this->fullHouse->score([2, 4, 4, 4, 4]));
    }
}