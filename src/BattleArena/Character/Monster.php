<?php

namespace BattleArena\Character;

class Monster extends Character implements CharacterInterface
{
    public function getDamage(): int
    {
        return $this->damage;
    }

    public function takeDamage(int $damage): void
    {
        $this->health = $this->getHealth() - $damage;
    }

    public function attack(CharacterInterface $defender): void
    {
        $defender->takeDamage($this->getDamage());
    }
}