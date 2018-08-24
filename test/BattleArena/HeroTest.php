<?php

use BattleArena\Hero;
use BattleArena\Weapon;
use PHPUnit\Framework\TestCase;

class HeroTest extends TestCase
{
    /**
     * @test
     */
    public function getDamage_UseOneWeapon_ReturnsFullDamage()
    {
        $hero = new Hero('Tamark', 50, 10);
        $hero->addEquipment(new Weapon(10));

        $this->assertEquals(20, $hero->getDamage());
    }

    /**
     * @test
     */
    public function getDamage_UseMultipleWeapon_ReturnsFullDamage()
    {
        $hero = new Hero('Tamark', 50, 10);
        $hero->addEquipment(new Weapon(10));
        $hero->addEquipment(new Weapon(20));
        $hero->addEquipment(new Weapon(30));

        $this->assertEquals(70, $hero->getDamage());
    }
}