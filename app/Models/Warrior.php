<?php

namespace App\Models;

class Warrior extends Character
{
    public function attack(Character $opponent)
    {
        // რენდომ ზიანის მიყენება 25 - 35
        $damage = rand(25, 35);
        $opponent->takeDamage($damage);
        return "{$this->name} strikes {$opponent->getName()} with a sword for {$damage} damage! {$opponent->getName()} health: {$opponent->getHealth()}";
    }
}
