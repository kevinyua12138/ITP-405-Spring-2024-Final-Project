@extends('layout')

@section('title', 'Edit Artist')

@section('main')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="text-white p-4 rounded">
                <h2 class="text-center mb-4">Edit Artist</h2>

                @if(session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                
                @error('artist')
                    <div class="alert alert-danger" role="alert">
                        {{ $message }}
                    </div>
                @enderror

                <form action="{{ route('songs.update.artist', $song->songId) }}" method="POST">
                    @csrf
                    <div class="form-group mb-4">
                        <label for="artist">Artist:</label>
                        <select class="form-control" id="artist" name="artist" required>
                            <option value="">Select Artist</option>
                            @foreach($artists as $artist)
                                <option value="{{ $artist->id }}" {{ $song->artist->id == $artist->id ? 'selected' : '' }}>
                                    {{ $artist->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary px-5">Update Artist</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
