<?php

namespace Arena;

class Character
{
    private $name;
    public function __construct(array $array)
    {
        $this->name = $array['name'];
    }

    public function getName(): string
    {
        return $this->name;
    }
}