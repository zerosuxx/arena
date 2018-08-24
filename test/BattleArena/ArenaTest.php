<?php

use BattleArena\Arena;
use BattleArena\Character;
use BattleArena\Enemies;
use PHPUnit\Framework\TestCase;

class ArenaTest extends TestCase
{
    /**
     * @test
     */
    public function battle_HasTwoCharacterHeroInstantKillEnemy_ReturnsHeroWinsAnnouncement()
    {
        $arena = new Arena(new Character('Tamark', 50, 50), new Character('Giant Wolf', 49, 5));

        $this->assertEquals('Tamark has won the battle, 50 health left', $arena->battle());
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
    public function battle_TwoCharacterFighting_ReturnsAnnouncement(
        int $heroHealth,
        int $heroDamage,
        int $monsterHealth,
        int $monsterDamage,
        string $expectedAnnouncement
    ) {
        $hero = new Character('Tamark', $heroHealth, $heroDamage);
        $monster = new Character('Giant Wolf', $monsterHealth, $monsterDamage);
        $arena = new Arena($hero, $monster);

        $this->assertEquals($expectedAnnouncement, $arena->battle());
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

    /**
     * @test
     */
    public function battle_HasHeroAndMultipleEnemy_ReturnsEnemiesWinsAnnouncement()
    {
        $enemies = new Enemies(new Character('Zombie1', 10, 5));
        $enemies->addEnemy(new Character('Zombie2', 10, 50));

        $arena = new Arena(new Character('Tamark', 50, 10), $enemies);

        $this->assertEquals('Enemies has won the battle, 10 health left', $arena->battle());
    }

    /**
     * @test
     */
    public function battle_HasHeroAndMultipleEnemy_ReturnsHeroWinsAnnouncement()
    {
        $enemies = new Enemies(new Character('Zombie1', 10, 5));
        $enemies->addEnemy(new Character('Zombie2', 10, 5));

        $arena = new Arena(new Character('Tamark', 50, 20), $enemies);

        $this->assertEquals('Tamark has won the battle, 45 health left', $arena->battle());
    }

}