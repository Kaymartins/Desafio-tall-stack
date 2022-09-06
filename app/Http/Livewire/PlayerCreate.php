<?php

namespace App\Http\Livewire;

use App\Models\Player;
use Livewire\Component;

class PlayerCreate extends Component
{
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
    
    public function render()
    {
        return view('livewire.player-create');
    }
}
