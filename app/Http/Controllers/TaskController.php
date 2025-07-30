<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Task;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $tasks = Task::with('user')
            ->ownedBy($request->user())
            ->filter($request->only(['status', 'priority']))
            ->orderBy('updated_at', 'desc')
            ->get();

        return view('tasks.index', ['tasks' => $tasks]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaskRequest $request): RedirectResponse
    {
        $request->user()->tasks()->create($request->validated());

        return to_route('tasks.index');
    }

    /**
     * Display the resource.
     */
    public function show(Task $task)
    {
        abort_if(Gate::denies('manage-task', $task), Response::HTTP_FORBIDDEN);

        return view('tasks.show', ['task' => $task]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        abort_if(Gate::denies('manage-task', $task), Response::HTTP_FORBIDDEN);

        return view('tasks.edit', ['task' => $task]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTaskRequest $request, Task $task)
    {
        abort_if(Gate::denies('manage-task', $task), Response::HTTP_FORBIDDEN);

        $task->update($request->validated());

        return to_route('tasks.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        abort_if(Gate::denies('manage-task', $task), Response::HTTP_FORBIDDEN);

        $task->delete();

        return back();
    }
}
