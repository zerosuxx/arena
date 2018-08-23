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
        return array_reduce($this->enemies, function ($sum, CharacterInterface $character) {
            $sum += $character->getHealth();
            return $sum;
        });
    }

    public function getName(): string
    {
        return 'Enemies';
    }

    public function getDamage(): int
    {
        return array_reduce($this->enemies, function ($sum, CharacterInterface $character) {
            $sum += $character->getDamage();
            return $sum;
        });
    }

    public function setHealth(int $health): void
    {
        $minusHealth = $this->getHealth() - $health;
        $index = key($this->enemies);
        $enemy = $this->enemies[$index];
        $newHealth = $enemy->getHealth() - $minusHealth;
        if ($newHealth >= 1) {
            $enemy->setHealth($newHealth);
        } else {
            unset($this->enemies[$index]);
        }
    }
}