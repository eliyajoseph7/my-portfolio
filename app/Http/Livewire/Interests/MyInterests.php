<?php

namespace App\Http\Livewire\Interests;

use App\Models\Interest;
use App\Models\User;
use Livewire\Component;

class MyInterests extends Component
{
    public $interests;

    public $action = 'Add';
    public $interest_flag = '';
    public $interest;
    public $interestId = '';
    public $hide = '';
    
    public function mount()
    {
        $this->interest_flag = 'hidden';
    }

    public function render()
    {

        if (auth()->check()) {
            // $this->interests = Interest::where('user_id', auth()->user()->id)->first();
        } else {
            $user = User::where('role_id', 1)->first();
            // $this->interests = Interest::where('user_id', $user->id)->first();
        }
        return view('livewire.interests.my-interests');
    }
}
