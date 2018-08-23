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
    private $hero;

    /**
     * @var Character
     */
    private $monster;

    public function setUp()
    {
        $this->hero = new Character('Tamark', 50, 4);
        $this->monster = new Character('Giant Wolf', 16, 6);
        $this->arena = new Arena($this->hero, $this->monster);
    }

    /**
     * @test
     */
    public function getAnnouncement_GivenOneCharacter_ReturnsAnnouncement()
    {
        $this->assertEquals('Tamark has won the battle, 50 health left', $this->arena->getAnnouncement());
    }

    /**
     * @test
     */
    public function getAnnouncement_GivenOneCharacterWith99Health_ReturnsCorrectAnnouncement()
    {
        $this->hero->setHealth(99);
        $this->assertEquals('Tamark has won the battle, 99 health left', $this->arena->getAnnouncement());
    }
}