<?php

namespace App\Http\Livewire;

use Livewire\Component;

use Auth;
use App\Models\Task;
use App\Models\User;

class Tasks extends Component
{
    public $userId;
    public $users;

    public $todo;
    public $done;

    protected $listeners = ['getTaskLists' => 'getTaskLists'];

    public function mount()
    {
        $this->userId = Auth::user()->id;
        $this->users = User::all();
        $this->getTaskLists();
    }

    public function getTaskLists() // ❓ pulls from the database, which may have tasks added by other users
    {
        $this->todo = Task::where('assignee', $this->userId)->where('finished', false)->orderBy('updated_at', 'desc')->get();
        $this->done = Task::where('assignee', $this->userId)->where('finished', true)->orderBy('updated_at', 'desc')->get();
    }

    public function render()
    {
        return view('livewire.tasks');
    }
}
