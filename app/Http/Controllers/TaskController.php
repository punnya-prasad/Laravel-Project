<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!session()->has('user')) {
            return redirect()->route('login')->with('error', 'Please log in to view tasks.');
        }

        $userId = session('user')['id'];
        $tasks = Task::where('user_id', $userId)->orderBy('created_at', 'desc')->get();

        return view('tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!session()->has('user')) {
            return redirect()->route('login')->with('error', 'Please log in to create a task.');
        }

        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (!session()->has('user')) {
            return redirect()->route('login')->with('error', 'Please log in to add a task.');
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Task::create([
            'title' => $request->title,
            'description' => $request->description,
            'completed' => 0,
            'user_id' => session('user')['id'],
        ]);

        return redirect()->route('tasks.index')->with('success', 'Task created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        if (!session()->has('user') || $task->user_id !== session('user')['id']) {
            abort(403, 'Unauthorized action.');
        }

        return view('tasks.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        if (!session()->has('user') || $task->user_id !== session('user')['id']) {
            abort(403, 'Unauthorized action.');
        }

        return view('tasks.edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        if (!session()->has('user') || $task->user_id !== session('user')['id']) {
            abort(403, 'Unauthorized action.');
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'completed' => 'nullable|boolean',
        ]);

        $task->update([
            'title' => $request->title,
            'description' => $request->description,
            'completed' => $request->has('completed'),
        ]);

        return redirect()->route('tasks.index')->with('success', 'Task updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        if (!session()->has('user') || $task->user_id !== session('user')['id']) {
            abort(403, 'Unauthorized action.');
        }

        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully.');
    }

    /**
     * Toggle the completion status of the specified task.
     */
    public function toggleComplete(Task $task)
    {
        if (!session()->has('user') || $task->user_id !== session('user')['id']) {
            abort(403, 'Unauthorized action.');
        }

        $task->update([
            'completed' => !$task->completed,
        ]);

        return redirect()->back()->with('success', 'Task status updated successfully.');
    }
}
