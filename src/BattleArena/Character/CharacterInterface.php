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
    public function getMaxHealth(): int;

    /**
     * @return void
     */
    public function setHealth(): void;

    /**
     * @return int
     */
    public function getDamage(): int;

    /**
     * @param int $damage
     */
    public function takeDamage(int $damage): void;

    /**
     * @param CharacterInterface $defender
     */
    public function attack(CharacterInterface $defender): void;

    /**
     * @return bool
     */
    public function isAlive(): bool;
}