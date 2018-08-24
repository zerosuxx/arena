<?php

namespace BattleArena\Consumable;

use BattleArena\Character\Hero;

interface ConsumableInterface
{
    public function use(Hero $hero): void;
}