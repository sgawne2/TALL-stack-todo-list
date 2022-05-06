<div class="flex">
    <input class="flex-1" wire:model="title" wire:keydown.enter="newTask" type="text">

    <select class="flex-1" wire:model="assignee" name="assignees">
        @foreach($users as $user)
            <option value="{{ $user->id }}">{{ $user->name }}</option>
        @endforeach
    </select>

    <select class="flex-1" wire:model="priority" name="priority">
        @foreach($priorities as $priority => $atts)
            <option value="{{ $priority }}">{{ $priority }}</option>
        @endforeach
    </select>

    <button class="flex-1" wire:click="newTask">Add</button>

    @error('title')
        <span class="flex-1 text-red-500">{{ $message }}</span>
    @enderror
</div>