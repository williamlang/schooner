<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use William\Schooner\Category\Schooner;

class SchoonerCategoryTest extends TestCase {

    protected $schooner;

    public function setUp() : void {
        $this->schooner = new Schooner();
    }

    /**
     * @doesNotPerformAssertions
     */
    public function testConstructor() {
        $category = new Schooner();
    }

    public function testSchooner() {
        $this->assertEquals(Schooner::SCORE, $this->schooner->score([1, 1, 1, 1, 1]));
    }

    public function testNotSchooner() {
        $this->assertFalse($this->schooner->qualifies([1, 1, 1, 1, 2]));
    }
}