<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AddProjectSkill extends Component
{
    public $component;
    public $action;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($compname, $actions)
    {
        $this->component = $compname;
        $this->action = $actions;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.project_skills.add-project-skill');
    }
}
