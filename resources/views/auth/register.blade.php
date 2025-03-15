<!-- auth/register.blade.php -->
@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">Register</div>
    <div class="card-body">
        <form method="POST" action="{{ route('register.submit') }}">
            @csrf
            <div class="form-group">
                <label for="name" class="form-label">Name</label>
                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                @error('name')
                    <span style="color: var(--secondary); font-size: 0.9rem;">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="email" class="form-label">Email Address</label>
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
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

            <div class="form-group">
                <label for="password-confirm" class="form-label">Confirm Password</label>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
            </div>

            <div style="display: flex; flex-direction: column; gap: 1rem; margin-top: 2rem;">
                <button type="submit" class="btn btn-primary">Register</button>
                <p style="text-align: center; color: var(--text-light);">
                    Already have an account? 
                    <a href="{{ route('login') }}" style="color: var(--primary); text-decoration: none;">Login</a>
                </p>
            </div>
        </form>
    </div>
</div>
@endsection