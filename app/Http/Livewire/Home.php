<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Home extends Component
{
    public $experience;
    public $experiences = [
        [
            'title'=> 'Software Engineer',
            'location' => 'Dar es Salaam',
            'company' => 'Multics Systems',
            'from' => '10/2020',
            'to' => 'Present',
            'achievements' => [
                'Develop Agriculture Dashboard for the Tanzania Ministry of Agriculture (MoA) using Angular and Laravel frameworks',
                'Develop Agriculture crops-stock dynamic web system and offline mobile app for the Tanzania Ministry of Agriculture (MoA) using Angular and Laravel frameworks.',
                'Develop Budget, Expenditure, CPA & CSR, Administration and Fleet modules (ERP) for Tanzania National Housing Corporation(NHC) using Django python framework.',
                'Develop strong experience on working with Git Version Control System while working on the ERP system.',
                'Gained the presentation skills since as a developer i was involved in presenting the products to the customers as well as training them on how to use the product.',
                'Develop an offline mobile app using Flutter for the Tanzania Ministry of Agriculture (MoA).',
            ]
        ]
    ];
    
    public function mount() {
        $this->experience = 'hidden';
    }

    public function render()
    {
        return view('livewire.home')->layout('layouts.frontend.base');
    }

    public function showAddExperience() {
        $this->experience = '';
    }

    public function hideAddExperience() {
        $this->experience = 'hidden';
    }
}
