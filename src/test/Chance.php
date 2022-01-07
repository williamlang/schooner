<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use William\Schooner\Category\Chance;

class ChanceTest extends TestCase {

    protected $chance;

    public function setUp() : void {
        $this->chance = new Chance();
    }

    /**
     * @doesNotPerformAssertions
     */
    public function testConstructor() {
        $category = new Chance();
    }

    public function testChance() {
        $this->assertEquals(15, $this->chance->score([1, 2, 3, 4, 5]));
    }

    public function testQualifiesOfChance() {
        $this->assertTrue($this->chance->qualifies([]));
    }
}