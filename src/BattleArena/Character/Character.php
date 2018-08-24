<?php

namespace BattleArena\Character;

class Character implements CharacterInterface
{
    use SimpleCharacterTrait;

    public function __construct(string $name, int $health, int $damage)
    {
        $this->init($name, $health, $damage);
    }

    public function getDamage(): int
    {
        return $this->damage;
    }

    public function takeDamage(int $damage): void
    {
        $this->health = $this->getHealth() - $damage;
    }
}