<?php

namespace App\Http\Livewire\Player;

use App\Models\Player;
use Livewire\Component;

class PlayerEdit extends Component
{
    public $playerId;
    public $name;
    public $age;
    public $nationality;
    public $wins;
    public $defeats;

    protected $rules = [
        'name' => 'required',
        'age' => 'required',
        'nationality' => 'required',
        'wins' => 'required',
        'defeats' => 'required',
    ];

    public function mount(Player $player)
    {

        $this->playerId = $player->id;
        $this->name = $player->name;
        $this->age = $player->age;
        $this->nationality = $player->nationality;
        $this->wins = $player->wins;
        $this->defeats = $player->defeats;

    }

    public function update(){
        $player = Player::find($this->playerId);

        $this->validate();

        $player->update([
            'name' => $this->name,
            'age' => $this->age,
            'nationality' => $this->nationality,
            'wins' => $this->wins,
            'defeats' => $this->defeats
        ]);

        session()->flash('message','Jogador atualizado com sucesso!');
    }

    public function render()
    {
        return view('livewire.player.player-edit')->layout('players.edit');
    }
}
