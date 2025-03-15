<!-- New layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Task Manager') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=poppins:400,500,600,700&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <style>
        :root {
            --primary: #6B48FF;
            --secondary: #FF6B6B;
            --accent: #FFD93D;
            --background: #F7F1FF;
            --card-bg: #FFFFFF;
            --text: #2D1B4E;
            --text-light: #7A6B99;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, var(--background) 0%, #E8E1FF 100%);
            color: var(--text);
            min-height: 100vh;
            padding: 2rem 1rem;
        }

        .sidebar {
            position: fixed;
            left: 0;
            top: 0;
            width: 250px;
            height: 100vh;
            background: var(--primary);
            padding: 2rem 1rem;
            color: white;
            box-shadow: 5px 0 15px rgba(0, 0, 0, 0.1);
        }

        .sidebar-brand {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 2rem;
            color: var(--accent);
        }

        .sidebar-nav {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .sidebar-link {
            color: white;
            text-decoration: none;
            padding: 0.75rem 1rem;
            border-radius: 8px;
            transition: all 0.3s;
        }

        .sidebar-link:hover {
            background: rgba(255, 255, 255, 0.1);
            transform: translateX(5px);
        }

        .main-content {
            margin-left: 270px;
            max-width: 900px;
        }

        .card {
            background: var(--card-bg);
            border-radius: 15px;
            box-shadow: 0 8px 25px rgba(107, 72, 255, 0.1);
            overflow: hidden;
            margin-bottom: 2rem;
            border-left: 5px solid var(--secondary);
        }

        .card-header {
            padding: 1.5rem;
            background: linear-gradient(to right, var(--primary), var(--secondary));
            color: white;
            font-weight: 600;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .card-body {
            padding: 1.5rem;
        }

        .btn {
            padding: 0.75rem 1.5rem;
            border-radius: 25px;
            font-weight: 600;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            transition: all 0.3s;
            border: none;
        }

        .btn-primary {
            background: var(--primary);
            color: white;
        }

        .btn-primary:hover {
            background: #5A3DE6;
            transform: translateY(-2px);
        }

        .btn-secondary {
            background: var(--secondary);
            color: white;
        }

        .btn-secondary:hover {
            background: #FF5555;
            transform: translateY(-2px);
        }

        .btn-danger {
            background: #FF3D71;
            color: white;
        }

        .btn-danger:hover {
            background: #E63361;
            transform: translateY(-2px);
        }

        .form-group {
            margin-bottom: 1.5rem;
            position: relative;
        }

        .form-label {
            position: absolute;
            top: -0.75rem;
            left: 1rem;
            background: var(--card-bg);
            padding: 0 0.5rem;
            font-size: 0.9rem;
            color: var(--text-light);
            font-weight: 500;
        }

        .form-control {
            width: 100%;
            padding: 1rem;
            border: 2px solid #E8E1FF;
            border-radius: 10px;
            font-size: 1rem;
            transition: all 0.3s;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 10px rgba(107, 72, 255, 0.2);
        }

        .alert {
            padding: 1rem;
            border-radius: 10px;
            margin-bottom: 1.5rem;
            font-weight: 500;
        }

        .alert-success {
            background: #D4FFDD;
            color: #2D6B45;
        }

        .alert-danger {
            background: #FFE3E3;
            color: #B32D2D;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <a href="{{ url('/') }}" class="sidebar-brand">
            {{ config('app.name', 'Task Manager') }}
        </a>
        <div class="sidebar-nav">
            @if (session()->has('user'))
                <a href="{{ route('tasks.index') }}" class="sidebar-link">My Tasks</a>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="sidebar-link btn-danger">Logout</button>
                </form>
                <span class="sidebar-link" style="opacity: 0.8;">
                    Welcome, {{ session('user')['name'] }}
                </span>
            @else
                <a href="{{ route('login') }}" class="sidebar-link">Login</a>
                <a href="{{ route('register') }}" class="sidebar-link">Register</a>
            @endif
        </div>
    </div>

    <div class="main-content">
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