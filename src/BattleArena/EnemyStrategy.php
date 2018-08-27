<?php

namespace BattleArena;

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