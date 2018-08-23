<?php

use BattleArena\Character;
use BattleArena\Enemies;
use PHPUnit\Framework\TestCase;

class EnemiesTest extends TestCase
{
    /**
     * @var Enemies
     */
    private $enemies;

    protected function setUp()
    {
        $this->enemies = new Enemies(new Character('Zombie1', 20, 5));
        $this->enemies->addEnemy(new Character('Zombie2', 30, 5));
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
    public function getHealth_HasMultipleEnemiesMinusOneEnemyHealth_ReturnsSumOfHealth()
    {
        $this->enemies->setHealth($this->enemies->getHealth() - 30);
        $this->assertEquals(30, $this->enemies->getHealth());
    }

}