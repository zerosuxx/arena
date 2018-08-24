<?php

namespace BattleArena\Consumable;

use BattleArena\Character\CharacterInterface;

class HealingPotion implements ConsumableInterface
{

    public function use(CharacterInterface $character): void
    {
        $character->setHealth($character->getMaxHealth());
    }
}