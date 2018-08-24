<?php

use BattleArena\Character\Character;
use PHPUnit\Framework\TestCase;

class CharacterTest extends TestCase
{
    /**
     * @var Character
     */
    private $character;

    public function setUp()
    {
        $this->character = new Character('Tamark', 50, 5);
    }

    /**
     * @test
     */
    public function getName_ReturnsCharacterName()
    {
        $this->assertEquals('Tamark', $this->character->getName());
    }

    /**
     * @test
     */
    public function getHealth_ReturnsCharacterHealth()
    {
        $this->assertEquals(50, $this->character->getHealth());
    }

    /**
     * @test
     */
    public function getDamage_ReturnsCharacterDamage()
    {
        $this->assertEquals(5, $this->character->getDamage());
    }

    /**
     * @test
     */
    public function takeDamage_Damaged10_ReturnsNewHealth()
    {
        $this->character->takeDamage(10);
        $this->assertEquals(40, $this->character->getHealth());
    }

    /**
     * @test
     */
    public function attack_CharacterHas_ReturnsIsNotAlive()
    {
        $orc = new Character('Orc', 50, 10);
        $this->character->attack($orc);
        $this->assertEquals(45, $orc->getHealth());
    }

    /**
     * @test
     */
    public function isAlive_CharacterHas10Health_ReturnsIsAlive()
    {
        $this->character->takeDamage(10);
        $this->assertEquals(true, $this->character->isAlive());
    }

    /**
     * @test
     */
    public function isAlive_CharacterHas0Health_ReturnsIsNotAlive()
    {
        $this->character->takeDamage(50);
        $this->assertEquals(false, $this->character->isAlive());
    }
}