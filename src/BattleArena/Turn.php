<?php

namespace BattleArena;

use BattleArena\Character\CharacterInterface;
use BattleArena\Character\Hero;
use BattleArena\Character\enemy;

class Turn
{
    /**
     * @var Hero
     */
    private $hero;
    /**
     * @var CharacterInterface
     */
    private $enemy;

    public function __construct(Hero $hero, CharacterInterface $enemy)
    {
        $this->hero = $hero;
        $this->enemy = $enemy;
    }

    /**
     * @return Hero
     */
    public function getHero(): Hero
    {
        return $this->hero;
    }

    /**
     * @return CharacterInterface
     */
    public function getenemy(): CharacterInterface
    {
        return $this->enemy;
    }

    public function doTurn()
    {
        $this->hero->attack($this->enemy);
        if ($this->enemy->isAlive()) {
            $this->enemy->attack($this->hero);
        }
    }
}