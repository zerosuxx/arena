<?php

namespace BattleArena;

interface EquipmentInterface
{
    public function getDamage(): int;

    public function getDefense(): int;
}