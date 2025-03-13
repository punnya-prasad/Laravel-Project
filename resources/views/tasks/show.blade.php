@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <div style="display: flex; justify-content: space-between; align-items: center;">
            <span>Task Details</span>
            <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Back to Tasks</a>
        </div>
    </div>
    <div class="card-body">
        <h2 class="{{ $task->completed ? 'task-completed' : '' }}" style="margin-top: 0;">{{ $task->title }}</h2>
        
        <div style="margin-bottom: 1rem;">
            <strong>Status:</strong> 
            <span class="{{ $task->completed ? 'task-completed' : '' }}">
                {{ $task->completed ? 'Completed' : 'Pending' }}
            </span>
        </div>
        
        <div style="margin-bottom: 1rem;">
            <strong>Created:</strong> {{ $task->created_at->format('M d, Y H:i') }}
        </div>
        
        @if ($task->updated_at != $task->created_at)
        <div style="margin-bottom: 1rem;">
            <strong>Last Updated:</strong> {{ $task->updated_at->format('M d, Y H:i') }}
        </div>
        @endif
        
        <div style="margin-bottom: 1rem;">
            <strong>Description:</strong>
            <p>{{ $task->description ?: 'No description provided.' }}</p>
        </div>
        
        <div style="display: flex; gap: 0.5rem; margin-top: 2rem;">
            <a href="{{ route('tasks.edit', $task) }}" class="btn btn-primary">Edit</a>
            <form action="{{ route('tasks.toggle-complete', $task) }}" method="POST" style="display: inline-block;">
                @csrf
                @method('PATCH')
                <button type="submit" class="btn btn-secondary">
                    {{ $task->completed ? 'Mark as Pending' : 'Mark as Completed' }}
                </button>
            </form>
            <form action="{{ route('tasks.destroy', $task) }}" method="POST" style="display: inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this task?')">Delete</button>
            </form>
        </div>
    </div>
</div>
@endsection

