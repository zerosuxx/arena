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
    }

    /**
     * @test
     */
    public function getHealth_HasMultipleEnemies_ReturnsSumOfHealth()
    {
        $this->enemies->addEnemy(new Character('Zombie2', 30, 5));
        $this->assertEquals(50, $this->enemies->getHealth());
    }

}