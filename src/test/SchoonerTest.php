<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use William\Schooner\Category;
use William\Schooner;
use William\Schooner\Exception;

class SchoonerTest extends TestCase {

    /**
     * @var Schooner
     */
    protected $schooner;

    public function setUp() : void {
        $this->schooner = new Schooner();
    }

    /**
     * @doesNotPerformAssertions
     */
    public function testConstructor() {
        $schooner = new Schooner();
    }

    public function testScore() {
        $this->assertNotNull($this->schooner->score(Category::ONES, [1, 1, 1, 1, 1]));
    }

    public function testScoreInvalidCategory() {
        $this->expectException(InvalidArgumentException::class);
        $this->assertNotNull($this->schooner->score('unknown category', [1, 1, 1, 1, 1]));
    }

    public function testScoreInvalidDiceCount() {
        $this->expectException(Exception::class);
        $this->assertNotNull($this->schooner->score(Category::ONES, [1, 1, 1, 1]));
    }

    public function testTopCategory() {
        $this->assertEquals([Category::SCHOONER, Category::ONES, Category::CHANCE], $this->schooner->topCategories([1, 1, 1, 1, 1]));
    }

}
