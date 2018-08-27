<?php

use BattleArena\Character\Monster;
use BattleArena\Consumable\HealingPotion;
use BattleArena\Equipment\Armour;
use BattleArena\Equipment\Weapon;
use BattleArena\Character\Hero;
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
    public function getMaxHealth_ReturnsheroHealthAndMaxHealth()
    {
        $this->hero->takeDamage(10);
        $this->assertEquals(40, $this->hero->getHealth());
        $this->assertEquals(50, $this->hero->getMaxHealth());
    }

    /**
     * @test
     */
    public function setHealth_SetNewHealth_ReturnsNewHealth()
    {
        $this->hero->setHealth(80);
        $this->assertEquals(80, $this->hero->getHealth());
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
        $this->hero->takeDamage(49);

        $this->assertEquals(50, $this->hero->getHealth());
    }

    /**
     * @test
     */
    public function getHealth_UseOneHealingPotionConsumableAndNotAttack_ReturnsFullHealth()
    {
        $this->hero->addConsumable(new HealingPotion());

        $monster = new Monster('Orc', 60, 40);
        $monster->attack($this->hero);
        $this->hero->attack($monster);

        $this->assertEquals(60, $monster->getHealth());
        $this->assertEquals(50, $this->hero->getHealth());
    }
}