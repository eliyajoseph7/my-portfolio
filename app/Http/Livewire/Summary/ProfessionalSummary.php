<?php

namespace App\Http\Livewire\Summary;

use App\Models\Summary;
use App\Models\User;
use Livewire\Component;

class ProfessionalSummary extends Component
{
    public $hide = '';
    public $show = 'hidden';
    public $mysummary = '';

    public $listeners = [
        'update_mysummary',
    ];
    
   
   public function mount() {
    if(auth()->check()) {
       $this->mysummary = Summary::where('user_id', auth()->user()->id)->first()->summary;
    } else {
        $user = User::where('role_id', 1)->first();
        $this->mysummary = Summary::where('user_id', $user->id)->first()->summary;
    }
   }
    public function render()
    {
        return view('livewire.summary.professional-summary');
    }



    public function update_mysummary($summary) {
        $my_summary = Summary::where('user_id', auth()->user()->id)->first();
        if($my_summary) {
            $my_summary->summary = $summary;
            $my_summary->save();
        } else {
            Summary::create([
                'summary' => $summary,
                'user_id' => auth()->user()->id,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }


        // dd($summary);
        $this->emit('summary_updated');
        // $this->render();
        
    }

}
