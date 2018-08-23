<?php

namespace BattleArena;

class Arena
{
    private $character;

    public function __construct(Character $character)
    {
        $this->character = $character;
    }

    public function getAnnouncement(): string
    {
        return sprintf('%s has won the battle, %d health left', $this->character->getName(),
            $this->character->getHealth());
    }
}