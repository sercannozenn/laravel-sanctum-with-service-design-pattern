<?php

namespace App\Services;


use App\Models\Tasks;
use \Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;

class TaskService
{
    public Tasks $tasks;
    public function __construct(Tasks $tasks)
    {
        $this->tasks = $tasks;
    }
    public function getAllTasks(): Collection
    {
        return $this->tasks::all();
    }
    public function getById(int $id): Tasks
    {
        return $this->tasks::query()
            ->where("id", $id)
            ->firstOrFail();
    }

    public function getBydWithAuth(int $id): Tasks
    {
        return $this->tasks::query()
            ->where("id", $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();
    }

    public function create(array $data): Tasks
    {
        return $this->tasks::create($data);
    }

    public function update(array $data): bool
    {
        return $this->tasks->update($data);
    }

    public function updateStatus(int $status): bool
    {
        return $this->tasks->update(['status' => $status]);
    }

    public function delete(int $id): bool|null
    {
        $task = $this->getBydWithAuth($id);
        return $task->delete();

    }

    public function setTask(Tasks $task): TaskService
    {
        $this->tasks = $task;

        return $this;
    }


}
