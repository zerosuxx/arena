<?php

namespace BattleArena\Consumable;

use BattleArena\Character\Hero;

class HealingPotion implements ConsumableInterface
{

    public function use(Hero $hero): void
    {
        $hero->setHealth($hero->getMaxHealth());
    }
}