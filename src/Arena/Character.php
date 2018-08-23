<?php

namespace Arena;

class Character
{
    private $name;

    public function __construct(string $name, int $health, int $damage)
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }
}