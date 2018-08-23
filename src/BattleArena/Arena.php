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
        return sprintf(
            '%s has won the battle, %d health left',
            $this->hero->getName(),
            $this->hero->getHealth()
        );
    }

    public function getWinner(): Character
    {
        return $this->hero->getHealth() > $this->monster->getHealth() ? $this->hero : $this->monster;
    }

    public function fight()
    {
        if ($this->checkCharactersDie()) {
            return;
        }
        if ($this->attacker === $this->hero) {
            $this->attack($this->hero, $this->monster);
        } else {
            $this->attack($this->monster, $this->hero);
        }
        $this->fight();
    }

    /**
     * @return bool
     */
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