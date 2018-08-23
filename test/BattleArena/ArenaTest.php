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
        list(, , $arena) = $this->getPlayersAndArena(50, 4, 16, 6);

        $this->assertEquals('Tamark has won the battle, 50 health left', $arena->getAnnouncement());
    }

    /**
     * @test
     */
    public function getWinner_HasTwoCharacterAndMonsterBiggerHealth_ReturnsMonsterWins()
    {
        list(, $monster, $arena) = $this->getPlayersAndArena(50, 4, 53, 6);

        $this->assertEquals($monster, $arena->getWinner());
    }

    /**
     * @test
     */
    public function getWinner_HasTwoCharacterFightingOneAttack_ReturnsHeroWins()
    {
        list($hero, , $arena) = $this->getPlayersAndArena(4, 5, 5, 10);
        $arena->fight();

        $this->assertEquals($hero, $arena->getWinner());
    }

    /**
     * @test
     */
    public function getWinner_HasTwoCharacterFightingTwoAttack_ReturnsMonsterWins()
    {
        list(, $monster, $arena) = $this->getPlayersAndArena(5, 5, 6, 5);
        $arena->fight();

        $this->assertEquals($monster, $arena->getWinner());
    }

    /**
     * @param int $heroHealth
     * @param int $heroDamage
     * @param int $monsterHealth
     * @param int $monsterDamage
     * @return Arena[]|Character[]
     */
    private function getPlayersAndArena(int $heroHealth, int $heroDamage, int $monsterHealth, int $monsterDamage): array
    {
        $hero = new Character('Tamark', $heroHealth, $heroDamage);
        $monster = new Character('Giant Wolf', $monsterHealth, $monsterDamage);
        $arena = new Arena($hero, $monster);
        return [$hero, $monster, $arena];
    }
}