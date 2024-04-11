@extends('layout/home_layout')

@section('title', 'Welcome to ChoreCraft')

@section('main')
    <div class="container">
        <h1>Welcome to ChoreCraft</h1>
        <p class="text-center">The ultimate platform for dancers and choreographers to collaborate, create, and share.</p>
        <div>
            <a href="{{ route('registration.index') }}" class="btn btn-primary btn-custom">Sign Up</a>
            <a href="{{ route('login') }}" class="btn btn-secondary btn-custom">Log In</a>
        </div>
    </div>
@endsection
