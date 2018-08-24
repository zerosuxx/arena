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
     * @var EquipmentInterface[]
     */
    private $equipments = [];

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
        return $this->name;
    }

    /**
     * @return int
     */
    public function getHealth(): int
    {
        return $this->health;
    }

    /**
     * @return int
     */
    public function getDamage(): int
    {
        $damage = $this->damage;
        $damage += array_reduce($this->equipments, function ($sum, EquipmentInterface $equipment) {
            $sum += $equipment->getDamage();
            return $sum;
        }, 0);
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
        return $this->getHealth() > 0;
    }

    public function addEquipment(EquipmentInterface $equipment)
    {
        $this->equipments[] = $equipment;
    }
}