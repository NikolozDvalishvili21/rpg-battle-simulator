<?php

namespace App\Models;

abstract class Character {
    protected $name;
    protected $health;
    protected $attackpower;

    public function __construct($name, $health, $attackpower) {
        $this->name = $name;
        $this->health = $health;
        $this->attackpower = $attackpower;
    }

    public function getName() {
        return $this->name;
    }

    public function getHealth() {
        return "\033[31m{$this->health}\033[0m";
    }

    public function attack(Character $opponent) {
        $damage = $this->attackpower;
        $opponent->takeDamage($damage);
    }

    public function takeDamage($damage) {
        $this->health -= $damage;

        if ($this->health < 0) $this->health = 0;
    }

    public function aliveChar() {
        return $this->health > 0;
    }
}
