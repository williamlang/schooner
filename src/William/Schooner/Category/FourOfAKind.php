<?php

namespace William\Schooner\Category;

use William\Schooner\Category;

class FourOfAKind extends Category {

    /**
     * @see parent
     */
    public function qualifies(array $diceRoll): bool {
        $counts = [];

        foreach ($diceRoll as $roll) {
            if (!isset($counts[$roll])) {
                $counts[$roll] = 0;
            }

            $counts[$roll]++;
        }

        return in_array(4, $counts);
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