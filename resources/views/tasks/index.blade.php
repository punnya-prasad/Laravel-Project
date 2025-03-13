@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <div style="display: flex; justify-content: space-between; align-items: center;">
            <span>My Tasks</span>
            <a href="{{ route('tasks.create') }}" class="btn btn-primary">Add New Task</a>
        </div>
    </div>
    <div class="card-body">
        @if ($tasks->count() > 0)
            <ul class="task-list">
                @foreach ($tasks as $task)
                    <li class="task-item">
                        <div class="checkbox-container">
                            <form action="{{ route('tasks.toggle-complete', $task) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <input type="checkbox" class="checkbox" onChange="this.form.submit()" {{ $task->completed ? 'checked' : '' }}>
                            </form>
                            <span class="task-title {{ $task->completed ? 'task-completed' : '' }}">
                                {{ $task->title }}
                            </span>
                        </div>
                        <div class="task-actions">
                            <a href="{{ route('tasks.show', $task) }}" class="btn btn-secondary">View</a>
                            <a href="{{ route('tasks.edit', $task) }}" class="btn btn-secondary">Edit</a>
                            <form action="{{ route('tasks.destroy', $task) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this task?')">Delete</button>
                            </form>
                        </div>
                    </li>
                @endforeach
            </ul>
        @else
            <p>You don't have any tasks yet. <a href="{{ route('tasks.create') }}">Create your first task</a>.</p>
        @endif
    </div>
</div>
@endsection

