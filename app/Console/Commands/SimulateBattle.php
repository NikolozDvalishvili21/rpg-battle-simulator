<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Warrior;
use App\Models\Mage;
use App\Models\Battle;

class SimulateBattle extends Command
{
    // Command signature
    protected $signature = 'simulate:battle';

    // Command description
    protected $description = 'Simulate a battle between characters';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $warrior = new Warrior('Aragorn', 100, 25);
        $mage = new Mage('Gandalf', 100, 20);

        $battle = new Battle($warrior, $mage);
        $battle->startBattle();

        while ($warrior->aliveChar() && $mage->aliveChar()) {
            $battle->nextTurn();
        }
    }
}
