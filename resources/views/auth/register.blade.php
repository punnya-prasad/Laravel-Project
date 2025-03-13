@extends('layouts.app')

@section('content')
<div class="card" style="max-width: 500px; margin: 0 auto;">
    <div class="card-header">Register</div>
    <div class="card-body">
        <form method="POST" action="{{ route('register.submit') }}">
            @csrf
            <div class="form-group">
                <label for="name" class="form-label">Name</label>
                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="email" class="form-label">Email Address</label>
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
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
                <label for="password-confirm" class="form-label">Confirm Password</label>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
            </div>

            <div class="form-group" style="margin-top: 1.5rem;">
                <button type="submit" class="btn btn-primary" style="width: 100%;">
                    Register
                </button>
            </div>

            <div style="text-align: center; margin-top: 1rem;">
                <p>Already have an account? <a href="{{ route('login') }}">Login</a></p>
            </div>
        </form>
    </div>
</div>
@endsection

