<?php

namespace App\Http\Livewire\Summary;

use App\Models\Summary;
use App\Models\User;
use Livewire\Component;

class ProfessionalSummary extends Component
{
    public $hide = '';
    public $action = 'Add';
    public $summary_flag = '';
    public $show = 'hidden';
    public $mysummary = '';

    public $listeners = [
        'update_mysummary',
    ];


    public function mount()
    {
        $this->summary_flag = 'hidden';
        if (auth()->check()) {
            $summary = Summary::where('user_id', auth()->user()->id)->first();
            if ($summary) {
                $this->mysummary = $summary->summary;
            }
        } else {
            $user = User::where('role_id', 1)->first();
            $this->mysummary = Summary::where('user_id', $user->id)->first()->summary;
        }
    }
    public function render()
    {
        if (auth()->check()) {
            $summary = Summary::where('user_id', auth()->user()->id)->first();
            if ($summary) {
                $this->mysummary = $summary->summary;
            }
        } else {
            $user = User::where('role_id', 1)->first();
            $this->mysummary = Summary::where('user_id', $user->id)->first()->summary;
        }
        return view('livewire.summary.professional-summary');
    }

    public function showAddSummary()
    {
        $this->summary_flag = '';
        $this->hide = 'hidden';
        $this->action = 'Add';

        $summary = Summary::where('user_id', auth()->user()->id)->first();
        if ($summary) {
            $this->mysummary = $summary->summary;
            $this->action = 'Edit';
        }
    }

    public function hideAddSummary()
    {
        $this->summary_flag = 'hidden';
        $this->reset('hide');
    }

    public function updateSummary($formdata)
    {
        // dd($formdata);
        $my_summary = Summary::where('user_id', auth()->user()->id)->first();
        if ($my_summary) {
            $my_summary->summary = $formdata['summary'];
            $my_summary->save();
        } else {
            Summary::create([
                'summary' => $formdata['summary'],
                'user_id' => auth()->user()->id,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }


        // dd($summary);
        $this->emit('summary_updated');
        $this->hideAddSummary();

    }
}
