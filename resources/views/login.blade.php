@extends('layout.navbar')

@section('title', 'Login')

@section('active-login', 'active')

@section('content')
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh;">
        <div class="login-card col-md-6">
            <h3 class="text-center">Login</h3>
            @if ($errors->has('login'))
                <div class="alert alert-danger">
                    {{ $errors->first('login') }}
                </div>
            @endif
            <form action="/login" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" class="form-control" aria-label="Username" aria-describedby="basic-addon1" name="email">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" aria-label="Username" aria-describedby="basic-addon1" name="password">
                </div>
                <div class="form-check mb-3">
                    <input type="checkbox" class="form-check-input" id="rememberMe" name="remember">
                    <label class="form-check-label" for="rememberMe">Remember Me</label>
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-danger">Login</button>
                </div>
                <div class="mt-3 text-center">
                    <p>Don't have an account? <a href="/register">Register here</a></p>
                </div>
            </form>
        </div>
    </div>
@endsection
