<?php

namespace BattleArena\Character;

interface CharacterInterface
{
    /**
     * @return string
     */
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
     * @param int $damage
     */
    public function takeDamage(int $damage): void;

    /**
     * @return bool
     */
    public function isAlive(): bool;
}