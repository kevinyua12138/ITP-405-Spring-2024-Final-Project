@extends('layout')

@section('title', 'Add New Artist')

@section('main')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="text-white p-4 rounded" >
                <h2 class="card-title text-white text-center mb-4">Add New Artist</h2>

                @if(session('errors'))
                    <div class="alert alert-danger">
                    {{ session('errors')->first() }}
                    </div>
                @endif
                
                <form action="{{ route('artist.store') }}" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="name" class="text-white">Artist Name:</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary px-5">Add Artist</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
