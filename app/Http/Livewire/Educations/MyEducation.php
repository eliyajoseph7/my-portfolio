<?php

namespace App\Http\Livewire\Educations;

use App\Models\Education;
use App\Models\User;
use Livewire\Component;

class MyEducation extends Component
{
    public $errormsg = 'This field is required';
    public $action = '';
    public $myId = '';
    public $education;
    public $form = [
        'program' => '',
        'institution' => '',
        'from' => '',
        'to' => '',
        'user_id' => ''
    ];
    public $educations = [];

    public $showEnd = 'hidden';
    public $toPresent = '';

    protected $listeners = [
        'deleteEducation',
        'toggleEndDate'
    ];

    protected $rules = [
        'form.program' => 'required',
        'form.institution' => 'required',
        'form.from' => 'required'
    ];


    public function mount()
    {
        $this->education = 'hidden';
    }

    public function render()
    {
        if(auth()->check()) {
            $this->educations = Education::where('user_id', auth()->user()->id)->oldest()->get();
        } else {
            $user = User::where('role_id', 1)->first();
            $this->educations = Education::where('user_id', $user->id)->oldest()->get();
        }
        return view('livewire.educations.my-education');
    }

    public function showAddEducation()
    {
        $this->education = '';
        $this->action = 'Add';
    }

    public function hideAddEducation()
    {
        $this->education = 'hidden';
        $this->reset('form');
    }

    public function toggleEndDate($value)
    {
        $this->showEnd = $value;
        
    }


    public function addEducation($formData)
    {
        $this->form['from'] = $formData['from'];
        $this->form['to'] = $formData['to'];
        $this->validate();
        if($this->form['to'] == '') {
            $this->form['to'] = 'Present';
        }
        $this->form['user_id'] = auth()->user()->id;
        // dd($this->form);
        Education::create($this->form);
        $this->dispatchBrowserEvent('openjobsaved');
        $this->emit('feedback', 'Education successfully added.');
        
        session()->flash('feedback', 'Education successfully added.');
        $this->reset('form');
        
    }

    // edit education

    public function showEditEducation($id)
    {
        $this->action = 'Update';

        $this->education = '';
        $qs = Education::find($id);
        $this->form['program'] = $qs->program;
        $this->form['institution'] = $qs->institution;
        $this->form['from'] = $qs->from;
        $this->form['to'] = $qs->to;

        $this->myId = $id;
    }


    public function updateEducation($formData)
    {
        $this->form['from'] = $formData['from'];
        $this->form['to'] = $formData['to'];
        $this->validate();
        if($this->form['to'] == '') {
            $this->form['to'] = 'Present';
        }
        // dd($this->form);
        $edu = Education::find($this->myId);
        if($edu) {
            $edu->program = $this->form['program'];
            $edu->institution = $this->form['institution'];
            $edu->from = $this->form['from'];
            $edu->to = $this->form['to'];

            $edu ->save();
        }
        $this->hideAddEducation();

        $this->dispatchBrowserEvent('openjobsaved');
        $this->emit('feedback', 'Education successfully updated.');
        // $this->emit('update-achievements', '');
        
        session()->flash('feedback', 'Education successfully updated.');
    }

    // delete education
    public function deleteEducation($id) {
        Education::find($id)->delete();
    }
}
