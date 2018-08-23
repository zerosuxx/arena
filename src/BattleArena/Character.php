<?php

namespace BattleArena;

class Character
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

    /**
     * Character constructor.
     * @param string $name
     * @param int $health
     * @param int $damage
     */
    public function __construct(string $name, int $health, int $damage)
    {
        $this->name = $name;
        $this->health = $health;
        $this->damage = $damage;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getHealth(): int
    {
        return $this->health;
    }

    /**
     * @return int
     */
    public function getDamage(): int
    {
        return $this->damage;
    }

    /**
     * @param int $health
     */
    public function setHealth(int $health): void
    {
        $this->health = $health;
    }
}