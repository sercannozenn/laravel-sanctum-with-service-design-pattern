<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ShowDeleteRequest;
use App\Http\Requests\Api\TaskStatusUpdateRequest;
use App\Http\Requests\Api\TaskStoreRequest;
use App\Http\Requests\Api\TaskUpdateRequest;
use App\Models\Tasks;
use App\Services\TaskService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public TaskService $taskService;
    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }
    public function index()
    {
        $tasks = $this->taskService->getAllTasks();

        return response()
            ->json()
            ->setData($tasks)
            ->setStatusCode(200)
            ->setCharset("utf-8")
            ->header("content-type", "application/json")
            ->setEncodingOptions(JSON_UNESCAPED_UNICODE)
            ->setEncodingOptions(JSON_UNESCAPED_SLASHES);
    }
    public function show(ShowDeleteRequest $request)
    {
        $task = $this->taskService->getBydWithAuth($request->id);

        return response()
            ->json()
            ->setData($task)
            ->setStatusCode(200)
            ->setCharset("utf-8")
            ->header("content-type", "application/json")
            ->setEncodingOptions(JSON_UNESCAPED_UNICODE)
            ->setEncodingOptions(JSON_UNESCAPED_SLASHES);

    }
    public function store(TaskStoreRequest $request)
    {
        $data = $request->only("name");
        $data['user_id'] = Auth::id();

        $result = $this->taskService->create($data);

        return response()
            ->json()
            ->setData($result)
            ->setStatusCode(200)
            ->setCharset("utf-8")
            ->header("content-type", "application/json")
            ->setEncodingOptions(JSON_UNESCAPED_UNICODE)
            ->setEncodingOptions(JSON_UNESCAPED_SLASHES);
    }
    public function update(TaskUpdateRequest $request)
    {
        $data = $request->only("name");
        $id = $request->id;


        $task = $this->taskService->getBydWithAuth($id);
        $this->taskService->setTask($task)->update($data);

        $result = $this->taskService->getBydWithAuth($id);

        return response()
            ->json()
            ->setData($result)
            ->setStatusCode(200)
            ->setCharset("utf-8")
            ->header("content-type", "application/json")
            ->setEncodingOptions(JSON_UNESCAPED_UNICODE)
            ->setEncodingOptions(JSON_UNESCAPED_SLASHES);

    }
    public function status(TaskStatusUpdateRequest $request)
    {
        $id = $request->id;
        $task = $this->taskService->getBydWithAuth($id);

        $this->taskService->setTask($task)->updateStatus($request->status);

        $result['status'] = $this->taskService->getBydWithAuth($id)->status;

        return response()
            ->json()
            ->setData($result)
            ->setStatusCode(200)
            ->setCharset("utf-8")
            ->header("content-type", "application/json")
            ->setEncodingOptions(JSON_UNESCAPED_UNICODE)
            ->setEncodingOptions(JSON_UNESCAPED_SLASHES);
    }
    public function delete(ShowDeleteRequest $request)
    {
        $this->taskService->delete($request->id);

        return response()
            ->json()
            ->setData("Task Silindi")
            ->setStatusCode(200)
            ->setCharset("utf-8")
            ->header("content-type", "application/json")
            ->setEncodingOptions(JSON_UNESCAPED_UNICODE)
            ->setEncodingOptions(JSON_UNESCAPED_SLASHES);
    }
}
