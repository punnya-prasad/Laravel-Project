<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Task Manager</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>     
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Task Manager</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="#">Home</a>
                </li>
            </ul>
            @if (session()->has('user'))
                <p class="me-3 mb-0">Welcome, {{ session('user')['name'] }}</p>
                <form action="{{ route('logout') }}" method="post" class="d-inline">
                    @csrf
                    <input type="submit" value="Logout" class="btn btn-danger">
                </form>
            @else
                <a href="{{ route('register') }}" class="btn btn-secondary me-2">Register</a>
                <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
            @endif
        </div>
    </nav>

    <div class="container mt-4">
        <h2 class="mb-3">Task List</h2>
        
        <!-- Display success messages -->
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <!-- Task Creation Form -->
        <form action="{{ route('tasks.store') }}" method="POST" class="mb-3">
            @csrf
            <div class="input-group">
                <input type="text" name="title" class="form-control" placeholder="New Task" required>
                <button type="submit" class="btn btn-success">Add</button>
            </div>
        </form>

        <!-- Task List -->
        <ul class="list-group">
            @if (isset($tasks))
            
            @foreach ($tasks as $task)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <span class="{{ $task->completed ? 'text-decoration-line-through' : '' }}">{{ $task->title }}</span>
                    <div>
                        <!-- Toggle Completion -->
                        <form action="{{ route('tasks.toggleComplete', $task->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-sm {{ $task->completed ? 'btn-warning' : 'btn-success' }}">
                                {{ $task->completed ? 'Undo' : 'Complete' }}
                            </button>
                        </form>
                        
                        <!-- Edit Task -->
                        <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-sm btn-primary">Edit</a>
                        
                        <!-- Delete Task -->
                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </div>
                </li>
                @endforeach
                @endif
        </ul>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
