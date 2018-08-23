<?php

use PHPUnit\Framework\TestCase;

class CharacterTest extends TestCase
{
    private $character;

    public function setUp()
    {
        $this->character = new Arena\Character([
            "name" => "Tamas",
            "health" => 50,
            "base_damage" => 4
        ]);
    }

    /**
     * @test
     */
    public function getName_ReturnsCharacterName()
    {

        $this->assertEquals('Tamas', $this->character->getName());
    }
}