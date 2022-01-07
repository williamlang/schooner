<?php

namespace William\Schooner\Category;

use William\Schooner\Category;

class Chance extends Category {

    /**
     * @see parent
     */
    public function qualifies(array $diceRoll): bool {
        return true;
    }

    /**
     * @see parent
     */
    public function score(array $diceRoll): int {
        if (!$this->qualifies($diceRoll)) {
            return 0;
        }

        return array_sum($diceRoll);
    }
}