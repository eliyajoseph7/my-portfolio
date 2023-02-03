<?php

namespace App\Http\Livewire\ProjectAndSkill;

use App\Models\Project;
use App\Models\User;
use Livewire\Component;

class MyProject extends Component
{

    public $projects = [];

    public $project_flag = '';
    public $project;
    public $hide = '';

    protected $rules = [
        'project' => 'required|min:5',
    ];

    public function mount()
    {
        $this->project_flag = 'hidden';
        if (auth()->check()) {
            $this->projects = Project::where('user_id', auth()->user()->id)->get();
        } else {
            $user = User::where('role_id', 1)->first();
            $this->projects = Project::where('user_id', $user->id)->get();
        }
    }

    public function render()
    {
        if (auth()->check()) {
            $this->projects = Project::where('user_id', auth()->user()->id)->get();
        } else {
            $user = User::where('role_id', 1)->first();
            $this->projects = Project::where('user_id', $user->id)->get();
        }
        return view('livewire.project-and-skill.projects.my-project');
    }

    // projects
    public function showAddProject()
    {
        $this->project_flag = '';
        $this->hide = 'hidden';
    }

    public function hideAddProject()
    {
        $this->project_flag = 'hidden';
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
