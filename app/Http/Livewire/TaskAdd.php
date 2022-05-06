<?php

namespace App\Http\Livewire;

use Livewire\Component;

use Auth;
use App\Models\Task;
use App\Models\User;

class TaskAdd extends Component
{
    public $userId;
    public $users;
    public $title;
    public $priority;
    public $priorities = [ // tailwind doesn't like computed css class names :(
        'Low' => [
            'color' => 'blue',
        ],
        'Normal' => [
            'color' => 'green',
        ],
        'High' => [
            'color' => 'amber',
        ],
        'Urgent' => [
            'color' => 'rose',
        ],
    ];
    public $assigner;
    public $assignee;

    protected $rules = [
        'title' => 'required',
    ];

    public function mount()
    {
        $this->userId = Auth::user()->id;
        $this->users = User::all();
        $this->priority = "Normal";
        $this->assigner = $this->userId;
        $this->assignee = $this->userId;
    }

    public function newTask()
    {
        $this->validate();
        $title = $this->title;
        $finished = false;
        $priority = $this->priority;
        $assigner = $this->assigner;
        $assignee = $this->assignee;

        Task::create([
            'title' => $title,
            'finished' => $finished,
            'priority' => $priority,
            'assigner' => $assigner,
            'assignee' => $assignee,
        ]);

        $this->refresh();
    }
    
    private function refresh()
    {
        $this->reset('title');
        $this->emit('getTaskLists');
    }

    public function render()
    {
        return view('livewire.task-add');
    }
}
