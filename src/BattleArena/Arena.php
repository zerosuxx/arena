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
        if ($this->hero->getHealth() < 1 || $this->monster->getHealth() < 1) {
            return;
        }
        if ($this->attacker === $this->hero) {
            $this->monster->setHealth($this->monster->getHealth() - $this->attacker->getDamage());
            $this->attacker = $this->monster;
        } else {
            $this->hero->setHealth($this->hero->getHealth() - $this->attacker->getDamage());
            $this->attacker = $this->hero;
        }
        $this->fight();
    }
}