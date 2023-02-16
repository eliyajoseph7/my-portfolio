<?php

namespace App\Http\Livewire\Publications;

use App\Models\Publication;
use App\Models\User;
use Livewire\Component;

class MyPublications extends Component
{
    public $publications;

    public $action = 'Add';
    public $publication_flag = '';
    public $publication;
    public $publicationId = '';
    public $hide = '';

    protected $rules = [
        'publication' => 'required|min:5',
    ];
    protected $listeners = ['deletePublication'];
    
    
    public function mount()
    {
        $this->publication_flag = 'hidden';
    }

    public function render()
    {

        if (auth()->check()) {
            $this->publications = Publication::where('user_id', auth()->user()->id)->first();
        } else {
            $user = User::where('role_id', 1)->first();
            $this->publications = Publication::where('user_id', $user->id)->first();
        }
        return view('livewire.publications.my-publications');
    }

    public function showAddPublication()
    {
        $this->publication_flag = '';
        $this->hide = 'hidden';
        $this->action = 'Add';
        $this->reset('publication');

        $publication = Publication::where('user_id', auth()->user()->id)->first();
        if($publication) {
            $this->emit('update-publication', $publication->publication);
            $this->publicationId = $publication->id;
            $this->action = 'Edit';
        }
    }

    public function hideAddPublication()
    {
        $this->publication_flag = 'hidden';
        $this->reset('hide');
    }
    
    public function addPublication($formData)
    {
        $this->publication = $formData['publication'];
        $this->validate();
        Publication::create([
            'publication' => $this->publication,
            'user_id' => auth()->user()->id
        ]);
        // array_push($this->publications, $this->publication);
        session()->flash('feedback', 'Publication successfully added.');
        $this->reset('publication');
        $this->dispatchBrowserEvent('openjobsaved');
        $this->emit('reset-publication');
        $this->hideAddPublication();
    }


    public function editPublication($formData)
    {
        $this->publication = $formData['publication'];
        $this->validate();
        $publication = Publication::find($this->publicationId);
        $publication->publication = $this->publication;

        $publication->save();
        // array_push($this->publications, $this->publication);
        session()->flash('feedback', 'Publication successfully updated.');
        $this->reset('publication');
        $this->dispatchBrowserEvent('openjobsaved');
        $this->emit('reset-publication');
        $this->hideAddPublication();
    }

    public function deletePublication()
    {
        Publication::where('user_id', auth()->user()->id)->delete();
    }
}
