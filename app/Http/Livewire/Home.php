<?php

namespace App\Http\Livewire;

use App\Models\Summary;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class Home extends Component
{
    
    protected $listeners = [
        'clearSession',
     ];
     public $mysummary = '';


     
    
    public function mount() {
        //$this->mysummary = Summary::where('user_id', auth()->user()->id)->first()->summary;
    }

    public function render()
    {
        return view('livewire.home')->layout('layouts.frontend.base');
    }




    public function updateSummary($formData) {
        $this->mysummary = $formData['summary'];
        $this->emit('update_mysummary', $this->mysummary);
    }

    public function clearSession() {
        Session::forget('feedback');
    }


}
