<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Home extends Component
{
    
    protected $listeners = [
        'getSkills'
     ];
     
    
    public function mount() {
        app('App\Http\Livewire\ProjectAndSkill')->skills();
    }

    public function render()
    {
        return view('livewire.home')->layout('layouts.frontend.base');
    }





    public function getSkills($value)
    {
        dd('$value');
        $this->skills = $value;
    }
}
