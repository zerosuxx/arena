<?php

namespace BattleArena;

use BattleArena\Character\Hero;
use BattleArena\Character\Monster;

/**
 * Class Turn
 * @package BattleArena
 */
class Turn
{
    /**
     * @var Hero
     */
    private $hero;
    /**
     * @var Monster
     */
    private $monster;

    public function __construct(Hero $hero, Monster $monster)
    {
        $this->hero = $hero;
        $this->monster = $monster;
    }

    /**
     * @return Hero
     */
    public function getHero(): Hero
    {
        return $this->hero;
    }

    /**
     * @return Monster
     */
    public function getMonster(): Monster
    {
        return $this->monster;
    }

    public function doTurn()
    {
        $this->hero->attack($this->monster);
        if ($this->monster->isAlive()) {
            $this->monster->attack($this->hero);
        }
    }
}