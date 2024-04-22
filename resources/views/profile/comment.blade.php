@extends('layout')

@section('title', 'Edit Comment')

@section('main')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="text-white p-4 rounded">
                <h2 class="text-center mb-4">Edit Comment</h2>

                @error('body')
                    <div class="alert alert-danger" role="alert">
                        {{ $message }}
                    </div>
                @enderror

                <form action="{{ route('comments.update', $comment->id) }}" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="body">Comment:</label>
                        <textarea class="form-control" id="body" name="body" rows="3" required>{{ $comment->body }}</textarea>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary px-5">Update Comment</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
