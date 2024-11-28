<?php

namespace App\Livewire;

use App\Models\Todo;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class TodoPage extends Component
{
    use WithPagination;
    
    public $name;
    public $search;
    public $todoClicked;
    
    public function create() {
        
        $this->validate([
            'name' => 'required',
        ]);

        Todo::create([
            'name' => $this->name
        ]);

        $this->reset();
    }

    public function delete($id) {
        
        Todo::find($id)->delete();
    }

    public function toggleCheck($id) {
        
        $todo = Todo::findOrFail($id);
        $todo->is_checked = !$todo->is_checked;
        $todo->update();
    }

    public function openForm($id) {
        $this->todoClicked = $id;
    }

    public function closeForm() {
        $this->todoClicked = null;
    }

    #[On('dataUpdated')]
    public function render()
    {
    
        return view('livewire.todo-page', [
            'todos'=>Todo::latest()->where('name', 'like', '%'. $this->search . '%')->paginate(3)
        ]);
    }
}
