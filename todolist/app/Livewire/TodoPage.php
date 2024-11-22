<?php

namespace App\Livewire;

use App\Models\Todo;
use Livewire\Component;

class TodoPage extends Component
{
    public $name;
    public $todoClicked;
    protected $listeners = ['dataUpdated'];

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

    public function render()
    {
        $todos = Todo::latest()->get();

        return view('livewire.todo-page', [
            'todos'=>$todos
        ]);
    }
}
