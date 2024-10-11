<?php

namespace App\Models;

class Mage extends Character
{
    public function attack(Character $opponent)
    {
        // რენდომ ზიანი 20 - 40
        $damage = rand(20, 40);
        $opponent->takeDamage($damage);
        return "{$this->name} casts a spell on {$opponent->getName()} for {$damage} damage! {$opponent->getName()} health: {$opponent->getHealth()}";
    }

    public function heal()
    {
        // დაიჰილოს 30 health point-ით 
        $this->health += 30;
        if ($this->health > 100) $this->health = 100; // მაქს 100HP რომ დაჰილვით არ აცდეს 100-ს
        return "{$this->name} heals for \033[32m30\033[0m health! Current health: \033[31m{$this->health}\033[0m";
    }
}
