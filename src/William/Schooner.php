<?php

namespace William;

use William\Schooner\Exception;

class Schooner {

    const DICE_COUNT = 5;
    const MIN_ROLL = 1;
    const MAX_ROLL = 8;

    /**
     * Score a roll based on the category
     *
     * @param string $category
     * @param array $diceRoll
     * @return integer
     */
    public function score(string $category, array $diceRoll) : int {
        if (sizeof($diceRoll) < self::DICE_COUNT) {
            throw new Exception("Not enough dice in roll. Need 5.");
        }

        return 0;
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

        return [];
    }
}