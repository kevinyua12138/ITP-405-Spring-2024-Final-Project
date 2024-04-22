@extends('layout')

@section('title', 'Edit Song Title')

@section('main')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="text-white p-4 rounded">
                <h2 class="text-center mb-4">Edit Song Title</h2>
                
                @error('name')
                    <div class="alert alert-danger" role="alert">
                        {{ $message }}
                    </div>
                @enderror

                <form action="{{ route('songs.update.title', $song->songId) }}" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="name">Song Title:</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $song->name }}" required>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary px-5">Update Title</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
