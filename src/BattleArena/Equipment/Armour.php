<?php

namespace BattleArena\Equipment;

class Armour implements EquipmentInterface
{
    private $defense;

    public function __construct(int $defense)
    {
        $this->defense = $defense;
    }

    public function getDamage(): int
    {
        return 0;
    }

    public function getDefense(): int
    {
        return $this->defense;
    }
}