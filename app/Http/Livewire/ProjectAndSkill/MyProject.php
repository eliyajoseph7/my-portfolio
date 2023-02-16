<?php

namespace App\Http\Livewire\ProjectAndSkill;

use App\Models\Project;
use App\Models\User;
use Livewire\Component;

class MyProject extends Component
{

    public $projects = [];
    public $action = 'Add';
    public $project_flag = '';
    public $project;
    public $projectId = '';
    public $hide = '';

    protected $rules = [
        'project' => 'required|min:5',
    ];
    protected $listeners = ['deleteProject'];

    public function mount()
    {
        $this->project_flag = 'hidden';
        if (auth()->check()) {
            $this->projects = Project::where('user_id', auth()->user()->id)->first();
        } else {
            $user = User::where('role_id', 1)->first();
            $this->projects = Project::where('user_id', $user->id)->first();
        }
    }

    public function render()
    {
        if (auth()->check()) {
            $this->projects = Project::where('user_id', auth()->user()->id)->first();
        } else {
            $user = User::where('role_id', 1)->first();
            $this->projects = Project::where('user_id', $user->id)->first();
        }
        return view('livewire.project-and-skill.projects.my-project');
    }

    // projects
    public function showAddProject()
    {
        $this->project_flag = '';
        $this->hide = 'hidden';
        $this->action = 'Add';
        $this->reset('project');

        $project = Project::where('user_id', auth()->user()->id)->first();
        if($project) {
            $this->emit('update-project', $project->project);
            $this->projectId = $project->id;
            $this->action = 'Edit';
        }
    }

    public function hideAddProject()
    {
        $this->project_flag = 'hidden';
        $this->reset('hide');
    }
    
    public function addProject($formData)
    {
        $this->project = $formData['project'];
        $this->validate();
        Project::create([
            'project' => $this->project,
            'user_id' => auth()->user()->id
        ]);
        // array_push($this->projects, $this->project);
        session()->flash('feedback', 'Project successfully added.');
        $this->reset('project');
        $this->dispatchBrowserEvent('openjobsaved');
        $this->emit('reset-project');
    }

    // Edit
    // public function showEditProject($id)
    // {
    //     dd('kdkd');
    //     $project = Project::find($id);
    //     $this->project = $project->project;
    //     $this->project_flag = '';
    //     $this->action = 'Edit';
    //     $this->hide = 'hidden';
    //     $this->projectId = $id;
    // }

    public function editProject($formData)
    {
        $this->project = $formData['project'];
        $this->validate();
        $project = Project::find($this->projectId);
        $project->project = $this->project;

        $project->save();
        // array_push($this->projects, $this->project);
        session()->flash('feedback', 'Project successfully updated.');
        $this->reset('project');
        $this->dispatchBrowserEvent('openjobsaved');
        $this->emit('reset-project');
        $this->hideAddProject();
    }

    public function deleteProject()
    {
        Project::where('user_id', auth()->user()->id)->delete();
    }
}
