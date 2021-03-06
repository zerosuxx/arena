<?php

namespace BattleArena;

use BattleArena\Action\ActionInterface;
use BattleArena\Action\AttackAction;
use BattleArena\Character\Players;

class EnemyStrategy implements StrategyInterface
{
    public function getNextAction(Players $players): ActionInterface
    {
        return new AttackAction($players->getHero());
    }
}