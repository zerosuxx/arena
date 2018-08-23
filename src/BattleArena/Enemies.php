<?php

namespace BattleArena;

class Enemies implements CharacterInterface
{
    /**
     * @var CharacterInterface[]
     */
    private $enemies = [];

    public function __construct(CharacterInterface $character)
    {
        $this->addEnemy($character);
    }

    public function addEnemy(CharacterInterface $character)
    {
        $this->enemies[] = $character;
    }

    public function getHealth(): int
    {
        $sum = 0;
        foreach ($this->enemies as $en) {
            $sum += $en->getHealth();
        }
        return $sum;
    }

    public function getName(): string
    {

    }

    public function getDamage(): int
    {

    }

    public function setHealth(int $health): void
    {
    }
}