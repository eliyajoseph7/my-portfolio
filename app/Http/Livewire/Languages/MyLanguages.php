<?php

namespace App\Http\Livewire\Languages;

use App\Models\Language;
use App\Models\User;
use Livewire\Component;

class MyLanguages extends Component
{

    public $languages = [];
    public $action = 'Add';

    public $language;
    public $language_flag = '';
    public $hide = '';
    public $languageId = '';

    protected $rules = [
        'language' => 'required|min:5',
    ];

    protected $listeners = ['deleteLanguage'];

    public function mount()
    {
        // $this->emit('getLanguages', $this->languages);
        $this->language_flag = 'hidden';
        if (auth()->check()) {
            $this->languages = Language::where('user_id', auth()->user()->id)->get();
        } else {
            $user = User::where('role_id', 1)->first();
            $this->languages = Language::where('user_id', $user->id)->get();
        }
    }

    public function languages()
    {
        $this->emit('getLanguages', $this->languages);
    }


    // languages
    public function showAddLanguage()
    {
        $this->language_flag = '';
        $this->action = 'Add';
        $this->hide = 'hidden';
        $this->reset('language');
    }

    public function hideAddLanguage()
    {
        $this->language_flag = 'hidden';
        $this->reset('hide');
    }

    public function addLanguage()
    {
        $this->validate();
        Language::create([
            'language' => $this->language,
            'user_id' => auth()->user()->id
        ]);
        // array_push($this->languages, $this->language);
        session()->flash('feedback', 'Language successfully added.');
        $this->reset('language');
    }

    // Edit
    public function showEditLanguage($id)
    {
        $language = Language::find($id);
        $this->language = $language->language;
        $this->language_flag = '';
        $this->action = 'Edit';
        $this->hide = 'hidden';
        $this->languageId = $id;
    }

    public function editLanguage()
    {
        $this->validate();
        $language = Language::find($this->languageId);
        $language->language = $this->language;

        $language->save();
        // array_push($this->languages, $this->language);
        session()->flash('feedback', 'Language successfully updated.');
        $this->reset('language');
    }
    public function deleteLanguage($languageId)
    {
        Language::find($languageId)->delete();
        $this->render();
    }
    
    public function render()
    {

        if (auth()->check()) {
            $this->languages = Language::where('user_id', auth()->user()->id)->get();
        } else {
            $user = User::where('role_id', 1)->first();
            $this->languages = Language::where('user_id', $user->id)->get();
        }
        return view('livewire.languages.my-languages');
    }
}
