{{-- TODO: find a better live update solution than polling. can we use websockets? --}}
<div>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ Auth::user()->name . "'s Tasks" }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <livewire:task-add :users="$users">
            
            <div wire:poll="refresh" class="flex flex-wrap overflow-y-auto bg-white shadow-xl sm:rounded-lg">
                <div class="flex-1 m-3 min-w-fit md:min-w-0">
                    <h3 class="text-xl font-semibold leading-tight text-center text-gray-800">To-do</h3>
                    @foreach($todo as $task)
                        {{-- ❗ https://laravel-livewire.com/docs/2.x/nesting-components#sibling-components-in-a-loop --}}
                        <livewire:task-list-item :users="$users" :task="$task" :wire:key="'todo-'.$task->id">
                    @endforeach
                </div>
                <div class="flex-1 m-3 min-w-fit md:min-w-0">
                    <h3 class="text-xl font-semibold leading-tight text-center text-gray-800">Completed</h3>
                    @foreach($done as $task)
                        <livewire:task-list-item :users="$users" :task="$task" :wire:key="'done-'.$task->id">
                    @endforeach
                </div>
            </div>
            
        </div>
    </div>

</div>