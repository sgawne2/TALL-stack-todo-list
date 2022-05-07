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
        $this->getUserList();
        $this->getTaskLists();
    }

    public function getUserList() 
    {
        $this->users = User::all();
    }

    public function getTaskLists() // ❓ we have to check the DB if theres any tasks assigned to use that we didnt create
    {
        $this->todo = Task::where('assignee', $this->userId)->where('finished', false)->orderBy('updated_at', 'desc')->get();
        $this->done = Task::where('assignee', $this->userId)->where('finished', true)->orderBy('updated_at', 'desc')->get();
    }

    public function refresh() 
    {
        $this->getUserList(); // ❓ new tasks could be assigned to us by users who registered after this component mounted, so we need to pull them again
        $this->getTaskLists(); 
    }

    public function render()
    {
        return view('livewire.tasks');
    }
}
