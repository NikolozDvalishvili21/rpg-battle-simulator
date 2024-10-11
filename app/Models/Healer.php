<?php

namespace App\Models;

class Healer extends Character {
    public function heal() {
    $this->health += 30;

    return "{$this->name} heals for 30HP";
}
}

