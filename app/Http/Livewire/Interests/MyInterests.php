<?php

namespace App\Http\Livewire\Interests;

use App\Models\Interest;
use App\Models\User;
use Livewire\Component;

class MyInterests extends Component
{

    public $interests = [];
    public $action = 'Add';

    public $interest;
    public $interest_flag = '';
    public $hide = '';
    public $interestId = '';

    protected $rules = [
        'interest' => 'required|min:5',
    ];

    protected $listeners = ['deleteInterest'];

    public function mount()
    {
        // $this->emit('getInterests', $this->interests);
        $this->interest_flag = 'hidden';
        if (auth()->check()) {
            $this->interests = Interest::where('user_id', auth()->user()->id)->get();
        } else {
            $user = User::where('role_id', 1)->first();
            $this->interests = Interest::where('user_id', $user->id)->get();
        }
    }

    public function interests()
    {
        $this->emit('getInterests', $this->interests);
    }


    // interests
    public function showAddInterest()
    {
        $this->interest_flag = '';
        $this->action = 'Add';
        $this->hide = 'hidden';
        $this->reset('interest');
    }

    public function hideAddInterest()
    {
        $this->interest_flag = 'hidden';
        $this->reset('hide');
    }

    public function addInterest()
    {
        $this->validate();
        Interest::create([
            'interest' => $this->interest,
            'user_id' => auth()->user()->id
        ]);
        // array_push($this->interests, $this->interest);
        session()->flash('feedback', 'Interest successfully added.');
        $this->reset('interest');
    }

    // Edit
    public function showEditInterest($id)
    {
        $interest = Interest::find($id);
        $this->interest = $interest->interest;
        $this->interest_flag = '';
        $this->action = 'Edit';
        $this->hide = 'hidden';
        $this->interestId = $id;
    }

    public function editInterest()
    {
        $this->validate();
        $interest = Interest::find($this->interestId);
        $interest->interest = $this->interest;

        $interest->save();
        // array_push($this->interests, $this->interest);
        session()->flash('feedback', 'Interest successfully updated.');
        $this->reset('interest');
    }
    public function deleteInterest($interestId)
    {
        Interest::find($interestId)->delete();
        $this->render();
    }
    
    public function render()
    {

        if (auth()->check()) {
            $this->interests = Interest::where('user_id', auth()->user()->id)->get();
        } else {
            $user = User::where('role_id', 1)->first();
            $this->interests = Interest::where('user_id', $user->id)->get();
        }
        return view('livewire.interests.my-interests');
    }
}
