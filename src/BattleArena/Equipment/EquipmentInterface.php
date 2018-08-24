<?php

namespace BattleArena\Equipment;

interface EquipmentInterface
{
    public function getDamage(): int;

    public function getDefense(): int;
}