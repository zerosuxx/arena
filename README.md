# Battle Arena
 
This is a turn based game where a hero will fight agains various monsters in a battle arena.
The hero attacks the monster then the monster attacks the hero in each turn.
The battle ends when your hero's health drops below 1 or every enemy monsters
health drops below 1.
At the end of the battle, the winner will be announced.
 
Each level will open a new aspect of the game, making you bless or regret
the previous design decisions of your software. For maximum fun, do not read
the instructions of the further levels until you reach them!
 


## Level 1: Basic combat
```
Given a Hero with the following simple parameters:
{
  "name": "choose_name",
  "health": 50,
  "base_damage": 4
}
 
The Hero has to fight against a Giant Wolf:
{
  "name": "Giant Wolf",
  "health": 16,
  "base_damage": 6
}
```
 
### A sample battle:

```
Turn 1:
  Hero attacks Wolf and does 4 damage (Wolf has 12 health left)
  Wolf attacks Hero and does 6 damage (Hero has 44 health left)
T2:
  Hero attacks Wolf and does 4 damage (Wolf has 8 health left)
  Wolf attacks Hero and does 6 damage (Hero has 38 health left)
T3:
  Hero attacks Wolf and does 4 damage (Wolf has 4 health left)
  Wolf attacks Hero and does 6 damage (Hero has 32 health left)
T4:
  Hero attacks Wolf and does 4 damage (Wolf has 0 health left)
Announcement:
  choose_name has won the battle, 32 health left
```

## Level 2: Multiple enemies

Your Hero will fight against 2 zombies simultaneously.

Every combatant can attack only once in a turn.

```
Hero's parameters:
{
  "name": "choose_name",
  "health": 50,
  "base_damage": 4
}

Zombies looks like this:
{
  "name": "Zombie_N",
  "health": 20,
  "base_damage": 3
}
```
### A sample battle:

```
Turn 1:
  Hero attacks Zombie_1 and does 4 damage (Zombie_1 has 16 health left)
  Zombie_1 attacks Hero and does 3 damage (Hero has 47 health left)
  Zombie_2 attacks Hero and does 3 damage (Hero has 44 health left)
T2:
  Hero attacks Zombie_1 and does 4 damage (Zombie_1 has 12 health left)
  Zombie_1 attacks Hero and does 3 damage (Hero has 41 health left)
  Zombie_2 attacks Hero and does 3 damage (Hero has 38 health left)
T3:
  Hero attacks Zombie_1 and does 4 damage (Zombie_1 has 8 health left)
  Zombie_1 attacks Hero and does 3 damage (Hero has 35 health left)
  Zombie_2 attacks Hero and does 3 damage (Hero has 32 health left)
T4:
  Hero attacks Zombie_1 and does 4 damage (Zombie_1 has 4 health left)
  Zombie_1 attacks Hero and does 3 damage (Hero has 29 health left)
  Zombie_2 attacks Hero and does 3 damage (Hero has 26 health left)
T5:
  Hero attacks Zombie_1 and does 4 damage (Zombie_1 has 0 health left)
  Zombie_2 attacks Hero and does 3 damage (Hero has 23 health left)
```

## Level 3: Equipment
   
Equipped items may change certain calculations in combat.
Eg: An armour with the defense of 1 will reduce the damage taken by it's wearer by 1.
A weapon with the damage of 2 will increase the total damage of your Hero by 2.

Your hero will fight agains an Orc.

```
Hero's parameters:
{
 "name": "choose_name",
 "health": 50,
 "base_damage": 4,
 "equipment": [
   {
     "type": "armour",
     "defense": 1
   },
   {
     "type": "weapon",
     "damage": 2
   }
 ]
}

Orc looks like this:
{
 "name": "Orc",
 "health": 60,
 "base_damage": 5
}
```
### A sample battle:
```
Turn 1:
 Hero attacks Orc and does 4+2 damage (Orc has 54 health left)
 Orc attacks Hero and does 5-1 damage (Hero has 46 health left)
T2:
 Hero attacks Orc and does 4+2 damage (Orc has 8 health left)
 Orc attacks Hero and does 5-1 damage (Hero has 44 health left)
```

## Level 4: Inventory - consumables

In each turn the Hero may decide to use a consumable item instead of attacking.
Consumable items disappear from the inventory after usage.

Your hero will fight agains two Orcs.
```
Hero's parameters:
{
  "name": "choose_name",
  "health": 50,
  "base_damage": 4,
  "equipment": [
    {
      "type": "armour",
      "defense": 2
    },
    {
      "type": "weapon",
      "damage": 4
    }
  ],
  "consumables": [
    {
      "type": "healing_potion",
      "description": "Fully restores health"
    }
  ]
}

Orcs looks like this:
{
  "name": "Orc",
  "health": 60,
  "base_damage": 5
}
```
### A sample battle:
```
Turn 1:
  Hero attacks Orc_1 and does 4+4 damage (Orc_1 has 52 health left)
  Orc_1 attacks Hero and does 5-2 damage (Hero has 47 health left)
  Orc_2 attacks Hero and does 5-2 damage (Hero has 44 health left)
T2:
  Hero attacks Orc_1 and does 4+4 damage (Orc_1 has 44 health left)
  Orc_1 attacks Hero and does 5-2 damage (Hero has 41 health left)
  Orc_2 attacks Hero and does 5-2 damage (Hero has 38 health left)
T3:
  Hero attacks Orc_1 and does 4+4 damage (Orc_1 has 36 health left)
  Orc_1 attacks Hero and does 5-2 damage (Hero has 35 health left)
  Orc_2 attacks Hero and does 5-2 damage (Hero has 32 health left)
T4:
  Hero attacks Orc_1 and does 4+4 damage (Orc_1 has 28 health left)
  Orc_1 attacks Hero and does 5-2 damage (Hero has 29 health left)
  Orc_2 attacks Hero and does 5-2 damage (Hero has 26 health left)
T5:
  Hero attacks Orc_1 and does 4+4 damage (Orc_1 has 20 health left)
  Orc_1 attacks Hero and does 5-2 damage (Hero has 23 health left)
  Orc_2 attacks Hero and does 5-2 damage (Hero has 20 health left)
T6:
  Hero attacks Orc_1 and does 4+4 damage (Orc_1 has 12 health left)
  Orc_1 attacks Hero and does 5-2 damage (Hero has 17 health left)
  Orc_2 attacks Hero and does 5-2 damage (Hero has 14 health left)
T7:
  Hero attacks Orc_1 and does 4+4 damage (Orc_1 has 4 health left)
  Orc_1 attacks Hero and does 5-2 damage (Hero has 11 health left)
  Orc_2 attacks Hero and does 5-2 damage (Hero has 8 health left)
T8:
  Hero attacks Orc_1 and does 4+4 damage (Orc_1 dies)
  Orc_2 attacks Hero and does 5-2 damage (Hero has 5 health left)
T9:
  Hero attacks Orc_2 and does 4+4 damage (Orc_1 has 52 health left)
  Orc_2 attacks Hero and does 5-2 damage (Hero has 2 health left)
T10:
  Hero comsumes a healing_potion (Hero has 50 health left)
  Orc_2 attacks Hero and does 5-2 damage (Hero has 47 health left)
```