<x-slot name="header">
    <h2 class="text-xl font-semibold leading-tight text-gray-800">
        {{ Auth::user()->name . "'s Tasks" }}
    </h2>
</x-slot>

<div class="py-12">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div>
            <input wire:model="title" wire:keydown.enter="newTask" type="text">

            <select wire:model="assignee" name="assignees">
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>

            <select wire:model="priority" name="priority">
                @foreach($priorities as $priority)
                    <option value="{{ $priority }}">{{ $priority }}</option>
                @endforeach
            </select>

            <button wire:click="newTask">Add</button>

            @error('title')
                <span class="mt-2 text-red-500">{{ $message }}</span>
            @enderror
        </div>
        <div wire:poll class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
        {{-- TODO: find a better live update solution than polling --}}
            {{ $this->getTaskList() }}
            <div>
                @forelse($tasks as $task)
                    @if(!$task->finished)
                        <div>
                            {{ $task->id }}
                            {{ $task->title }}
                            {{ $task->finished }}
                            {{ $task->priority }}
                            {{ $task->assigner }}
                            {{ $task->assignee }}
                            {{ $task->created_at }}
                            {{ $task->updated_at }}
                            <input wire:click="toggleStatus({{ $task->id }}, {{ $task->finished }})" wire:loading.attr="disabled" type="checkbox">
                        </div>
                    @endif
                @empty
                    You've finished all your tasks. Great work!
                @endforelse
            </div>
            ---------
            <div>
                @foreach($tasks as $task)
                    @if($task->finished)
                        <div>
                            {{ $task->id }}
                            {{ $task->title }}
                            {{ $task->finished }}
                            {{ $task->priority }}
                            {{ $task->assigner }}
                            {{ $task->assignee }}
                            {{ $task->created_at }}
                            {{ $task->updated_at }}
                            <input wire:click="toggleStatus({{ $task->id }}, {{ $task->finished }})" wire:loading.attr="disabled" type="checkbox" checked>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</div>
