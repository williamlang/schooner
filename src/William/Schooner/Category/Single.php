<?php

namespace William\Schooner\Category;

use William\Schooner\Category;

/**
 * The Single category is for ONES, TWOS, THREES, FOURS, FIVES, SIXES, SEVENS, AND EIGHTS
 */
class Single extends Category {

    /**
     * Determines which value we are using to calculate score
     *
     * @var int
     */
    protected $dice;

    /**
     * Create a category of type Single (ONES, TWOS, THREES, etc)
     *
     * @param string $name
     * @param integer $dice
     */
    public function __construct(int $dice) {
        $this->dice = $dice;
    }

    /**
     * This type of category always qualifies regardless of roll
     *
     * @param array $diceRoll
     * @return boolean
     */
    public function qualifies(array $diceRoll) : bool {
        return in_array($this->dice, $diceRoll);
    }

    /**
     * The score for this category is determined by the sum of all individual rolls that are equal to $this->dice
     *
     * @param array $diceRoll
     * @return integer
     */
    public function score(array $diceRoll) : int {
        if (!$this->qualifies($diceRoll)) {
            return 0;
        }

        $score = 0;

        foreach ($diceRoll as $roll) {
            if ($roll == $this->dice) {
                $score += $this->dice;
            }
        }

        return $score;
    }
}