<?php

namespace BattleArena\Character;

class Character implements CharacterInterface
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

    public function playTurn(Players $players)
    {
        $this->strategy->getNextAction($players)->perform($this);
    }
}