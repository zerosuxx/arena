<?php

namespace BattleArena;

use BattleArena\Character\CharacterInterface;
use BattleArena\Character\Hero;
use BattleArena\Character\Players;

class Arena
{
    private $hero;
    private $monster;
    private $turn;
    private $players;

    public function __construct(Hero $hero, CharacterInterface $monster)
    {
        $this->hero = $hero;
        $this->monster = $monster;
        $this->turn = new Turn();
        $this->players = new Players($hero, $monster);
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
            $this->turn->doTurn($this->players);
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
}