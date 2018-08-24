<?php

namespace BattleArena;

class Character implements CharacterInterface
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var int
     */
    private $health;

    /**
     * @var int
     */
    private $damage;

    public function __construct(string $name, int $health, int $damage)
    {
        $this->name = $name;
        $this->health = $health;
        $this->damage = $damage;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getHealth(): int
    {
        return $this->health;
    }

    public function getDamage(): int
    {
        return $this->damage;
    }

    public function takeDamage(int $damage): void
    {
        $this->health = $this->getHealth() - $damage;
    }

    public function isAlive(): bool
    {
        return $this->getHealth() > 0;
    }
}