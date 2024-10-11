<?php

namespace App\Models;

class Battle
{
    private $character1;
    private $character2;
    private $turns = 0;

    public function __construct(Character $character1, Character $character2)
    {
        $this->character1 = $character1;
        $this->character2 = $character2;
    }

    public function startBattle()
    {
        echo "Starting battle between {$this->character1->getName()} and {$this->character2->getName()}!\n";
    }

    public function nextTurn()
    {
        $this->turns++;
        echo ">> Round {$this->turns}:\n";

        // რენდომულად რომელი ქერექთერი შეუტევს პირველი (მემგონი ამ ლოგიკის დაწერა უფრო მარტივადაც შეიძლება)
        if (rand(0, 1) === 0) {
            $this->performTurn($this->character1, $this->character2);
            if (!$this->character2->aliveChar()) return $this->endBattle($this->character1, $this->character2);

            $this->performTurn($this->character2, $this->character1);
            if (!$this->character1->aliveChar()) return $this->endBattle($this->character2, $this->character1);
        } else {
            $this->performTurn($this->character2, $this->character1);
            if (!$this->character1->aliveChar()) return $this->endBattle($this->character2, $this->character1);

            $this->performTurn($this->character1, $this->character2);
            if (!$this->character2->aliveChar()) return $this->endBattle($this->character1, $this->character2);
        }
    }

    private function performTurn(Character $attacker, Character $defender)
    {
        if ($attacker instanceof Mage && rand(0, 2) === 1) {
            echo $attacker->heal() . "\n";
        } else {
            echo $attacker->attack($defender) . "\n";
        }
    }

    private function endBattle(Character $winner, Character $loser)
    {
        echo "========= End of Battle =========\n";
        echo "{$loser->getName()} has been defeated!\n";
        echo "Winner: {$winner->getName()}\n";
        echo "Total turns: {$this->turns}\n";
    }
}
