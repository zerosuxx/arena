<?php

use BattleArena\Character\CharacterInterface;
use BattleArena\Character\Hero;
use BattleArena\Character\Monster;
use BattleArena\Players;
use PHPUnit\Framework\TestCase;

class PlayersTest extends TestCase
{

    /**
     * @var Players
     */
    private $players;

    protected function setUp()
    {
        $this->players = new Players(new Hero('Tamark', 2, 1), new Monster('Wolf', 2, 1));
    }

    /**
     * @test
     */
    public function getHero_ReturnsHeroInstance()
    {
        $this->assertInstanceOf(Hero::class, $this->players->getHero());
    }

    /**
     * @test
     */
    public function getEnemy_ReturnsCharacterInterfaceInstance()
    {
        $this->assertInstanceOf(CharacterInterface::class, $this->players->getEnemy());
    }
}