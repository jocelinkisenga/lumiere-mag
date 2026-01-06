<?php

namespace App\Livewire;

use App\Models\Subscriber;
use Livewire\Component;

class Newsletter extends Component
{
    public $email;


    public function render()
    {
        return view('livewire.newsletter');
    }

    public function subscribe()
    {
        Subscriber::create(["email" => $this->email]);
        session()->flash("message", "Souscription envoyé avec succès nous vous enverrons un lien pour confirmer");
    }
}
