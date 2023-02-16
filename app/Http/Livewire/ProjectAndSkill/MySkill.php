<?php

namespace App\Http\Livewire\ProjectAndSkill;

use App\Models\Skill;
use App\Models\User;
use Livewire\Component;

class MySkill extends Component
{

    public $skills = [];
    public $action = 'Add';

    public $skill;
    public $skill_flag = '';
    public $hide = '';
    public $skillId = '';

    protected $rules = [
        'skill' => 'required|min:5',
    ];

    protected $listeners = ['deleteSkill'];

    public function mount()
    {
        // $this->emit('getSkills', $this->skills);
        $this->skill_flag = 'hidden';
        if (auth()->check()) {
            $this->skills = Skill::where('user_id', auth()->user()->id)->get();
        } else {
            $user = User::where('role_id', 1)->first();
            $this->skills = Skill::where('user_id', $user->id)->get();
        }
    }

    public function skills()
    {
        $this->emit('getSkills', $this->skills);
    }


    public function render()
    {
        if (auth()->check()) {
            $this->skills = Skill::where('user_id', auth()->user()->id)->get();
        } else {
            $user = User::where('role_id', 1)->first();
            $this->skills = Skill::where('user_id', $user->id)->get();
        }
        return view('livewire.project-and-skill.skills.my-skill');
    }


    // skills
    public function showAddSkill()
    {
        $this->skill_flag = '';
        $this->action = 'Add';
        $this->hide = 'hidden';
        $this->reset('skill');
    }

    public function hideAddSkill()
    {
        $this->skill_flag = 'hidden';
        $this->reset('hide');
    }

    public function addSkill()
    {
        $this->validate();
        Skill::create([
            'skill' => $this->skill,
            'user_id' => auth()->user()->id
        ]);
        // array_push($this->skills, $this->skill);
        session()->flash('feedback', 'Skill successfully added.');
        $this->reset('skill');
        $this->render();
    }

    // Edit
    public function showEditSkill($id)
    {
        $skill = Skill::find($id);
        $this->skill = $skill->skill;
        $this->skill_flag = '';
        $this->action = 'Edit';
        $this->hide = 'hidden';
        $this->skillId = $id;
    }

    public function editSkill()
    {
        $this->validate();
        $skill = Skill::find($this->skillId);
        $skill->skill = $this->skill;

        $skill->save();
        // array_push($this->skills, $this->skill);
        session()->flash('feedback', 'Skill successfully updated.');
        $this->reset('skill');
    }
    public function deleteSkill($skillId)
    {
        Skill::find($skillId)->delete();
        $this->render();
    }

    
}
