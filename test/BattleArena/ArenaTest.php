<?php

use BattleArena\Arena;
use PHPUnit\Framework\TestCase;

class ArenaTest extends TestCase
{
    /**
     * @var Arena
     */
    private $arena;

    public function setUp()
    {
        $this->arena = new Arena();
    }

    /**
     * @test
     */
    public function getAnnouncement_ReturnsAnnouncement()
    {
        $this->assertEquals('Tamark has won the battle, 32 health left', $this->arena->getAnnouncement());
    }
}