<?php

namespace App\Http\Livewire\Team;

use App\Models\Player;
use App\Models\Team;
use Livewire\Component;

class TeamIndex extends Component
{
    public $name;
    public $country;
    public $points;
    public $wins;
    public $defeats;
    public $isEdit = false;

    public $team;

    protected $rules = [
        'name' => 'required|min:3|max:256|string',
        'country' => 'required|max:256|string',
        'points' => 'required|numeric|gte:0',
        'wins' => 'required|numeric|gte:0',
        'defeats' => 'required|numeric|gte:0',
    ];

    public function clearForm()
    {
        $this->reset();
        $this->resetValidation();
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

        $this->reset();
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

    public function updatePlayer()
    {
        $this->validate();

        $this->team->update([
            'name' => $this->name,
            'country' => $this->country,
            'points' => $this->points,
            'wins' => $this->wins,
            'defeats' => $this->defeats,
        ]);
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
