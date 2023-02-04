<?php

namespace App\View\Components\Experiences;

use Illuminate\View\Component;

class Form extends Component
{
    public $showEnd;
    public $toPresent;
    public $achievementRows;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($showEnd, $toPresent, $achievementRows)
    {
        $this->showEnd = $showEnd;
        $this->toPresent = $toPresent;
        $this->achievementRows = $achievementRows;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.experiences.form');
    }
}
