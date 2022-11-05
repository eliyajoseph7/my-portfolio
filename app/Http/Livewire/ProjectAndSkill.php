<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ProjectAndSkill extends Component
{

    public $skills = ['one', 'two', 'three'];
    public $projects = ['one', 'two', 'three'];

    public $skill;
    public $project;
    public $hide = '';

    public function mount()
    {
        // $this->emit('getSkills', $this->skills);
        $this->skill = 'hidden';
        $this->project = 'hidden';
    }

    public function skills()
    {
        $this->emit('getSkills', $this->skills);
    }


    public function render()
    {
        return view('livewire.projectandskill.project-and-skill');
    }


    public function showAddSkill() {
        $this->skill = '';
        $this->hide = 'hidden';
    }

    public function hideAddSkill() {
        $this->skill = 'hidden';
        $this->reset('hide');
    }
    public function showAddProject() {
        $this->project = '';
        $this->hide = 'hidden';
    }

    public function hideAddProject() {
        $this->project = 'hidden';
        $this->reset('hide');
    }
}
