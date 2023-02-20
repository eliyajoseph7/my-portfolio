<?php

namespace App\Http\Livewire\Certificates;

use App\Models\Certificate;
use App\Models\User;
use Livewire\Component;

class MyCertificates extends Component
{
    public $certificates;

    public $action = 'Add';
    public $certificate_flag = '';
    public $certificate;
    public $certificateId = '';
    public $hide = '';


    protected $rules = [
        'certificate' => 'required|min:5',
    ];
    protected $listeners = ['deleteCertificate'];
    
    public function mount()
    {
        $this->certificate_flag = 'hidden';
    }

    public function render()
    {

        if (auth()->check()) {
            $this->certificates = Certificate::where('user_id', auth()->user()->id)->first();
        } else {
            $user = User::where('role_id', 1)->first();
            $this->certificates = Certificate::where('user_id', $user->id)->first();
        }
        return view('livewire.certificates.my-certificates');
    }

    public function showAddCertificate()
    {
        $this->certificate_flag = '';
        $this->hide = 'hidden';
        $this->action = 'Add';
        $this->reset('certificate');

        $certificate = Certificate::where('user_id', auth()->user()->id)->first();
        if($certificate) {
            $this->emit('update-certificate', $certificate->certificate);
            $this->certificateId = $certificate->id;
            $this->action = 'Edit';
        }
    }

    public function hideAddCertificate()
    {
        $this->certificate_flag = 'hidden';
        $this->reset('hide');
    }
    
    public function addCertificate($formData)
    {
        $this->certificate = $formData['certificate'];
        $this->validate();
        Certificate::create([
            'certificate' => $this->certificate,
            'user_id' => auth()->user()->id
        ]);
        // array_push($this->certificates, $this->certificate);
        session()->flash('feedback', 'Certificate successfully added.');
        $this->reset('certificate');
        $this->dispatchBrowserEvent('openjobsaved');
        $this->emit('reset-certificate');
        $this->hideAddCertificate();
    }


    public function editCertificate($formData)
    {
        $this->certificate = $formData['certificate'];
        $this->validate();
        $certificate = Certificate::find($this->certificateId);
        $certificate->certificate = $this->certificate;

        $certificate->save();
        // array_push($this->certificates, $this->certificate);
        session()->flash('feedback', 'Certificate successfully updated.');
        $this->reset('certificate');
        $this->dispatchBrowserEvent('openjobsaved');
        $this->emit('reset-certificate');
        $this->hideAddCertificate();
    }

    public function deleteCertificate()
    {
        Certificate::where('user_id', auth()->user()->id)->delete();
    }
}
