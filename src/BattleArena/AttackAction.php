<?php

namespace BattleArena;

use BattleArena\Character\CharacterInterface;

class AttackAction
{
    private $attacker;

    public function __construct(CharacterInterface $attacker)
    {
        $this->attacker = $attacker;
    }

    public function perform(CharacterInterface $target)
    {
        $target->takeDamage($this->attacker->getDamage());
    }
}