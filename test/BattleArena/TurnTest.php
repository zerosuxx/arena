<?php

use BattleArena\Character\Hero;
use BattleArena\Character\Monster;
use BattleArena\Character\Players;
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
        $this->turn = new Turn();
    }

    /**
     * @test
     */
    public function doTurn_HeroAttackedMonsterAndMonsterAttackedHero_DecreaseHealths()
    {
        $this->turn->doTurn($this->getPlayersMock(true, $this->once()));
    }

    /**
     * @test
     */
    public function doTurn_HeroKilledMonster_MonsterDoesNotHitBack()
    {
        $this->turn->doTurn($this->getPlayersMock(false, $this->never()));
    }

    /**
     * @param $enemyIsAlive
     * @param $attackInvokeTimes
     * @return \PHPUnit\Framework\MockObject\MockObject|Players
     */
    private function getPlayersMock($enemyIsAlive, $attackInvokeTimes)
    {
        $heroMock = $this->createMock(Hero::class);
        $heroMock
            ->expects($this->once())
            ->method('playTurn');

        $enemyMock = $this->createMock(Monster::class);
        $enemyMock
            ->expects($this->once())
            ->method('isAlive')
            ->willReturn($enemyIsAlive);

        $enemyMock
            ->expects($attackInvokeTimes)
            ->method('attack');

        $playersMock = $this->createMock(Players::class);
        $playersMock
            ->expects($this->once())
            ->method('getHero')
            ->willReturn($heroMock);
        $playersMock
            ->expects($this->once())
            ->method('getEnemy')
            ->willReturn($enemyMock);
        return $playersMock;
    }
}