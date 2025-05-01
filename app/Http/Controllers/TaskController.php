<?php

namespace App\Http\Controllers;

use App\Enums\TaskStatus;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Task::with('user')->get()->toResourceCollection();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedTask = $request->validate([
            'title' => 'required|string|min:3|max:255',
            'description' => 'required|string|min:3|max:255',
            'status' => [Rule::enum(TaskStatus::class)],
        ]);
        return request()->user()->tasks()->create($validatedTask)->refresh()->toResource();
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        return $task->toResource();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        $validatedTask = $request->validate([
            'title' => 'string|min:3|max:255',
            'description' => 'string|min:3|max:255',
            'status' => [Rule::enum(TaskStatus::class)],
        ]);
        $task->update($validatedTask);
        return $task->toResource();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return $task->toResource();
    }
}
