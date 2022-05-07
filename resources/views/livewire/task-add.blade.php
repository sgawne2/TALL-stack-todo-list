<div class="relative grid items-center grid-cols-4 gap-4">
        <label class="block mb-2 text-sm font-bold text-gray-700" for="username">
        Task
        </label>
                <label class="block mb-2 text-sm font-bold text-gray-700" for="username">
        Assign to...
        </label>
                <label class="block mb-2 text-sm font-bold text-gray-700" for="username">
        Urgency
        </label>
        <label>
            @error('title')
                <span class="flex-1 text-red-500">{{ $message }}</span>
            @enderror
        </label>

        <input class="w-full" wire:model="title" wire:keydown.enter="newTask" type="text" placeholder="What do you want to do?">

        <select class="w-full" wire:model="assignee" name="assignees">
            @foreach($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
        </select>

        <select class="w-full" wire:model="priority" name="priority">
            @foreach($priorities as $priority => $atts)
                <option value="{{ $priority }}">{{ $priority }}</option>
            @endforeach
        </select>

        <button class="flex items-center w-full h-full px-4 py-2 text-white bg-indigo-500 rounded-lg" wire:click="newTask" wire:loading.class="cursor-progress" wire:loading.attr="disabled" wire:target="newTask">
            <svg wire:loading.remove wire:target="newTask" class="w-6 h-6 mr-3 -ml-1 text-white" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
            </svg>
            <svg wire:loading wire:target="newTask" class="w-5 h-5 mr-3 -ml-1 text-white animate-spin" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
            Add
        </button>
</div>