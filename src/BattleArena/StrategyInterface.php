<?php

namespace BattleArena;

use BattleArena\Character\Players;

interface StrategyInterface
{
    public function getNextAction(Players $players);
}