<?php

use BattleArena\Action\AttackAction;
use PHPUnit\Framework\TestCase;

class AttackActionTest extends TestCase
{
    /**
     * @test
     */
    public function perform_TakeDamageHero()
    {
        $attackerMock = $this->createMock(\BattleArena\Character\CharacterInterface::class);
        $attackerMock
            ->expects($this->once())
            ->method('getDamage')
            ->willReturn(1);

        $targetMock = $this->createMock(\BattleArena\Character\CharacterInterface::class);
        $targetMock
            ->expects($this->once())
            ->method('takeDamage');

        $action = new AttackAction($attackerMock);
        $action->perform($targetMock);
    }
}