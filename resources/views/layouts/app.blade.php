<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Task Manager') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <style>
        body {
            font-family: 'Figtree', sans-serif;
            background-color: #f8fafc;
            color: #1a202c;
            line-height: 1.5;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 1rem;
        }
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 0;
            border-bottom: 1px solid #e2e8f0;
            margin-bottom: 2rem;
        }
        .navbar-brand {
            font-size: 1.5rem;
            font-weight: 600;
            color: #4a5568;
            text-decoration: none;
        }
        .navbar-nav {
            display: flex;
            gap: 1rem;
            align-items: center;
        }
        .nav-link {
            color: #4a5568;
            text-decoration: none;
            transition: color 0.2s;
        }
        .nav-link:hover {
            color: #2d3748;
        }
        .btn {
            display: inline-block;
            padding: 0.5rem 1rem;
            border-radius: 0.25rem;
            font-weight: 500;
            text-align: center;
            text-decoration: none;
            cursor: pointer;
            transition: background-color 0.2s, color 0.2s;
        }
        .btn-primary {
            background-color: #4299e1;
            color: white;
            border: 1px solid #4299e1;
        }
        .btn-primary:hover {
            background-color: #3182ce;
            border-color: #3182ce;
        }
        .btn-secondary {
            background-color: #e2e8f0;
            color: #4a5568;
            border: 1px solid #e2e8f0;
        }
        .btn-secondary:hover {
            background-color: #cbd5e0;
            border-color: #cbd5e0;
        }
        .btn-danger {
            background-color: #f56565;
            color: white;
            border: 1px solid #f56565;
        }
        .btn-danger:hover {
            background-color: #e53e3e;
            border-color: #e53e3e;
        }
        .card {
            background-color: white;
            border-radius: 0.5rem;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
            margin-bottom: 1rem;
            overflow: hidden;
        }
        .card-header {
            padding: 1rem;
            background-color: #f7fafc;
            border-bottom: 1px solid #e2e8f0;
            font-weight: 600;
        }
        .card-body {
            padding: 1rem;
        }
        .form-group {
            margin-bottom: 1rem;
        }
        .form-label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
        }
        .form-control {
            display: block;
            width: 100%;
            padding: 0.5rem;
            border: 1px solid #e2e8f0;
            border-radius: 0.25rem;
            background-color: white;
            font-size: 1rem;
            line-height: 1.5;
        }
        .form-control:focus {
            outline: none;
            border-color: #4299e1;
            box-shadow: 0 0 0 3px rgba(66, 153, 225, 0.5);
        }
        .alert {
            padding: 1rem;
            border-radius: 0.25rem;
            margin-bottom: 1rem;
        }
        .alert-success {
            background-color: #c6f6d5;
            color: #2f855a;
        }
        .alert-danger {
            background-color: #fed7d7;
            color: #c53030;
        }
        .task-list {
            list-style: none;
            padding: 0;
        }
        .task-item {
            padding: 1rem;
            border-bottom: 1px solid #e2e8f0;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .task-item:last-child {
            border-bottom: none;
        }
        .task-title {
            font-weight: 500;
        }
        .task-completed {
            text-decoration: line-through;
            color: #a0aec0;
        }
        .task-actions {
            display: flex;
            gap: 0.5rem;
        }
        .checkbox-container {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        .checkbox {
            width: 1.25rem;
            height: 1.25rem;
        }
    </style>
</head>
<body>
    <div class="container">
        <nav class="navbar">
            <a href="{{ url('/') }}" class="navbar-brand">
                {{ config('app.name', 'Task Manager') }}
            </a>
            <div class="navbar-nav">
                @if (session()->has('user'))
                    <a href="{{ route('tasks.index') }}" class="nav-link">My Tasks</a>
                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-danger">Logout</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="nav-link">Login</a>
                    <a href="{{ route('register') }}" class="nav-link">Register</a>
                @endif
            </div>
        </nav>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        @yield('content')
    </div>
</body>
</html>

