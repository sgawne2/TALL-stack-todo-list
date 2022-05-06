<?php

namespace App\Http\Livewire;
use Livewire\Component;

// use Illuminate\Database\Eloquent\Collection;
use Auth;
use App\Models\Task;
use App\Models\User;

class TaskList extends Component
{
    public $userId;
    public $users;
    public $tasks;
    public $title;
    public $priorities = [
        'Urgent',
        'High',
        'Normal',
        'Low',
    ];
    public $priority = "Normal";
    public $assigner;
    public $assignee;

    protected $rules = [
        'title' => 'required',
    ];

    public function mount()
    {
        $this->userId = Auth::user()->id;
        $this->users = User::all();
        $this->assigner = $this->userId;
        $this->assignee = $this->userId;

        $this->getTaskList();
    }

    public function getTaskList() // pulls from the database, which may have tasks added by other users
    {
        $tasks = Task::where('assignee', $this->userId)->orderBy('updated_at', 'desc')->get();
        $this->tasks = $tasks;
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

    public function toggleStatus($id, $status)
    {
        Task::where('id', $id)->update([
            'finished' => !$status
        ]);

        $this->refresh();
    }
    
    private function refresh()
    {
        $this->reset('title');
        $this->getTaskList();
    }

    public function render()
    {
        return view('livewire.task-list');
    }
}
