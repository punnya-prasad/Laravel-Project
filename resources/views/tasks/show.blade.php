<!-- tasks/show.blade.php -->
@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <span>Task Details</span>
        <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Back to Tasks</a>
    </div>
    <div class="card-body">
        <h2 style="margin-bottom: 1.5rem; font-weight: 600; {{ $task->completed ? 'text-decoration: line-through; color: var(--text-light);' : '' }}">{{ $task->title }}</h2>
        
        <div style="margin-bottom: 1rem; display: flex; gap: 0.5rem;">
            <strong style="font-weight: 600;">Status:</strong> 
            <span style="{{ $task->completed ? 'text-decoration: line-through; color: var(--text-light);' : '' }}">
                {{ $task->completed ? 'Completed' : 'Pending' }}
            </span>
        </div>
        
        <div style="margin-bottom: 1rem; display: flex; gap: 0.5rem;">
            <strong style="font-weight: 600;">Created:</strong> 
            {{ $task->created_at->format('M d, Y H:i') }}
        </div>
        
        @if ($task->updated_at != $task->created_at)
        <div style="margin-bottom: 1rem; display: flex; gap: 0.5rem;">
            <strong style="font-weight: 600;">Last Updated:</strong> 
            {{ $task->updated_at->format('M d, Y H:i') }}
        </div>
        @endif
        
        <div style="margin-bottom: 2rem;">
            <strong style="font-weight: 600; display: block; margin-bottom: 0.5rem;">Description:</strong>
            <p style="color: var(--text-light);">{{ $task->description ?: 'No description provided.' }}</p>
        </div>
        
        <div style="display: flex; gap: 1rem;">
            <a href="{{ route('tasks.edit', $task) }}" class="btn btn-primary">Edit</a>
            <form action="{{ route('tasks.toggle-complete', $task) }}" method="POST">
                @csrf
                @method('PATCH')
                <button type="submit" class="btn btn-secondary">
                    {{ $task->completed ? 'Mark as Pending' : 'Mark as Completed' }}
                </button>
            </form>
            <form action="{{ route('tasks.destroy', $task) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this task?')">Delete</button>
            </form>
        </div>
    </div>
</div>
@endsection