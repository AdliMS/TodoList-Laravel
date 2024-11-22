<div>
   
    <form wire:key="{{ $todo->id }}" wire:submit="update({{ $todo->id }})" action="">
        <input wire:model="todoNameUpdate" class="p-2 bg-gray-50 hover:bg-gray-100" type="text" >
        <button wire:click="update({{ $todo->id }})" class="text-white p-2 bg-blue-400 hover:bg-blue-500 shadow-md">Save</button>
    </form>

    
</div>

