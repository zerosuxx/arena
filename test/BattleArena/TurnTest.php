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

    protected function setUp()
    {
        $this->turn = new Turn(new Hero('Tamark', 10, 10), new Monster('Wolf', 1, 1));
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
}