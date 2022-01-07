<?php

namespace William\Schooner\Category;

use William\Schooner\Category;

class LargeStraight extends Category {

    const SCORE = 40;
    const SEQUENCE_COUNT = 5;

    /**
     * @see parent
     */
    public function qualifies(array $diceRoll): bool {
        sort($diceRoll);
        $sequenceCount = 1;

        for ($i = 1; $i < sizeof($diceRoll); $i++) {
            if ($diceRoll[$i] - $diceRoll[$i - 1] == 1) {
                $sequenceCount++;
            } else {
                $sequenceCount = 1;
            }
        }

        return $sequenceCount == self::SEQUENCE_COUNT;
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