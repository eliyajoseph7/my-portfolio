<?php

namespace App\Http\Livewire;

use App\Models\Project;
use App\Models\Skill;
use App\Models\User;
use Livewire\Component;

class ProjectAndSkill extends Component
{

    public $skills = [];
    public $projects = [];

    public $skill;
    public $project;
    public $hide = '';

    protected $rules = [
        'skill' => 'required|min:5',
        'project' => 'required|min:5',
    ];

    public function mount()
    {
        // $this->emit('getSkills', $this->skills);
        $this->skill = 'hidden';
        $this->project = 'hidden';
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
            $this->projects = Project::where('user_id', auth()->user()->id)->get();
        } else {
            $user = User::where('role_id', 1)->first();
            $this->skills = Skill::where('user_id', $user->id)->get();
            $this->projects = Project::where('user_id', $user->id)->get();
        }
        return view('livewire.projectandskill.project-and-skill');
    }


    // skills
    public function showAddSkill()
    {
        $this->skill = '';
        $this->hide = 'hidden';
    }

    public function hideAddSkill()
    {
        $this->skill = 'hidden';
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

    public function deleteSkill($skillId)
    {
        Skill::find($skillId)->delete();
        $this->render();
    }

    // projects
    public function showAddProject()
    {
        $this->project = '';
        $this->hide = 'hidden';
    }

    public function hideAddProject()
    {
        $this->project = 'hidden';
        $this->reset('hide');
    }

    public function addProject()
    {
        $this->validate();
        Project::create([
            'project' => $this->project,
            'user_id' => auth()->user()->id
        ]);
        // array_push($this->projects, $this->project);
        session()->flash('feedback', 'Project successfully added.');
        $this->reset('project');
        $this->render();
    }

    public function deleteProject($projectId)
    {
        Project::find($projectId)->delete();
        $this->render();
    }
}
