@extends('layout')

@section('title', 'Song Details')

@section('main')
<div class="container">
    <h1>Your Favorite Songs</h1>

    @if($favorites->isEmpty())
        <p>You haven't added any songs to your favorites. 
            <a href="{{ route('songs.index') }}">Add one now</a>
        </p>
    @else
        <div class="list-group">
            @foreach ($favorites as $favorite)
                <a href=" {{route('song.show', ['songId' => $favorite->songId])}} " class="list-group-item list-group-item-action">
                    <h5 class="mb-1">{{ $favorite->name }}</h5>
                    <p class="mb-1">Artist: {{ $favorite->artist->name }}</p>
                    <small>Added on: {{ $favorite->pivot->created_at->format('F d, Y') }}</small>
                </a>
            @endforeach
        </div>
    @endif
</div>
@endsection
