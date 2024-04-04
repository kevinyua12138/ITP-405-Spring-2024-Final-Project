@extends('layout')

@section('title', 'Blocked')

@section('main')
    <p>{{ Auth::user()->name}}, you have been blocked.</p>
@endsection 