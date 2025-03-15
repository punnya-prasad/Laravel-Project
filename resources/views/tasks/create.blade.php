<!-- tasks/create.blade.php -->
@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <span>Create New Task</span>
        <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Back to Tasks</a>
    </div>
    <div class="card-body">
        <form action="{{ route('tasks.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required>
                @error('title')
                    <span style="color: var(--secondary); font-size: 0.9rem;">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3">{{ old('description') }}</textarea>
                @error('description')
                    <span style="color: var(--secondary); font-size: 0.9rem;">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Create Task</button>
        </form>
    </div>
</div>
@endsection