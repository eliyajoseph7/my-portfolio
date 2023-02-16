<?php

namespace App\Http\Livewire\Educations;

use App\Models\Education;
use App\Models\User;
use Livewire\Component;

class MyEducation extends Component
{
    public $educations;

    public $action = 'Add';
    public $education_flag = '';
    public $education;
    public $educationId = '';
    public $hide = '';
    
    public function mount()
    {
        $this->education_flag = 'hidden';
    }

    public function render()
    {

        if (auth()->check()) {
            // $this->educations = Education::where('user_id', auth()->user()->id)->first();
        } else {
            $user = User::where('role_id', 1)->first();
            // $this->educations = Education::where('user_id', $user->id)->first();
        }
        return view('livewire.educations.my-education');
    }
}
