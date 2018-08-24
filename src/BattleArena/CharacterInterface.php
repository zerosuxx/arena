<?php

namespace BattleArena;


interface CharacterInterface
{
    public function getName(): string;

    /**
     * @return int
     */
    public function getHealth(): int;

    /**
     * @return int
     */
    public function getDamage(): int;

    /**
     * @param int $health
     */
    public function setHealth(int $health): void;

    /**
     * @param int $damage
     */
    public function takeDamage(int $damage): void;

    /**
     * @return bool
     */
    public function isAlive(): bool;
}