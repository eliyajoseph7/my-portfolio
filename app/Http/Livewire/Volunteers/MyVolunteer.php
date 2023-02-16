<?php

namespace App\Http\Livewire\Volunteers;

use App\Models\User;
use App\Models\Volunteer;
use Livewire\Component;

class MyVolunteer extends Component
{
    public $volunteers;

    public $action = 'Add';
    public $volunteer_flag = '';
    public $volunteer;
    public $volunteerId = '';
    public $hide = '';
    
    protected $rules = [
        'volunteer' => 'required|min:5',
    ];
    protected $listeners = ['deleteVolunteer'];
    

    public function mount()
    {
        $this->volunteer_flag = 'hidden';
    }

    public function render()
    {

        if (auth()->check()) {
            $this->volunteers = Volunteer::where('user_id', auth()->user()->id)->first();
        } else {
            $user = User::where('role_id', 1)->first();
            $this->volunteers = Volunteer::where('user_id', $user->id)->first();
        }
        return view('livewire.volunteers.my-volunteer');
    }

    public function showAddVolunteer()
    {
        $this->volunteer_flag = '';
        $this->hide = 'hidden';
        $this->action = 'Add';
        $this->reset('volunteer');

        $volunteer = Volunteer::where('user_id', auth()->user()->id)->first();
        if($volunteer) {
            $this->emit('update-volunteer', $volunteer->volunteer);
            $this->volunteerId = $volunteer->id;
            $this->action = 'Edit';
        }
    }

    public function hideAddVolunteer()
    {
        $this->volunteer_flag = 'hidden';
        $this->reset('hide');
    }
    
    public function addVolunteer($formData)
    {
        $this->volunteer = $formData['volunteer'];
        $this->validate();
        Volunteer::create([
            'volunteer' => $this->volunteer,
            'user_id' => auth()->user()->id
        ]);
        // array_push($this->volunteers, $this->volunteer);
        session()->flash('feedback', 'Volunteer successfully added.');
        $this->reset('volunteer');
        $this->dispatchBrowserEvent('openjobsaved');
        $this->emit('reset-volunteer');
        $this->hideAddVolunteer();
    }


    public function editVolunteer($formData)
    {
        $this->volunteer = $formData['volunteer'];
        $this->validate();
        $volunteer = Volunteer::find($this->volunteerId);
        $volunteer->volunteer = $this->volunteer;

        $volunteer->save();
        // array_push($this->volunteers, $this->volunteer);
        session()->flash('feedback', 'Volunteer successfully updated.');
        $this->reset('volunteer');
        $this->dispatchBrowserEvent('openjobsaved');
        $this->emit('reset-volunteer');
        $this->hideAddVolunteer();
    }

    public function deleteVolunteer()
    {
        Volunteer::where('user_id', auth()->user()->id)->delete();
    }
}
