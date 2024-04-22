@extends('layout')

@section('title', 'Add New Song')

@section('main')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="text-white p-4 rounded">
                <h2 class="text-center mb-4">Add New Song</h2>

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

                <form action="{{ route('song.store') }}" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="name">Song Name:</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                    </div>
                    <div class="form-group mb-4">
                        <label for="artist">Artist:</label>
                        <select class="form-control" id="artist" name="artist" required>
                            <option value="">Select Artist</option>
                            @foreach($artists as $artist)
                                <option value="{{ $artist->id }}" {{ old('artist') == $artist->id ? 'selected' : '' }}>
                                    {{ $artist->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3 text-center">
                        <p>Can't find the artist? <a href="{{ route('artist.create') }}" class="text-primary">Add a new artist</a>.</p>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary px-5">Add Song</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
