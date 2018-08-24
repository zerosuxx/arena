<?php

use BattleArena\Equipment\Armour;
use PHPUnit\Framework\TestCase;

class ArmourTest extends TestCase
{
    /**
     * @var Armour
     */
    private $armour;

    protected function setUp()
    {
        $this->armour = new Armour(10);
    }

    /**
     * @test
     */
    public function getDamage_ReturnsZero()
    {
        $this->assertEquals(0, $this->armour->getDamage());
    }

    /**
     * @test
     */
    public function getDefense_ReturnsDefense()
    {
        $this->assertEquals(10, $this->armour->getDefense());
    }
}