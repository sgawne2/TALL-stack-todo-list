<?php

namespace App\Http\Livewire;
use Livewire\Component;

use Auth;
use App\Models\Task;
use App\Models\User;

class TaskList extends Component
{
    public $task;

    public function toggleStatus($id, $status)
    {
        Task::where('id', $id)->update([
            'finished' => !$status
        ]);

        $this->emit('getTaskLists');
    }

    public function render()
    {
        return view('livewire.task-list');
    }
}
