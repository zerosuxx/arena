<?php

namespace BattleArena;

/**
 * Class Weapon
 * @package BattleArena
 */
class Weapon implements EquipmentInterface
{
    private $damage;

    public function __construct(int $damage)
    {
        $this->damage = $damage;
    }

    public function getDamage(): int
    {
        return $this->damage;
    }

    public function getDefense(): int
    {
        // TODO: Implement getDefense() method.
    }
}