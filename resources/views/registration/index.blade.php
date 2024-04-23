@extends('layout/home_layout') 

@section('title', 'Register')

@section('main')
<div class="container container-custom">
    
    <h1 class="text-center my-4">Register</h1>
    
    @if(session('errors'))
        <div class="alert alert-danger">
        {{ session('errors')->first() }}
        </div>
    @endif

    <form method="post" action="{{ route('registration.create') }}">
        @csrf
        <div class="mb-3">
            <label class="form-label" for="name">Full name</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label" for="email">Email</label>
            <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label" for="password">Password</label>
            <input type="password" id="password" name="password" class="form-control" required>
        </div>
        <div class="d-flex justify-content-between">
            <button type="submit" class="btn btn-primary w-50 mr-2">Register</button>
            <a href="{{ route('login') }}" class="btn btn-secondary w-50 ml-2">Login</a>
        </div>
    </form>
</div>
@endsection
