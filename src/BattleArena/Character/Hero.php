<?php

namespace BattleArena\Character;

use BattleArena\Consumable\ConsumableInterface;
use BattleArena\Equipment\EquipmentInterface;

/**
 * Class Hero
 * @package BattleArena
 */
class Hero implements CharacterInterface
{
    use SimpleCharacterTrait;

    /**
     * @var int
     */
    private $maxHealth;

    /**
     * @var EquipmentInterface[]
     */
    private $equipments = [];

    /**
     * @var ConsumableInterface[]
     */
    private $consumables = [];

    public function __construct(string $name, int $health, int $damage)
    {
        $this->init($name, $health, $damage);
        $this->maxHealth = $health;
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
        $damage -= array_reduce($this->equipments, function ($sum, EquipmentInterface $equipment) {
            $sum += $equipment->getDefense();
            return $sum;
        }, 0);

        $health = $this->getHealth();
        $health -= max(0, $damage);

        $this->health = $health;
    }

    public function attack(CharacterInterface $defender): void
    {
        $consumable = current($this->consumables);
        if ($consumable && $defender->getHealth() > $this->getDamage() && $defender->getDamage() >= $this->getHealth()) {
            $consumable->use($this);
            array_shift($this->consumables);
            return;
        }

        $defender->takeDamage($this->getDamage());
    }

    /**
     * @param EquipmentInterface $equipment
     */
    public function addEquipment(EquipmentInterface $equipment)
    {
        $this->equipments[] = $equipment;
    }

    /**
     * @param ConsumableInterface $consumable
     */
    public function addConsumable(ConsumableInterface $consumable)
    {
        $this->consumables[] = $consumable;
    }

    public function getMaxHealth(): int
    {
        return $this->maxHealth;
    }

    public function setHealth(int $health): void
    {
        $this->health = $health;
    }

}