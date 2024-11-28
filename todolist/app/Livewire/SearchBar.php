<?php

namespace App\Livewire;
use App\Models\Todo;

use Livewire\Component;


class SearchBar extends Component
{

    public $search = '';
    
    public function render()
    {
        // dd($this->search);
        $this->dispatch('dataUpdated');
        return view('livewire.search-bar', [
            'todos'=>Todo::where('name', 'like', '%' . $this->search . '%')->paginate(3)
        ]);
    }
}
