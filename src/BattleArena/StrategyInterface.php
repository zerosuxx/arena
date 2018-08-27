<?php

namespace BattleArena;

interface StrategyInterface
{
    public function getNextAction(Players $players);
}