<?php

namespace BattleArena\Character;

trait SimpleCharacterTrait
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var int
     */
    private $maxHealth;

    /**
     * @var int
     */
    private $health;

    /**
     * @var int
     */
    private $damage;

    private function init(string $name, int $health, int $damage)
    {
        $this->name = $name;
        $this->maxHealth = $health;
        $this->health = $health;
        $this->damage = $damage;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getMaxHealth(): int
    {
        return $this->maxHealth;
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