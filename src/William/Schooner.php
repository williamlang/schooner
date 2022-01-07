<?php

namespace William;

use InvalidArgumentException;
use William\Schooner as WilliamSchooner;
use William\Schooner\Category;
use William\Schooner\Category\AllDifferent;
use William\Schooner\Category\Chance;
use William\Schooner\Category\FourOfAKind;
use William\Schooner\Category\FullHouse;
use William\Schooner\Category\LargeStraight;
use William\Schooner\Category\Schooner as CategorySchooner;
use William\Schooner\Category\Single;
use William\Schooner\Category\SmallStraight;
use William\Schooner\Category\ThreeOfAKind;
use William\Schooner\Exception;

class Schooner {

    const DICE_COUNT = 5;

    /**
     * Our array of categories and their classes
     *
     * @var array
     */
    private $categories = [];

    /**
     * Constructor for Schooner
     */
    public function __construct() {
        // could use reflection to grab all the categories here
        // but if I did that I would need to make argument free Single classes for ONES, TWOS, etc...
        $this->categories = [
            Category::ONES   => new Single(1),
            Category::TWOS   => new Single(2),
            Category::THREES => new Single(3),
            Category::FOURS  => new Single(4),
            Category::FIVES  => new Single(5),
            Category::SIXES  => new Single(6),
            Category::SEVENS => new Single(7),
            Category::EIGHTS => new Single(8),
            Category::THREE_OF_A_KIND => new ThreeOfAKind(),
            Category::FOUR_OF_A_KIND  => new FourOfAKind(),
            Category::FULL_HOUSE => new FullHouse(),
            Category::SMALL_STRAIGHT => new SmallStraight(),
            Category::ALL_DIFFERENT => new AllDifferent(),
            Category::LARGE_STRAIGHT => new LargeStraight(),
            Category::SCHOONER => new CategorySchooner(),
            Category::CHANCE => new Chance()
        ];
    }

    /**
     * Score a roll based on the category
     *
     * @param string $category
     * @param array $diceRoll
     * @return integer
     */
    public function score(string $category, array $diceRoll) : int {
        if (empty($this->categories[$category]) || !($this->categories[$category] instanceof Category)) {
            throw new InvalidArgumentException("Category not found!");
        }

        if (sizeof($diceRoll) != self::DICE_COUNT) {
            throw new Exception("Invalid dice count. Need 5.");
        }

        /** @var Category $categoryClass */
        $categoryClass = $this->categories[$category];
        return $categoryClass->score($diceRoll);
    }

    /**
     * Determine the best categories for a roll
     *
     * @param array $diceRoll
     * @return array
     */
    public function topCategories(array $diceRoll) : array {
        if (sizeof($diceRoll) < self::DICE_COUNT) {
            throw new Exception("Not enough dice in roll. Need 5.");
        }

        $results = [];

        /** @var Category $category */
        foreach ($this->categories as $name => $category) {
            if ($category->qualifies($diceRoll)) {
                $results[$name] = $category->score($diceRoll);
            }
        }

        // sort maintaining index assoc
        asort($results, SORT_NUMERIC);
        return array_reverse(array_keys($results), true);
    }
}