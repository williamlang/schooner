<?php

namespace William\Schooner\Category;

use William\Schooner\Category;

class FullHouse extends Category {

    const SCORE = 25;

    /**
     * @see parent
     */
    public function qualifies(array $diceRoll): bool {
        // because we are guaranteed 5 dice, and a full house contains only two unique numbers
        // if after we grab just the unique numbers we know this is a full house
        return sizeof(array_unique($diceRoll)) == 2;
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