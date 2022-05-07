<?php

namespace App\Http\Livewire;
use Livewire\Component;

use Auth;
use App\Models\Task;
use App\Models\User;

class TaskListItem extends Component
{
    public $users;
    public $task;
    public $assigner;

    public function mount()
    {
        $this->assigner = $this->users->where('id', $this->task->assigner)->first(); // ❗ this makes an array instead of an object
    }

    private function getUserPhoto()
    {
        $user = $this->assigner;
        $initial = mb_substr($user['name'], 0, 1, "UTF-8"); // ❓ in case of special chars
        return $user['profile_photo_path'] ?? "https://ui-avatars.com/api/?name={$initial}&color=7F9CF5&background=EBF4FF";
    }

    public function toggleStatus($id, $status)
    {
        Task::where('id', $id)->update([
            'finished' => !$status
        ]);

        $this->emit('getTaskLists');
    }

    public function render()
    {
        return view('livewire.task-list-item');
    }
}
