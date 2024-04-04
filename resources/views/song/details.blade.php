@extends('layout')

@section('title', 'Song Details')
@php
    $user = Auth::user();
    $isFavorited = $user ? $user->favorites()->where('song_id', $song->songId)->exists() : false;
@endphp
@section('main')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <h1>Song Details</h1>
    <p><strong>Title:</strong> {{ $song->name }}</p>
    <p><strong>Artist:</strong> {{ $song->artist->name }}</p>
    <form action="{{ $isFavorited ? route('song.unfavorite', ['songId' => $song->songId]) : route('song.favorite', ['songId' => $song->songId]) }}" method="POST">
    @csrf
    @if (!$isFavorited)
        <button type="submit" style="background: none; border: none; padding: 0; display: flex; align-items: center; gap: 5px; cursor: pointer; color: currentColor;">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
                <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143q.09.083.176.171a3 3 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15"/>
            </svg>
            <span>Add to Favorite</span>
        </button>
    @else
        <button type="submit" style="background: none; border: none; padding: 0; display: flex; align-items: center; gap: 5px; cursor: pointer; color: currentColor;">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314"/>
            </svg>
            <span>Remove from Favorite</span>
        </button>
    @endif
    </form>
    
@endsection
