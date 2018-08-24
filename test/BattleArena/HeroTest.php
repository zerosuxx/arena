<?php

use BattleArena\Armour;
use BattleArena\Hero;
use BattleArena\Weapon;
use PHPUnit\Framework\TestCase;

class HeroTest extends TestCase
{
    /**
     * @var Hero
     */
    private $hero;

    protected function setUp()
    {
        $this->hero = new Hero('Tamark', 50, 10);
    }

    /**
     * @test
     */
    public function getDamage_UseOneWeapon_ReturnsFullDamage()
    {
        $this->hero->addEquipment(new Weapon(10));

        $this->assertEquals(20, $this->hero->getDamage());
    }

    /**
     * @test
     */
    public function getDamage_UseMultipleWeapon_ReturnsFullDamage()
    {
        $this->hero->addEquipment(new Weapon(10));
        $this->hero->addEquipment(new Weapon(20));
        $this->hero->addEquipment(new Weapon(30));

        $this->assertEquals(70, $this->hero->getDamage());
    }

    /**
     * @test
     */
    public function getHealth_UseOneArmour_ReturnsCorrectHealth()
    {
        $this->hero->addEquipment(new Armour(10));
        $this->hero->takeDamage(10);

        $this->assertEquals(50, $this->hero->getHealth());
    }

    /**
     * @test
     */
    public function getHealth_UseMultipleArmour_ReturnsCorrectHealth()
    {
        $this->hero->addEquipment(new Armour(25));
        $this->hero->addEquipment(new Armour(25));
        $this->hero->takeDamage(10);

        $this->assertEquals(90, $this->hero->getHealth());
    }
}