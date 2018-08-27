<?php

namespace BattleArena\Action;

use BattleArena\Character\CharacterInterface;

interface ActionInterface
{
    public function perform(CharacterInterface $target);
}