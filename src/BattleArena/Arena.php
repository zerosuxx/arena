<?php

namespace BattleArena;

class Arena
{
    private $hero;
    private $monster;

    public function __construct(Character $hero, Character $monster)
    {
        $this->hero = $hero;
        $this->monster = $monster;
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
        return $this->hero;
    }
}