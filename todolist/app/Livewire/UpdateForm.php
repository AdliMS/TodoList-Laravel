<?php

namespace App\Livewire;

use App\Models\Todo;
use Livewire\Component;
use Livewire\Livewire;

class UpdateForm extends Component
{
    public $todo;
    public $todoNameUpdate;

    public function update($id) {
        
        $todo = Todo::findOrFail($id);

        $todo->name = $this->todoNameUpdate;
        $todo->update();

        $this->dispatch('dataUpdated');
    }

    public function render()
    {
        return view('livewire.update-form');
    }
}
