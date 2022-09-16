<?php

namespace App\Http\Livewire\Player;

use App\Models\Player;
use App\Models\Team;
use Livewire\Component;

class PlayerIndex extends Component
{
    public $name;
    public $age;
    public $nationality;
    public $wins;
    public $defeats;
    public $team_id = null;

    public $viewPlayer = false;
    public $isEdit = false;

    public $player;

    protected $rules = [
        'name' => 'required',
        'age' => 'required',
        'nationality' => 'required',
        'wins' => 'required',
        'defeats' => 'required',
        'team_id' => 'nullable',
    ];

    public function clearForm()
    {
        $this->viewPlayer = false;
        $this->isEdit = false;
        $this->resetValidation();
        $this->reset();
    }

    public function create()
    {
        $this->viewPlayer = false;
        $this->isEdit = false;
        $this->reset();
    }

    public function submit(){
        $this->validate();

        Player::create([
            'name' => $this->name,
            'age' => $this->age,
            'nationality' => $this->nationality,
            'wins' => $this->wins,
            'defeats' => $this->defeats,
            'team_id' => $this->team_id ?? null,
        ]);

        $this->dispatchBrowserEvent('close-modal');
        $this->reset();
    }

    public function viewPlayer($id)
    {
        $this->viewPlayer = true;

        $this->player = Player::findOrFail($id);
        $this->name = $this->player->name;
        $this->age = $this->player->age;
        $this->nationality = $this->player->nationality;
        $this->wins = $this->player->wins;
        $this->defeats = $this->player->defeats;
        $this->team_id = $this->player->team_id ?? null;

    }

    public function editPlayer($id)
    {

        $this->player = Player::findOrFail($id);

        $this->name = $this->player->name;
        $this->age = $this->player->age;
        $this->nationality = $this->player->nationality;
        $this->wins = $this->player->wins;
        $this->defeats = $this->player->defeats;
        $this->team_id = $this->player->team_id ?? null;

        $this->isEdit = true;
    }

    public function updatePlayer()
    {
        $this->validate();

        if(!$this->team_id){
            $this->team_id = null;
        }

        $this->player->update([
            'name' => $this->name,
            'age' => $this->age,
            'nationality' => $this->nationality,
            'wins' => $this->wins,
            'defeats' => $this->defeats,
            'team_id' => $this->team_id ?? null
        ]);

        $this->dispatchBrowserEvent('close-modal');
    }

    public function deletePlayer($id)
    {
        Player::findOrFail($id)->delete();
        $this->reset();
    }

    public function render()
    {
        return view('livewire.player.player-index',[
            'players' => Player::all(),
            'teams' => Team::all(),
        ])->layout('players.index');
    }
}
