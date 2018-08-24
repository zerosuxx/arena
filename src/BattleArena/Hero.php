<?php

namespace BattleArena;

/**
 * Class Hero
 * @package BattleArena
 */
class Hero implements CharacterInterface
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
     * @var int
     */
    private $damage;

    /**
     * @var EquipmentInterface
     */
    private $equipment;

    public function __construct(string $name, int $health, int $damage)
    {
        $this->name = $name;
        $this->health = $health;
        $this->damage = $damage;
    }

    /**
     * @return string
     */
    public function getName(): string
    {

    }

    /**
     * @return int
     */
    public function getHealth(): int
    {
        // TODO: Implement getHealth() method.
    }

    /**
     * @return int
     */
    public function getDamage(): int
    {
        $damage = $this->damage;
        $damage += $this->equipment->getDamage();
        return $damage;
    }

    /**
     * @param int $damage
     */
    public function takeDamage(int $damage): void
    {
        // TODO: Implement takeDamage() method.
    }

    /**
     * @return bool
     */
    public function isAlive(): bool
    {
        // TODO: Implement isAlive() method.
    }

    public function addEquipment(EquipmentInterface $equipment)
    {
        $this->equipment = $equipment;
    }
}