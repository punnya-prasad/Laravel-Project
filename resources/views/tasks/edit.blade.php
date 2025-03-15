<!-- tasks/edit.blade.php -->
@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <span>Edit Task</span>
        <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Back to Tasks</a>
    </div>
    <div class="card-body">
        <form action="{{ route('tasks.update', $task) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $task->title) }}" required>
                @error('title')
                    <span style="color: var(--secondary); font-size: 0.9rem;">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3">{{ old('description', $task->description) }}</textarea>
                @error('description')
                    <span style="color: var(--secondary); font-size: 0.9rem;">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group" style="display: flex; align-items: center; gap: 0.75rem;">
                <input type="checkbox" id="completed" name="completed" style="width: 1.5rem; height: 1.5rem;" {{ $task->completed ? 'checked' : '' }}>
                <label for="completed" style="color: var(--text-light); font-weight: 500;">Mark as completed</label>
                @error('completed')
                    <span style="color: var(--secondary); font-size: 0.9rem;">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Update Task</button>
        </form>
    </div>
</div>
@endsection