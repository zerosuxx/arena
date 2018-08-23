<?php

namespace BattleArena;

class Arena
{
    private $hero;
    private $monster;
    private $attacker;

    public function __construct(Character $hero, Character $monster)
    {
        $this->hero = $hero;
        $this->monster = $monster;
        $this->attacker = $hero;
    }

    public function getAnnouncement(): string
    {
        $winner = $this->getWinner();
        return sprintf(
            '%s has won the battle, %d health left',
            $winner->getName(),
            $winner->getHealth()
        );
    }

    public function fight()
    {
        while (!$this->checkCharactersDie()) {
            if ($this->attacker === $this->hero) {
                $this->attack($this->hero, $this->monster);
            } else {
                $this->attack($this->monster, $this->hero);
            }
        }
    }

    private function getWinner(): Character
    {
        return $this->hero->getHealth() > $this->monster->getHealth() ? $this->hero : $this->monster;
    }

    private function checkCharactersDie(): bool
    {
        return $this->hero->getHealth() < 1 || $this->monster->getHealth() < 1;
    }

    private function attack(Character $attacker, Character $defender): void
    {
        $defender->setHealth($defender->getHealth() - $attacker->getDamage());
        $this->attacker = $defender;
    }
}