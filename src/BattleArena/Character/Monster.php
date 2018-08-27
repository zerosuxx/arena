<?php

namespace BattleArena\Character;

use BattleArena\EnemyStrategy;
use BattleArena\StrategyInterface;

class Monster extends Character implements CharacterInterface
{
    /**
     * @var StrategyInterface
     */
    private $strategy;

    public function __construct(string $name, int $health, int $damage, StrategyInterface $strategy = null)
    {
        parent::__construct($name, $health, $damage);
        $this->strategy = $strategy ? $strategy : new EnemyStrategy();
    }
}