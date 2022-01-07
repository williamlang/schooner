<?php

namespace William\Schooner;

abstract class Category {

    const ONES   = 'ONES';
    const TWOS   = 'TWOS';
    const THREES = 'THREES';
    const FOURS  = 'FOURS';
    const FIVES  = 'FIVES';
    const SIXES  = 'SIXES';
    const SEVENS = 'SEVENS';
    const EIGHTS = 'EIGHTS';
    const THREE_OF_A_KIND = 'THREE_OF_A_KIND';
    const FOUR_OF_A_KIND  = 'FOUR_OF_A_KIND';
    const FULL_HOUSE = 'FULL_HOUSE';
    const SMALL_STRAIGHT = 'SMALL_STRAIGHT';
    const LARGE_STRAIGHT = 'LARGE_STRAIGHT';
    const ALL_DIFFERENT = 'ALL_DIFFERENT';
    const SCHOONER = 'SCHOONER';
    const CHANCE = 'CHANCE';

    abstract public function qualifies(array $diceRoll) : bool;
    abstract public function score(array $diceRoll) : int;
}