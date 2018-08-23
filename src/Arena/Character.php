<?php

namespace Arena;

class Character
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var int
     */
    private $health;

    /**
     * Character constructor.
     * @param string $name
     * @param int $health
     * @param int $damage
     */
    public function __construct(string $name, int $health, int $damage)
    {
        $this->name = $name;
        $this->health = $health;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getHealth(): int
    {
        return $this->health;
    }


}