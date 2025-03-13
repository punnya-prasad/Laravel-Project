<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Task Manager</a>
    <div class="collapse navbar-collapse d-flex justify-content-end">
        <ul class="navbar-nav">
            @if (session()->has('user'))
                <li class="nav-item me-3">
                    <span class="navbar-text">Welcome, {{ session('user')['name'] }}</span>
                </li>
                <li class="nav-item">
                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-danger">Logout</button>
                    </form>
                </li>
            @else
                <li class="nav-item">
                    <a href="{{ route('register') }}" class="btn btn-secondary me-2">Register</a>
                    <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
                </li>
            @endif
        </ul>
    </div>
</nav>
