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
    <h2><strong>Title:</strong> {{ $song->name }}
        @if(Auth::check() && Auth::user()->email === 'admin@gmail.com')
            <a href="{{ route('songs.edit.title', ['songId' => $song->songId]) }}" class="btn">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" class="bi bi-pen" viewBox="0 0 16 16">
                    <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001m-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708z"/>
                </svg>
            </a>
        @endif
    </h2>
    <p><strong>Artist:</strong> {{ $song->artist->name }}
        @if(Auth::check() && Auth::user()->email === 'admin@gmail.com')
            <a href="{{ route('songs.edit.artist', ['songId' => $song->songId]) }}" class="btn">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" class="bi bi-pen" viewBox="0 0 16 16">
                    <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001m-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708z"/>
                </svg>
            </a>
        @endif
    </p>

    <form action="{{ $isFavorited ? route('song.unfavorite', ['songId' => $song->songId]) : route('song.favorite', ['songId' => $song->songId]) }}" method="POST">
    @csrf
    @if (!$isFavorited)
    <div style="display: flex; justify-content: space-between; align-items: center;">
        <button type="submit" style="background: none; border: none; padding: 0; display: flex; align-items: center; gap: 5px; cursor: pointer; color: white;">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" class="bi bi-heart" viewBox="0 0 16 16">
                <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143q.09.083.176.171a3 3 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15"/>
            </svg>
            <span>Add to Favorite</span>
        </button>
        <a href="{{ route('choreography.add', ['songId' => $song->songId]) }}" style="background: none; border: none; padding: 0; display: flex; align-items: center; gap: 5px; cursor: pointer; color: white;">
            <button type="button" style="background: none; border: none; padding: 0; display: flex; align-items: center; gap: 5px; cursor: pointer; color: white;">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
                </svg>
                <span>Add your Choreography Now</span>
            </button>
        </a>
    </div>
    @else
    <div style="display: flex; justify-content: space-between; align-items: center;">
        <button type="submit" style="background: none; border: none; padding: 0; display: flex; align-items: center; gap: 5px; cursor: pointer; color: white;">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" class="bi bi-heart-fill" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314"/>
            </svg>
            <span>Remove from Favorite</span>
        </button>
        
        <a href="{{ route('choreography.add', ['songId' => $song->songId]) }}" style="background: none; border: none; padding: 0; display: flex; align-items: center; gap: 5px; cursor: pointer; color: white;">
            <button type="button" style="background: none; border: none; padding: 0; display: flex; align-items: center; gap: 5px; cursor: pointer; color: white;">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
                </svg>
                <span>Add your Choreography Now</span>
            </button>
        </a>
    </div>
    @endif
    </form>
  
    @foreach ($song->choreographies as $choreography)
        @for ($i = 1; $i <= 5; $i++)
            @php $dancerKey = 'dancer'.$i.'_id'; @endphp
            @if ($choreography->$dancerKey == Auth::id())
            <div class="alert alert-success" role="alert">
                You are currently in this choreography assigned to position {{ $i }} with ID: {{ $choreography->id }}
            </div>
            @endif
        @endfor
    @endforeach

    <form action="{{ route('comments.store', $song->songId) }}" method="POST" class="mb-3">
        @csrf
        <div class="mb-3">
            <textarea class="form-control @error('body') is-invalid @enderror" id="body" name="body" rows="1" placeholder="Add a comment" onfocus="expandCommentBox()" onblur="shrinkCommentBox()"></textarea>
            @error('body')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary d-none" id="postCommentBtn">Post Comment</button>
    </form>

    @if($song->comments->isNotEmpty())
        <div class="comments mt-4">
            @foreach ($song->comments as $comment)
                <div class="card mb-2">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <p class="card-text">{{ $comment->body }}</p>
                                <p class="card-footer">
                                    Comment by {{ $comment->user->name }} on {{ $comment->created_at->format('F d, Y h:i A') }}
                                </p>
                            </div>
                            <div>
                                @if (Auth::id() == $comment->user_id || Auth::user()->email === 'admin@gmail.com')
                                <button class="btn btn-light btn-sm" type="button" id="commentOptions{{ $comment->id }}" data-bs-toggle="dropdown" aria-expanded="false">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"class="bi bi-three-dots" viewBox="0 0 16 16">
                                        <path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3m5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3m5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3"/>
                                    </svg>
                                </button>
                                <ul class="dropdown-menu">
                                    <li>
                                        <form method="GET" action="{{ route('comments.edit', $comment->id) }}">
                                            <button type="submit" class="dropdown-item">Edit</button>
                                        </form>
                                        <form method="POST" action="{{ route('comments.delete', $comment->id) }}">
                                            @csrf
                                            <button type="submit" class="dropdown-item">Delete</button>
                                        </form>
                                    </li>
                                </ul>   
                                @endif
                            </div>
                        </div>  
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p class="mt-4">No comments yet. Be the first to comment!</p>
    @endif
    
    <script>
    function expandCommentBox() {
        document.getElementById('body').style.height = '100px'; 
        var postCommentBtn = document.getElementById('postCommentBtn');
        postCommentBtn.classList.remove('d-none'); 
    }

    function shrinkCommentBox() {
        if (!document.getElementById('body').value.trim()) {
            document.getElementById('body').style.height = '38px';
            var postCommentBtn = document.getElementById('postCommentBtn');
            postCommentBtn.classList.add('d-none');
        }
    }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js">
    </script>
@endsection
