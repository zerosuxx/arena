<?php

namespace BattleArena\Character;

use BattleArena\Consumable\ConsumableInterface;
use BattleArena\Equipment\EquipmentInterface;

class Hero extends Character implements CharacterInterface
{
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
        parent::__construct($name, $health, $damage);
        $this->maxHealth = $health;
    }

    /**
     * @return int
     */
    public function getDamage(): int
    {
        $damage = $this->arraySum($this->equipments, function (EquipmentInterface $equipment) {
            return $equipment->getDamage();
        }, $this->damage);
        return $damage;
    }

    /**
     * @param int $damage
     */
    public function takeDamage(int $damage, int $multiplier = 1): void
    {
        $damage -= $this->arraySum($this->equipments, function (EquipmentInterface $equipment) use ($multiplier) {
            return $equipment->getDefense() * $multiplier;
        });

        $health = $this->getHealth();
        $health -= max(0, $damage);

        $this->health = $health;
    }

    /**
     * @param Players $players
     */
    public function playTurn(Players $players)
    {
        $this->attack($players->getEnemy());
    }

    public function attack(CharacterInterface $defender): void
    {
        $consumable = current($this->consumables);
        if ($this->canUseHealingPotion($defender, $consumable)) {
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

    /**
     * @param CharacterInterface $defender
     * @param $consumable
     * @return bool
     */
    private function canUseHealingPotion(CharacterInterface $defender, $consumable): bool
    {
        return $consumable && $defender->getHealth() > $this->getDamage() && $defender->getDamage() >= $this->getHealth();
    }

    /**
     * @param array $data
     * @param callable $callback
     * @param int $start [optional]
     * @return int
     */
    private function arraySum(array $data, callable $callback, int $start = 0)
    {
        return array_reduce($data, function ($sum, $value) use ($callback) {
            $sum += $callback($value);
            return $sum;
        }, $start);
    }

    /**
     * Count elements of an object
     * @link http://php.net/manual/en/countable.count.php
     * @return int The custom count as an integer.
     * </p>
     * <p>
     * The return value is cast to an integer.
     * @since 5.1.0
     */
    public function count()
    {
        return 1;
    }
}