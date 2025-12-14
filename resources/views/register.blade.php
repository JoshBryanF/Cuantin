@extends('layout.navbar')

@section('title', 'Register')

@section('active', 'active')

@section('content')
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh;">
        <div class="register-card col-md-6">
            <h3 class="text-center">Sign Up</h3>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <form action="/register" method="POST">
                @csrf
                <div class="mb-1">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" name="name">
                </div>
                <div class="mb-1">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" class="form-control" name="email">
                </div>
                <div class="mb-1">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password">
                </div>
                <div class="mb-1">
                    <label for="passwordcheck" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" name="passwordcheck">
                </div>
                <div class="mb-1">
                    <label for="phone" class="form-label">Phone Number</label>
                    <input type="text" class="form-control" name="phone">
                </div>
                <div class="mt-2 mb-1">
                    <button type="submit" class="btn btn-danger">Register</button>
                </div>
                
                <div class="mb-1">
                    <p>Already have an account? <a href="/login">Login here</a></p>
                </div>
            </form>
        </div>
    </div>
    @endsection
