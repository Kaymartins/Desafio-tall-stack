<?php

namespace App\Http\Livewire\Player;

use App\Models\Player;
use Livewire\Component;

class PlayerIndex extends Component
{
    public $name;
    public $age;
    public $nationality;
    public $wins;
    public $defeats;
    public $isEdit = false;

    public $player;

    protected $rules = [
        'name' => 'required',
        'age' => 'required',
        'nationality' => 'required',
        'wins' => 'required',
        'defeats' => 'required',
    ];

    public function clearForm()
    {
        $this->reset();
        $this->resetValidation();
    }

    public function submit(){
        $this->validate();

        Player::create([
            'name' => $this->name,
            'age' => $this->age,
            'nationality' => $this->nationality,
            'wins' => $this->wins,
            'defeats' => $this->defeats
        ]);

        $this->reset();
    }

    public function editPlayer($id)
    {
        $this->player = Player::findOrFail($id);
        $this->name = $this->player->name;
        $this->age = $this->player->age;
        $this->nationality = $this->player->nationality;
        $this->wins = $this->player->wins;
        $this->defeats = $this->player->defeats;
        $this->isEdit = true;
    }

    public function updatePlayer()
    {
        $this->validate();

        $this->player->update([
            'name' => $this->name,
            'age' => $this->age,
            'nationality' => $this->nationality,
            'wins' => $this->wins,
            'defeats' => $this->defeats,
        ]);
    }

    public function deletePlayer($id)
    {
        Player::findOrFail($id)->delete();
        $this->reset();
    }

    public function render()
    {
        return view('livewire.player.player-index',[
            'players' => Player::all()
        ])->layout('players.index');
    }
}
