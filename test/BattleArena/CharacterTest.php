<?php

use PHPUnit\Framework\TestCase;

class CharacterTest extends TestCase
{
    /**
     * @var \BattleArena\Character
     */
    private $character;

    public function setUp()
    {
        $this->character = new BattleArena\Character('Tamark', 50, 5);
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
    public function setHealth_AddNewHealth_ReturnsChangedHealth()
    {
        $this->character->setHealth(100);
        $this->assertEquals(100, $this->character->getHealth());
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
    public function isAlive_CharacterHas10Health_ReturnsIsAlive()
    {
        $this->character->setHealth(10);
        $this->assertEquals(true, $this->character->isAlive());
    }

    /**
     * @test
     */
    public function isAlive_CharacterHas0Health_ReturnsIsNotAlive()
    {
        $this->character->setHealth(0);
        $this->assertEquals(false, $this->character->isAlive());
    }
}