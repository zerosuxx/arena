<?php

namespace BattleArena;

/**
 * Class Weapon
 * @package BattleArena
 */
class Weapon implements EquipmentInterface
{

    public function getDamage(): int
    {
        return 10;
    }

    public function getDefense(): int
    {
        // TODO: Implement getDefense() method.
    }
}