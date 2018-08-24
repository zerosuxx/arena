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
     * {@inheritDoc}
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * {@inheritDoc}
     */
    public function getHealth(): int
    {
        return $this->health;
    }

    /**
     * {@inheritDoc}
     */
    public function getDamage(): int
    {
        return $this->damage;
    }

    /**
     * {@inheritDoc}
     */
    public function setHealth(int $health): void
    {
        $this->health = $health;
    }

    public function takeDamage(int $damage)
    {
        $this->setHealth($this->getHealth() - $damage);
    }

    public function isAlive()
    {
        return $this->getHealth() > 0;
    }
}