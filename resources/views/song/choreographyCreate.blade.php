@extends('layout')

@section('title', 'Add Choreography')

@section('main')
<div class="container">
    <h1>Add Choreography for {{ $song->name }}</h1>
    <form action="{{ route('choreography.store', ['songId' => $song->songId]) }}" method="POST">
        @csrf
        @for ($i = 1; $i <= 5; $i++)
            <div class="form-group mb-3">
                <label for="dancer{{ $i }}_id">Dancer {{ $i }}:</label>
                <select class="form-control" id="dancer{{ $i }}_id" name="dancer{{ $i }}_id" required>
                    <option value="">Select Dancer</option>
                    @foreach($dancers as $dancer)
                        <option value="{{ $dancer->id }}" {{ old('dancer'.$i.'_id') == $dancer->id ? 'selected' : '' }}>
                            {{ $dancer->name }}
                        </option>
                    @endforeach
                </select>
            </div>
        @endfor
        <button type="submit" class="btn btn-primary">Submit Choreography</button>
    </form>
</div>
@endsection
