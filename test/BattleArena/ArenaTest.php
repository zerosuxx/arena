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

    /**
     * @test
     */
    public function getWinner_HasTwoCharacterAndMonsterBiggerHealth_ReturnsMonsterWins()
    {

        $hero = new Character('Tamark', 50, 4);
        $monster = new Character('Giant Wolf', 53, 6);
        $arena = new Arena($hero, $monster);

        $this->assertEquals($monster, $arena->getWinner());
    }

    /**
     * @test
     */
    public function getWinner_HasTwoCharacterFightingOneAttack_ReturnsHeroWins()
    {

        $hero = new Character('Tamark', 4, 5);
        $monster = new Character('Giant Wolf', 5, 10);
        $arena = new Arena($hero, $monster);

        $arena->fight();

        $this->assertEquals($hero, $arena->getWinner());
    }

    /**
     * @test
     */
    public function getWinner_HasTwoCharacterFightingTwoAttack_ReturnsMonsterWins()
    {

        $hero = new Character('Tamark', 5, 5);
        $monster = new Character('Giant Wolf', 6, 5);
        $arena = new Arena($hero, $monster);

        $arena->fight();

        $this->assertEquals($monster, $arena->getWinner());
    }
}