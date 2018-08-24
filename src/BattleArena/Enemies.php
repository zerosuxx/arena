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

    /**
     * @param int $damage
     */
    public function takeDamage(int $damage): void
    {
        $enemy = current($this->enemies);

        if (!$enemy) {
            return;
        }

        $enemy->takeDamage($damage);

        if (!$enemy->isAlive()) {
            array_shift($this->enemies);
        }
    }

    /**
     * @return bool
     */
    public function isAlive(): bool
    {
        return !empty($this->enemies);
    }
}