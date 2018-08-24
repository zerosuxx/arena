<?php

namespace BattleArena;

trait SimpleCharacterTrait
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

    private function init(string $name, int $health, int $damage)
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