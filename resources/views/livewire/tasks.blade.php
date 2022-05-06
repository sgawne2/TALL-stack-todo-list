<div>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ Auth::user()->name . "'s Tasks" }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <livewire:task-add >
            
            <div class="flex overflow-hidden shadow-xl sm:rounded-lg"> {{-- TODO: find a better live update solution than polling --}}
                {{-- https://laravel-livewire.com/docs/2.x/nesting-components#sibling-components-in-a-loop --}}
                <div class="flex-1">
                    @foreach($todo as $task)
                        <livewire:task-list :task="$task" :wire:key="'todo-'.$task->id">
                    @endforeach
                </div>
                <div class="flex-1">
                    @foreach($done as $task)
                        <livewire:task-list :task="$task" :wire:key="'done-'.$task->id">
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>