<?php

use BattleArena\Arena;
use BattleArena\Character;
use PHPUnit\Framework\TestCase;

class ArenaTest extends TestCase
{
    /**
     * @test
     */
    public function getAnnouncement_HasTwoCharacterNoFight_ReturnsBiggerHealthWinsAnnouncement()
    {
        $arena = new Arena(new Character('Tamark', 50, 0), new Character('Giant Wolf', 49, 0));

        $this->assertEquals('Tamark has won the battle, 50 health left', $arena->getAnnouncement());
    }

    /**
     * @test
     * @dataProvider announcementProvider
     * @param int $heroHealth
     * @param int $heroDamage
     * @param int $monsterHealth
     * @param int $monsterDamage
     * @param string $expectedAnnouncement
     */
    public function getAnnouncement_TwoCharacterFighting_ReturnsAnnouncement(
        int $heroHealth,
        int $heroDamage,
        int $monsterHealth,
        int $monsterDamage,
        string $expectedAnnouncement
    ) {
        $hero = new Character('Tamark', $heroHealth, $heroDamage);
        $monster = new Character('Giant Wolf', $monsterHealth, $monsterDamage);
        $arena = new Arena($hero, $monster);

        $arena->fight();

        $this->assertEquals($expectedAnnouncement, $arena->getAnnouncement());
    }

    public function announcementProvider()
    {
        return [
            [50, 4, 16, 6, 'Tamark has won the battle, 32 health left'],
            [50, 4, 53, 6, 'Giant Wolf has won the battle, 17 health left'],
            [4, 5, 5, 10, 'Tamark has won the battle, 4 health left'],
            [5, 5, 6, 5, 'Giant Wolf has won the battle, 1 health left'],
        ];
    }

}