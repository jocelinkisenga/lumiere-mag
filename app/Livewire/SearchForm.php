<?php

namespace App\Livewire;

use Livewire\Component;

class SearchForm extends Component
{
    public $searchWord;

    public function search()
    {
        $this->validate([
            'searchWord' => 'required|string',
        ]);
        return redirect()->route('results', [
            'articles' => $this->searchWord,
        ]);
    }
    public function render()
    {
       
        // $this->validate(['search' => 'required|string']);
        return view('livewire.search-form');

    }


}
