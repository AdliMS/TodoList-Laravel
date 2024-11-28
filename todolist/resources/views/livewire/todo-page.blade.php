<div class="flex justify-center items-center">

    <div class="flex border-[4px] border-gray-200 p-2 flex flex-col h-fit bg-white">

        @error('name')
            <p class="text-red-400 m-2">{{ $message }}</p>
        @enderror
        <form class="p-2 flex gap-2 items-center justify-between" wire:submit="create" action="">
            <input wire:model="name" class="w-full p-2 bg-gray-50 hover:bg-gray-100" type="text" placeholder="Type in your list...">
            <button class="w-[8rem] text-white p-2 bg-green-400 hover:bg-green-500 shadow-md">Create +</button>
        </form>

        <div class="w-100 mt-4 mb-2 pt-4 border-t-[1px] border-black">
            <input wire:model.live="search" class="w-full" type="text" placeholder="Search here...">
        </div>
        
    
        <ul>
            
            @if ($todos->count() !== 0)
                
                @foreach ($todos as $todo)

                    <li class="p-2">
                        
                        <div class="flex justify-between items-center">
                            <div class="flex items-center gap-2">

                                @if ($todo->is_checked)
                                <input wire:click="toggleCheck({{ $todo->id }})" type="checkbox" checked class="p-2 shadow-md"></input>
                                @else
                                <input wire:click="toggleCheck({{ $todo->id }})" type="checkbox"  class="p-2 shadow-md"></input>
                                @endif

                                <p wire:click="openForm({{ $todo->id }})">{{ $todo->name }}</p>
                                @if ($todoClicked === $todo->id)
                                    @livewire('update-form', ['todo' => $todo], key(Str::random()))
                                @endif

                            </div>

                            <div class="flex">
                                <button wire:click="delete({{ $todo->id }})" class="font-bold w-[4rem] text-white p-2 bg-red-400 hover:bg-red-500 shadow-md">-</button>
                                <button wire:click="closeForm" class="w-[4rem] text-white p-2 bg-blue-400 hover:bg-blue-500 shadow-md">Close</button>
                            </div>
                            
                        </div>
                        

                    </li>

                @endforeach

            @else
                <div class="flex items-center gap-2">
                    <h1 class="p-2">Write your todo now!</h1>
                    <div class="border-b border-dashed border-gray-600 w-3/6 h-0"></div>
                </div>
            @endif

            <div class="m-2">
                {{ $todos->links() }}
            </div>
            
            
            
        </ul>
    </div>

</div>




           