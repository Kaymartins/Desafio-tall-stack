<?php

namespace App\Http\Livewire\Championship;

use App\Models\Championship;
use App\Models\Team;
use Livewire\Component;

class ChampionshipIndex extends Component
{
    public $name;
    public $game;
    public $start_date;
    public $end_date;

    public $viewChampionship = false;
    public $isEdit = false;

    public $championship;
    public $selectedTeams = [];

    public $rules = [
        'name' => 'required|min:3|max:256|string',
        'game' => 'required|max:256|string',
        'start_date' => 'required|date',
        'end_date' => 'required|date',
    ];

    public function clearForm()
    {
        $this->viewChampionship = false;
        $this->isEdit = false;
        $this->resetValidation();
        $this->reset();
    }

    public function removeTeamFromChampionship($championship_id,$team_id){
        $championship = Championship::findOrFail($championship_id);
        $championship->teams()->detach($team_id);
    }

    public function create()
    {
        $this->viewChampionship = false;
        $this->isEdit = false;
        $this->reset();
    }

    public function submit(){
        $this->validate();

        $championship = Championship::create([
            'name' => $this->name,
            'game' => $this->game,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
        ]);

        $championship->teams()->sync($this->selectedTeams);
        $championship->save();

        $this->dispatchBrowserEvent('close-modal');
        $this->reset();
    }

    public function viewChampionship($id){
        $this->viewChampionship = true;

        $this->championship = Championship::findOrFail($id);
        $this->name = $this->championship->name;
        $this->game = $this->championship->game;
        $this->start_date = $this->championship->start_date;
        $this->end_date = $this->championship->end_date;
    }

    public function editChampionship($id){

        $this->championship = Championship::findOrFail($id);
        $this->name = $this->championship->name;
        $this->game = $this->championship->game;
        $this->start_date = $this->championship->start_date;
        $this->end_date = $this->championship->end_date;


        $this->isEdit = true;
    }

    public function updateChampionship(){
        $this->validate();

        $this->championship->update([
            'name' => $this->name,
            'game' => $this->game,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
        ]);

        $this->championship->teams()->sync($this->selectedTeams);
        $this->championship->save();

        $this->reset();
        $this->dispatchBrowserEvent('close-modal');
    }

    public function deleteChampionship($id){
        Championship::findOrFail($id)->delete();
        $this->reset();
    }

    public function render()
    {
        return view('livewire.championship.championship-index',[
            'championships' => Championship::all(),
            'teams' => Team::all(),
        ])->layout('layouts.index');
    }
}
