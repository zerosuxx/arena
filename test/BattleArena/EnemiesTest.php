<?php

use BattleArena\Character\Monster;
use BattleArena\Character\Enemies;
use PHPUnit\Framework\TestCase;

class EnemiesTest extends TestCase
{
    /**
     * @var Enemies
     */
    private $enemies;

    protected function setUp()
    {
        $this->enemies = new Enemies(new Monster('Zombie1', 20, 5));
        $this->enemies->addEnemy(new Monster('Zombie2', 30, 5));
    }

    /**
     * @test
     */
    public function getHealth_HasMultipleEnemies_ReturnsSumOfHealth()
    {
        $this->assertEquals(50, $this->enemies->getHealth());
    }

    /**
     * @test
     */
    public function getName_ReturnsEnemiesName()
    {
        $this->assertEquals('Enemies', $this->enemies->getName());
    }

    /**
     * @test
     */
    public function getDamage_HasMultipleEnemies_ReturnsSumOfDamage()
    {
        $this->assertEquals(10, $this->enemies->getDamage());
    }

    /**
     * @test
     */
    public function getHealth_HasMultipleEnemiesTakeDamageOneTime_ReturnsSumOfHealth()
    {
        $this->enemies->takeDamage(30);
        $this->assertEquals(30, $this->enemies->getHealth());
    }

    /**
     * @test
     */
    public function getHealth_HasMultipleEnemiesTakeDamageThreeTimes_ReturnsSumOfHealth()
    {
        $this->enemies->takeDamage(30);
        $this->enemies->takeDamage(30);
        $this->enemies->takeDamage(30);
        $this->assertEquals(0, $this->enemies->getHealth());
    }

}