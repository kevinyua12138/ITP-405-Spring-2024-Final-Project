@extends('layout/home_layout')

@section('title', 'Login')

@section('main')
<div class="container container-custom">
    <h1 class="text-center">Login</h1>

    @if(session('error'))
        <div class="alert alert-danger" role="alert">
            {{ session('error') }} 
        </div>
    @endif

    <form method="post" action="{{ route('auth.login') }}" class="login-form my-4">
        @csrf
        <div class="mb-3">
            <label class="form-label" for="email">Email</label>
            <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label" for="password">Password</label>
            <input type="password" id="password" name="password" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary w-100">Login</button>
    </form>
</div>
@endsection
