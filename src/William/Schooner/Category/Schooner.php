<?php

namespace William\Schooner\Category;

use William\Schooner\Category;

class Schooner extends Category {

    const SCORE = 50;

    /**
     * @see parent
     */
    public function qualifies(array $diceRoll): bool {
        // because we are guaranteed five dice, if after getting just the unique numbers
        // and the size of just the unique numbers is 1 we know we had 5 of the same number
        return sizeof(array_unique($diceRoll)) == 1;
    }

    /**
     * @see parent
     */
    public function score(array $diceRoll): int {
        if (!$this->qualifies($diceRoll)) {
            return 0;
        }

        return self::SCORE;
    }
}