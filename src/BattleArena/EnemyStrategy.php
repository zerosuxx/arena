<?php

namespace BattleArena;

use BattleArena\Action\AttackAction;

/**
 * Class EnemyStrategy
 * @package BattleArena
 */
class EnemyStrategy
{
    public function getAction(Players $players)
    {
        return new AttackAction($players->getHero());
    }
}