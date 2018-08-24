<?php

namespace BattleArena\Consumable;

use BattleArena\Character\CharacterInterface;

/**
 * Interface ConsumableInterface
 * @package BattleArena\Consumable
 */
interface ConsumableInterface
{
    public function use(CharacterInterface $character): void;
}