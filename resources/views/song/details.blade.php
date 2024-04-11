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
                                <button class="btn btn-light btn-sm" type="button" id="commentOptions{{ $comment->id }}" data-bs-toggle="dropdown" aria-expanded="false">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots" viewBox="0 0 16 16">
                                        <path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3m5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3m5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3"/>
                                    </svg>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="commentOptions{{ $comment->id }}">
                                    <!-- Assuming you handle authorization in your view or controller -->
                                    @if (Auth::id() == $comment->user_id)
                                        <li><a class="dropdown-item" href="">Edit</a></li>
                                        <li>
                                            <form method="POST" action="">
                                            @csrf
                                            <button type="submit" class="dropdown-item">Delete</button>
                                            </form>
                                        </li>
                                    @endif
                                </ul>   
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
        // Increase the textarea height
        document.getElementById('body').style.height = '100px'; // Adjust the height as needed
        
        // Show the 'Post Comment' button
        var postCommentBtn = document.getElementById('postCommentBtn');
        postCommentBtn.classList.remove('d-none'); // Show the button if it was hidden
    }

    function shrinkCommentBox() {
        // Check if the textarea is empty
        if (!document.getElementById('body').value.trim()) {
            // Shrink the textarea height
            document.getElementById('body').style.height = '38px'; // Reset to default or initial height
            
            // Hide the 'Post Comment' button
            var postCommentBtn = document.getElementById('postCommentBtn');
            postCommentBtn.classList.add('d-none'); // Hide the button
        }
    }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js">
    </script>
@endsection
