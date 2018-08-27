<?php

use BattleArena\Character\Hero;
use BattleArena\Character\Monster;
use BattleArena\Turn;
use PHPUnit\Framework\TestCase;

class TurnTest extends TestCase
{
    /**
     * @var Turn
     */
    private $turn;

    /**
     * @var Hero
     */
    private $hero;

    /**
     * @var Monster
     */
    private $monster;

    protected function setUp()
    {
        $this->hero = new Hero('Tamark', 2, 1);
        $this->monster = new Monster('Wolf', 2, 1);
        $this->turn = new Turn($this->hero, $this->monster);
    }

    /**
     * @test
     */
    public function getHero_ReturnsHeroInstance()
    {
        $this->assertInstanceOf(Hero::class, $this->turn->getHero());
    }

    /**
     * @test
     */
    public function getMonster_ReturnsMonsterInstance()
    {
        $this->assertInstanceOf(Monster::class, $this->turn->getMonster());
    }

    /**
     * @test
     */
    public function doTurn_HeroAttackedMonsterAndMonsterAttackedHero_DecreaseHealths()
    {
        $this->turn->doTurn();
        $this->assertEquals(1, $this->hero->getHealth());
        $this->assertEquals(1, $this->monster->getHealth());
    }
}