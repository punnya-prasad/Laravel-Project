<!-- tasks/index.blade.php -->
@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <span>My Tasks</span>
        <a href="{{ route('tasks.create') }}" class="btn btn-primary">Add New Task</a>
    </div>
    <div class="card-body">
        @if ($tasks->count() > 0)
            <ul style="list-style: none;">
                @foreach ($tasks as $task)
                    <li style="display: flex; justify-content: space-between; align-items: center; padding: 1rem; border-bottom: 1px solid #E8E1FF;">
                        <div style="display: flex; align-items: center; gap: 1rem;">
                            <form action="{{ route('tasks.toggle-complete', $task) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <input type="checkbox" style="width: 1.5rem; height: 1.5rem;" onChange="this.form.submit()" {{ $task->completed ? 'checked' : '' }}>
                            </form>
                            <span style="font-weight: 500; {{ $task->completed ? 'text-decoration: line-through; color: var(--text-light);' : '' }}">
                                {{ $task->title }}
                            </span>
                        </div>
                        <div style="display: flex; gap: 0.75rem;">
                            <a href="{{ route('tasks.show', $task) }}" class="btn btn-secondary">View</a>
                            <a href="{{ route('tasks.edit', $task) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('tasks.destroy', $task) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this task?')">Delete</button>
                            </form>
                        </div>
                    </li>
                @endforeach
            </ul>
        @else
            <p style="text-align: center; color: var(--text-light);">
                You don't have any tasks yet. 
                <a href="{{ route('tasks.create') }}" style="color: var(--primary); text-decoration: none;">Create your first task</a>.
            </p>
        @endif
    </div>
</div>
@endsection