<?php

namespace William\Schooner\Category;

use William\Schooner;
use William\Schooner\Category;

class AllDifferent extends Category {

    const SCORE = 35;

    /**
     * @see parent
     */
    public function qualifies(array $diceRoll): bool {
        return sizeof(array_unique($diceRoll)) == Schooner::DICE_COUNT;
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