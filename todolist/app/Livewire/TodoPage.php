<?php

namespace App\Livewire;

use App\Models\Todo;
use Livewire\Component;
use Livewire\Attributes\Rule;

class TodoPage extends Component
{

    public $name;
    public $isChecked;

    public function create() {
        
        $this->validate([
            'name' => 'required',
        ]);

        Todo::create([
            'name'=>$this->name
        ]);

        $this->reset();

    }

    public function delete($id) {
        
        Todo::find($id)->delete();
    }

    public function toggleCheck($id) {
        
        $todo = Todo::findOrFail($id);
        $todo->is_checked = !$this->isChecked;
        $todo->update();
    }

    public function render()
    {
        $todos = Todo::latest()->get();
        // $todos_name = Todo::latest()->get('name');
        return view('livewire.todo-page', [
            'todos'=>$todos
        ]);
    }
}
