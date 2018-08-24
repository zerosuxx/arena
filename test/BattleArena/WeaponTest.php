<?php

use BattleArena\Weapon;
use PHPUnit\Framework\TestCase;

class WeaponTest extends TestCase
{
    /**
     * @test
     */
    public function getDamage_ReturnsDamage()
    {
        $weapon = new Weapon(10);

        $this->assertEquals(10, $weapon->getDamage());
    }
}