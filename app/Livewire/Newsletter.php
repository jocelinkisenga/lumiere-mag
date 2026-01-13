<?php

namespace App\Livewire;

use App\Models\Subscriber;
use Flasher\Laravel\Facade\Flasher;
use Flasher\Prime\Aware\FlasherAwareTrait;
use Livewire\Component;

class Newsletter extends Component
{
    use FlasherAwareTrait;
    public $email;


    public function render()
    {
        return view('livewire.newsletter');
    }

    public function subscribe()
    {
        // flash("bonjour", 'success',);
        Subscriber::create(["email" => $this->email]);
        session()->flash("message", "Souscription envoyé avec succès nous vous enverrons un lien pour confirmer");
    }
}
