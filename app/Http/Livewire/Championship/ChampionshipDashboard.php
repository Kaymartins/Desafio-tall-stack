<?php

namespace App\Http\Livewire\Championship;

use App\Models\Championship;
use Livewire\Component;

class ChampionshipDashboard extends Component
{
    public $championshipId;
    public $name;
    public $game;
    public $start_date;
    public $end_date;

    public $teams = [];

    public function mount(Championship $championship)
    {
        $this->championshipId = $championship->id;
        $this->name = $championship->name;
        $this->game = $championship->game;
        $this->start_date = $championship->start_date;
        $this->end_date = $championship->end_date;

        $this->teams = $championship->teams->sortByDesc('points');
    }
    public function render()
    {
        return view('livewire.championship.championship-dashboard')->layout('layouts.index');
    }
}
