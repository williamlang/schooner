<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use William\Schooner\Category\Single;

class SingleTest extends TestCase {

    /**
     * @doesNotPerformAssertions
     */
    public function testConstructor() {
        $single = new Single(1);
    }

    public function testScoreForEachNumber() {
        for ($i = 1; $i <= 8; $i++) {
            $single = new Single($i);

            $this->assertEquals($i * 5, $single->score([$i, $i, $i, $i, $i]));
        }
    }

    public function testScoreReturnsZeroForOnesWithTwos() {
        $single = new Single(1);
        $this->assertEquals(0, $single->score([2, 2, 2, 2, 2]));
    }

    public function testQualifies() {
        $single = new Single(1);
        $this->assertTrue($single->qualifies([1, 2, 2, 2, 2]));
    }

    public function testDoesNotQualify() {
        $single = new Single(1);
        $this->assertFalse($single->qualifies([2, 2, 2, 2, 2]));
    }
}