@extends('layouts.guest')

@section('content')
<div class="container">
    <h1>Login</h1>

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="form-group mb-3">
            <label for="email" class="form-label">Email</label>
            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
            @error('email')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="password" class="form-label">Password</label>
            <input id="password" type="password" class="form-control" name="password" required>
            @error('password')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="remember_me" class="form-label">
                <input type="checkbox" name="remember" id="remember_me">
                Remember Me
            </label>
        </div>

        <button type="submit" class="btn btn-primary">Login</button>

        <div class="text-center mt-3">
            <a href="{{ route('password.request') }}">Forgot Your Password?</a>
        </div>
    </form>
</div>
@endsection
