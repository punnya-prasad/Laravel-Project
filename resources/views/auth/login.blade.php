@extends('layouts.app')

@section('content')
<div class="card" style="max-width: 500px; margin: 0 auto;">
    <div class="card-header">Login</div>
    <div class="card-body">
        <form method="POST" action="{{ route('login.submit') }}">
            @csrf
            <div class="form-group">
                <label for="email" class="form-label">Email Address</label>
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="password" class="form-label">Password</label>
                <input id="password" type="password" class="form-control" name="password" required>
                @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <div class="checkbox-container">
                    <input type="checkbox" name="remember" id="remember" class="checkbox" {{ old('remember') ? 'checked' : '' }}>
                    <label for="remember" class="form-label" style="margin-bottom: 0;">
                        Remember Me
                    </label>
                </div>
            </div>

            <div class="form-group" style="margin-top: 1.5rem;">
                <button type="submit" class="btn btn-primary" style="width: 100%;">
                    Login
                </button>
            </div>

            <div style="text-align: center; margin-top: 1rem;">
                <p>Don't have an account? <a href="{{ route('register') }}">Register</a></p>
            </div>
        </form>
    </div>
</div>
@endsection

