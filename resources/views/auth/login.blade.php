<!-- auth/login.blade.php -->
@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">Login</div>
    <div class="card-body">
        <form method="POST" action="{{ route('login.submit') }}">
            @csrf
            <div class="form-group">
                <label for="email" class="form-label">Email Address</label>
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                @error('email')
                    <span style="color: var(--secondary); font-size: 0.9rem;">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="password" class="form-label">Password</label>
                <input id="password" type="password" class="form-control" name="password" required>
                @error('password')
                    <span style="color: var(--secondary); font-size: 0.9rem;">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group" style="display: flex; align-items: center; gap: 0.75rem;">
                <input type="checkbox" name="remember" id="remember" style="width: 1.5rem; height: 1.5rem;" {{ old('remember') ? 'checked' : '' }}>
                <label for="remember" style="color: var(--text-light); font-weight: 500;">Remember Me</label>
            </div>

            <div style="display: flex; flex-direction: column; gap: 1rem; margin-top: 2rem;">
                <button type="submit" class="btn btn-primary">Login</button>
                <p style="text-align: center; color: var(--text-light);">
                    Don't have an account? 
                    <a href="{{ route('register') }}" style="color: var(--primary); text-decoration: none;">Register</a>
                </p>
            </div>
        </form>
    </div>
</div>
@endsection