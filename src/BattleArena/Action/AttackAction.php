<?php

namespace BattleArena\Action;

use BattleArena\Character\CharacterInterface;

class AttackAction implements ActionInterface
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