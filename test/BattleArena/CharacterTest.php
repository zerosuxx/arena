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
}