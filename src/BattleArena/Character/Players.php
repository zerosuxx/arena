<?php

namespace BattleArena\Character;

use BattleArena\Character\CharacterInterface;
use BattleArena\Character\Hero;

class Players
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
    public function getEnemy(): CharacterInterface
    {
        return $this->enemy;
    }
}