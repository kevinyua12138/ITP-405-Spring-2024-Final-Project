@extends('layout')

@section('title', 'Songs')

@section('main')
    <div class="container mt-4">
        <h2 class="mb-3">Songs List</h2>
        
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        
        <div class="row mt-3">
            <div class="col-md-4 mb-3">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <h5 class="card-title">Add New Song</h5>
                        <a href="{{ route('song.create') }}" class="btn btn-primary">Add Song</a>
                    </div>
                </div>
            </div>
            
            @foreach($songs as $song)
                <div class="col-md-4 mb-3">
                    <div class="card h-100">
                        <div class="card-body position-relative">
                            <h5 class="card-title">{{ $song->name }}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">
                                <a href="{{ route('artist.show', ['artistId' => $song->artist->id]) }}">
                                    {{ $song->artist->name }}
                                </a>
                            </h6>       
                            @if(Auth::check() && Auth::user()->email === 'admin@gmail.com')
                                <form action="{{ route('song.delete', ['songId' => $song->songId]) }}" method="POST" class="position-absolute top-0 end-0 mt-2 me-2" onsubmit="return confirm('Are you sure you want to delete this song?');">
                                    @csrf
                                    <button type="submit" class="btn btn-outline-none">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                                        <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                                        </svg>
                                    </button>
                                </form>
                            @endif

                            <a href="{{ route('song.show', ['songId' => $song->songId]) }}" class="btn btn-primary card-link">View Details</a>
                        </div>
                    </div>
                </div>
            @endforeach


        </div>
        
        @if($songs->isEmpty())
            <p>No songs available.</p>
        @endif
    </div>
@endsection
