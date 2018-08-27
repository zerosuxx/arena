<?php

namespace BattleArena\Character;

class Character
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var int
     */
    protected $health;

    /**
     * @var int
     */
    protected $damage;

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

    public function isAlive(): bool
    {
        return $this->getHealth() > 0;
    }
}