<?php

use BattleArena\Character\Hero;
use BattleArena\Consumable\HealingPotion;
use PHPUnit\Framework\TestCase;

class HealingPotionTest extends TestCase
{
    /**
     * @var HealingPotion
     */
    private $healingPotion;

    protected function setUp()
    {
        $this->healingPotion = new HealingPotion();
    }

    /**
     * @test
     */
    public function use_IncreaseCharacterHealth()
    {
        $character = new Hero('Joe', 20, 10);
        $character->takeDamage(10);
        $this->healingPotion->use($character);
        $this->assertEquals(20, $character->getHealth());
    }
}