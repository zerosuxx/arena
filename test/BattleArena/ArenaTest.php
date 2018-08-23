<?php

use BattleArena\Arena;
use BattleArena\Character;
use PHPUnit\Framework\TestCase;

class ArenaTest extends TestCase
{
    /**
     * @var Arena
     */
    private $arena;

    /**
     * @var Character
     */
    private $character;

    public function setUp()
    {
        $this->character = new Character('Tamark', 32, 5);
        $this->arena = new Arena($this->character);
    }

    /**
     * @test
     */
    public function getAnnouncement_GivenOneCharacter_ReturnsAnnouncement()
    {
        $this->assertEquals('Tamark has won the battle, 32 health left', $this->arena->getAnnouncement());
    }

    /**
     * @test
     */
    public function getAnnouncement_GivenOneCharacterWith99Health_ReturnsCorrectAnnouncement()
    {
        $this->character->setHealth(99);
        $this->assertEquals('Tamark has won the battle, 99 health left', $this->arena->getAnnouncement());
    }
}