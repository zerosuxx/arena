<?php

namespace BattleArena;

class Turn
{

    public function doTurn(Players $players)
    {
        $hero = $players->getHero();
        $enemy = $players->getEnemy();
        $hero->playTurn($players);
        if ($enemy->isAlive()) {
            $enemy->attack($hero);
        }
    }
}