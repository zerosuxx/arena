<?php

namespace BattleArena;

class Arena
{
    private $attacker;
    private $hero;
    private $monster;

    public function __construct(CharacterInterface $hero, CharacterInterface $monster)
    {
        $this->attacker = $hero;
        $this->hero = $hero;
        $this->monster = $monster;
    }

    public function battle(): string
    {
        $this->fight();
        $winner = $this->getWinner();

        return sprintf(
            '%s has won the battle, %d health left',
            $winner->getName(),
            $winner->getHealth()
        );
    }

    private function fight()
    {
        while (!$this->checkCharactersDie()) {
            $this->attack($this->attacker, $this->getDefender());
        }
    }

    private function getWinner(): CharacterInterface
    {
        return $this->hero->getHealth() > $this->monster->getHealth() ? $this->hero : $this->monster;
    }

    private function checkCharactersDie(): bool
    {
        return !$this->hero->isAlive() || !$this->monster->isAlive();
    }

    private function attack(CharacterInterface $attacker, CharacterInterface $defender): void
    {
        $defender->takeDamage($attacker->getDamage());
        $this->attacker = $defender;
    }

    private function getDefender(): CharacterInterface
    {
        $defender = $this->attacker === $this->hero ? $this->monster : $this->hero;
        return $defender;
    }
}