<?php

namespace App\Http\Livewire\Team;

use App\Models\Player;
use App\Models\Team;
use Livewire\Component;
use Livewire\WithPagination;

class TeamIndex extends Component
{
    use WithPagination;

    public $name;
    public $country;
    public $points;
    public $wins;
    public $defeats;

    public $viewTeam = false;
    public $isEdit = false;

    public $team;
    public $players = [];

    protected $rules = [
        'name' => 'required|min:3|max:256|string',
        'country' => 'required|max:256|string',
        'points' => 'required|numeric|gte:0',
        'wins' => 'required|numeric|gte:0',
        'defeats' => 'required|numeric|gte:0',
    ];

    public function clearForm()
    {
        $this->viewTeam = false;
        $this->isEdit = false;
        $this->resetValidation();
        $this->reset();
    }

    public function create()
    {
        $this->viewTeam = false;
        $this->isEdit = false;
        $this->reset();
    }

    public function submit(){
        $this->validate();

        Team::create([
            'name' => $this->name,
            'country' => $this->country,
            'points' => $this->points,
            'wins' => $this->wins,
            'defeats' => $this->defeats
        ]);

        $this->dispatchBrowserEvent('close-modal');
        $this->reset();
    }

    public function viewTeam($id)
    {
        $this->viewTeam = true;

        $this->team = Team::findOrFail($id);
        $this->name = $this->team->name;
        $this->country = $this->team->country;
        $this->points = $this->team->points;
        $this->wins = $this->team->wins;
        $this->defeats = $this->team->defeats;

        $this->players = $this->team->find($id)->players;
    }

    public function editTeam($id)
    {
        $this->team = Team::findOrFail($id);
        $this->name = $this->team->name;
        $this->country = $this->team->country;
        $this->points = $this->team->points;
        $this->wins = $this->team->wins;
        $this->defeats = $this->team->defeats;
        $this->isEdit = true;
    }

    public function updateTeam()
    {
        $this->validate();

        $this->team->update([
            'name' => $this->name,
            'country' => $this->country,
            'points' => $this->points,
            'wins' => $this->wins,
            'defeats' => $this->defeats,
        ]);

        $this->dispatchBrowserEvent('close-modal');
    }

    public function deleteTeam($id)
    {
        Team::findOrFail($id)->delete();
        $this->reset();
    }

    public function render()
    {
        return view('livewire.team.team-index',[
            'teams' => Team::all(),
        ])->layout('teams.index');
    }
}
