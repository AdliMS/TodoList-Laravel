<div >


    

    <div class="flex justify-center border-2 border-green-500 flex flex-col">

        @error('name')
            <p class="text-red-400 m-2">{{ $message }}</p>
        @enderror
        <form wire:submit="create" action="">
            <input wire:model="name" class="p-2 bg-gray-50 hover:bg-gray-200" type="text" placeholder="Type in your list...">
            <button class="text-white p-2 bg-green-400 hover:bg-green-500 shadow-md">Create +</button>
        </form>
    
        <ul>
            
            @foreach ($todos as $todo)
                
                @if ($todo->is_checked)
                <input wire:click="toggleCheck({{ $todo->id }})" type="checkbox" checked class="p-2 shadow-md checked"></input>
                @else
                <input wire:click="toggleCheck({{ $todo->id }})" type="checkbox"  class="p-2 shadow-md checked"></input>
                    
                @endif
                
                <li class="p-2">{{ $todo->name }}</li>
                <button wire:model="delete({{ $todo->id }})" class="text-white p-2 bg-green-400 hover:bg-green-500 shadow-md">-</button>
            @endforeach
            
        </ul>
    </div>

    
    
    
</div>
