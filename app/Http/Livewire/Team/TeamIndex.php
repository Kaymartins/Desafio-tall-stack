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
    public $selectedPlayers = [];

    //array com todos os players sem time
    public $players = [];

    //jogador selecionado para entrar no time
    public $playersOnTeam;

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

    public function removePlayerFromTeam($id)
    {
        Player::findOrFail($id)->update([
            'team_id' => null
        ]);

        $this->playersOnTeam = $this->team->find($this->team->id)->players;
    }

    public function create()
    {
        $this->viewTeam = false;
        $this->isEdit = false;
        $this->reset();
    }

    public function submit(){
        $this->validate();

        $team = Team::create([
            'name' => $this->name,
            'country' => $this->country,
            'points' => $this->points,
            'wins' => $this->wins,
            'defeats' => $this->defeats
        ]);

        foreach($this->selectedPlayers as $player){
            $player = Player::findOrFail($player);
            $player->update([
                'team_id' => $team->id,
            ]);
        }

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

        $this->playersOnTeam = $this->team->find($id)->players;
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

        foreach($this->selectedPlayers as $player){
            $player = Player::findOrFail($player);
            $player->update([
                'team_id' => $this->team->id,
            ]);
        }

        $this->reset();
        $this->dispatchBrowserEvent('close-modal');
    }

    public function deleteTeam($id)
    {
        Team::findOrFail($id)->delete();
        $this->reset();
    }

    public function render()
    {
        $this->players = Player::all()->where('team_id',null);

        return view('livewire.team.team-index',[
            'teams' => Team::all(),
        ])->layout('layouts.index');
    }
}
