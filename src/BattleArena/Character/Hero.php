<?php

namespace BattleArena\Character;

use BattleArena\Equipment\EquipmentInterface;

/**
 * Class Hero
 * @package BattleArena
 */
class Hero implements CharacterInterface
{
    use SimpleCharacterTrait;

    /**
     * @var EquipmentInterface[]
     */
    private $equipments = [];

    public function __construct(string $name, int $health, int $damage)
    {
        $this->init($name, $health, $damage);
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
        $health = $this->getHealth();
        $health += array_reduce($this->equipments, function ($sum, EquipmentInterface $equipment) {
            $sum += $equipment->getDefense();
            return $sum;
        }, 0);
        $health -= $damage;

        $this->health = $health;
    }

    /**
     * @param EquipmentInterface $equipment
     */
    public function addEquipment(EquipmentInterface $equipment)
    {
        $this->equipments[] = $equipment;
    }
}