<?php

namespace App\Http\Livewire\Team;

use App\Models\Team;
use Livewire\Component;

class RankingIndex extends Component
{
    public $teams;
    public $country;
    public $filter;

    public function mount()
    {
        $this->teams = Team::all()->sortByDesc('points');
    }

    public function changeFilter()
    {
        if($this->country == null) {
            $this->teams = Team::all()->sortByDesc($this->filter);
        }else{
            $this->teams = Team::all()->sortByDesc($this->filter)->where('country',$this->country);
        }
    }

    public function filterByCountry()
    {
        if($this->country){
            $this->teams = Team::all()->sortByDesc($this->filter)->where('country',$this->country);
        }else{
            $this->country = null;
            $this->teams = Team::all()->sortByDesc($this->filter);
        }
    }

    public function render()
    {
        return view('livewire.team.ranking-index')->layout('layouts.index');
    }
}
