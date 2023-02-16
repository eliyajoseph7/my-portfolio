<?php

namespace App\Http\Livewire\Languages;

use App\Models\Language;
use App\Models\User;
use Livewire\Component;

class MyLanguages extends Component
{
    public $languages;

    public $action = 'Add';
    public $language_flag = '';
    public $language;
    public $languageId = '';
    public $hide = '';
    
    public function mount()
    {
        $this->language_flag = 'hidden';
    }

    public function render()
    {

        if (auth()->check()) {
            // $this->languages = Language::where('user_id', auth()->user()->id)->first();
        } else {
            $user = User::where('role_id', 1)->first();
            // $this->languages = Language::where('user_id', $user->id)->first();
        }
        return view('livewire.languages.my-languages');
    }
}
