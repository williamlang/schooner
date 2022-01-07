<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use William\Schooner\Category\FourOfAKind;

class FourOfAKindTest extends TestCase {

    protected $fourOfAKind;

    public function setUp() : void {
        $this->fourOfAKind = new FourOfAKind();
    }

    /**
     * @doesNotPerformAssertions
     */
    public function testConstructor() {
        $category = new FourOfAKind();
    }

    public function testFourOfAKind() {
        $this->assertEquals(18, $this->fourOfAKind->score([2, 4, 4, 4, 4]));
    }
}