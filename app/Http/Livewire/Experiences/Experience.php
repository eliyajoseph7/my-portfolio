<?php

namespace App\Http\Livewire\Experiences;

use App\Models\Experience as ModelsExperience;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Experience extends Component
{
    public $experience;
    public $title = '';
    public $location = '';
    public $company = '';
    public $start = '';
    public $end = 'Present';
    public $achievements = [];
    public $experiences = [];

    public $showEnd = 'hidden';
    public $toPresent = 'checked';

    public $achievementRows = [];
    public $achievementLenght = 0;
    protected $listeners = [
        'removeRow',
        'deleteExperience'
    ];

    protected $rules = [
        'title' => 'required',
        'location' => 'required',
        'company' => 'required',
        'start' => 'required'
    ];

    // public function setStart($val) {
    //     dump($val);
    // }

    public function mount()
    {
        // app('App\Http\Livewire\ProjectAndSkill')->skills();
        $this->experience = 'hidden';
    }

    public function render()
    {
        if(auth()->check()) {
            $this->experiences = ModelsExperience::with('achievements')->where('user_id', auth()->user()->id)->get();
        } else {
            $user = User::where('role_id', 1)->first();
            $this->experiences = ModelsExperience::with('achievements')->where('user_id', $user->id)->get();
        }
        return view('livewire.experiences.experience');
    }

    public function showAddExperience()
    {
        $this->experience = '';
    }

    public function hideAddExperience()
    {
        $this->experience = 'hidden';
    }

    public function toggleEndDate()
    {
        if ($this->showEnd == 'hidden') {
            $this->showEnd = 'flex';
        } else {
            $this->showEnd = 'hidden';
            $this->end = 'Present';
        }
    }



    public function addAchievementRow()
    {
        $length = $this->achievementLenght;
        $new = '<div class="d-flex items-center justify-between grid grid-flow-col mb-3" id="row' . $length . '">
                    <div class="col-span-10">
                        <textarea type="text" rows="1" wire:model="achievements.' . rand() . '" name="achievements[]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="..........."> </textarea>
                    </div>
                    <div class="float-right col-span-1 pr-1">
                        <a row="' . $length . '" class="remove text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-md px-2 py-1"><i class="fa fa-minus"></i></a>
                    </div>
                </div>';
        if ($length < 5) {
            array_push($this->achievementRows, $new);
            $this->achievementLenght++;
        } else {
            $this->emit('maximum_achievements');
        }
    }

    public function removeRow($row)
    {
        unset($this->achievementRows[$row]);
        $this->achievementLenght--;
    }

    public function addExperience($formData)
    {
        $this->start = $formData['start'];
        $this->validate();
        if($this->end == '') {
            $this->end = 'Present';
        }
        $expr = ModelsExperience::create(
            [
                'title' => $this->title,
                'company' => $this->company,
                'location' => $this->location,
                'from' => $this->start,
                'to' => $this->end,
                'user_id' => auth()->user()->id
            ]
        );

        $data = [];
        foreach($this->achievements as $key=>$value) {
            $data[] = [
                'achievement' => $value,
                'experience_id' => $expr->id,
                'created_at' => now(),
                'updated_at' => now()
            ];
        }

        DB::table('achievements')->insert($data);
        
        session()->flash('feedback', 'Experience successfully added.');
        $this->reset(['title', 'company', 'location', 'start', 'achievements', 'end', 'achievementRows']);
    }

    // edit experience

    public function showEditExperience($id)
    {
        $this->experience = '';
        $qs = ModelsExperience::with('achievements')->find($id);
        $this->title = $qs->title;
        $this->company = $qs->company;
        $this->location = $qs->location;
        $this->start = $qs->from;
        $this->end = $qs->to;

        // dump($qs->achievements->count());
        $this->achievementLenght = $qs->achievements->count();
        foreach($qs->achievements as $q) {
            array_push($this->achievements, $q->achievement);
        }
    }

    // delete experience
    public function deleteExperience($id) {
        ModelsExperience::find($id)->delete();
    }
}
