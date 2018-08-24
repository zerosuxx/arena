<?php

use BattleArena\Equipment\Weapon;
use PHPUnit\Framework\TestCase;

class WeaponTest extends TestCase
{
    /**
     * @var Weapon
     */
    private $weapon;

    protected function setUp()
    {
        $this->weapon = new Weapon(10);
    }

    /**
     * @test
     */
    public function getDamage_ReturnsDamage()
    {
        $this->assertEquals(10, $this->weapon->getDamage());
    }

    /**
     * @test
     */
    public function getDefense_ReturnsZero()
    {
        $this->assertEquals(0, $this->weapon->getDefense());
    }
}