<?php

use BattleArena\Arena;
use BattleArena\Character;
use PHPUnit\Framework\TestCase;

class ArenaTest extends TestCase
{
    /**
     * @test
     */
    public function getAnnouncement_HasTwoCharacter_ReturnsHeroWinsAnnouncement()
    {
        $arena = new Arena(
            new Character('Tamark', 50, 4),
            new Character('Giant Wolf', 16, 6)
        );

        $this->assertEquals('Tamark has won the battle, 50 health left', $arena->getAnnouncement());
    }
}