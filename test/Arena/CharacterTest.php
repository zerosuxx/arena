<?php

use PHPUnit\Framework\TestCase;

class CharacterTest extends TestCase
{
    /**
     * @test
     */
    public function getName_ReturnsCharacterName()
    {
        $character = new Arena\Character([
            "name" => "Tamas",
            "health" => 50,
            "base_damage" => 4
        ]);
        $this->assertEquals('Tamas', $character->getName());
    }
}