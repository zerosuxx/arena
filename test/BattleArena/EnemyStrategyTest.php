<?php

use BattleArena\Action\AttackAction;
use BattleArena\Character\Hero;
use BattleArena\EnemyStrategy;
use BattleArena\Players;
use PHPUnit\Framework\TestCase;

class EnemyStrategyTest extends TestCase
{
    /**
     * @test
     */
    public function getAction_ReturnsAttackAction()
    {

        $playersMock = $this->createMock(Players::class);
        $playersMock
            ->expects($this->once())
            ->method('getHero')
            ->willReturn($this->createMock(Hero::class));

        $strategy = new EnemyStrategy();
        $action = $strategy->getAction($playersMock);
        $this->assertInstanceOf(AttackAction::class, $action);
    }
}