<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use William\Schooner\Category\ThreeOfAKind;

class ThreeOfAKindTest extends TestCase {

    protected $threeOfAKind;

    public function setUp() : void {
        $this->threeOfAKind = new ThreeOfAKind();
    }

    /**
     * @doesNotPerformAssertions
     */
    public function testConstructor() {
        $category = new ThreeOfAKind();
    }

    public function testThreeOfAKind() {
        $this->assertEquals(16, $this->threeOfAKind->score([2, 2, 4, 4, 4]));
    }

    public function testFourOfAKindIsAlsoThreeOfAKind() {
        $this->assertTrue($this->threeOfAKind->qualifies([2, 2, 2, 2, 4]));
    }
}