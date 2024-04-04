@extends('layout')

@section('title', 'Register')

@section('main')

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Song Name</th>
                <th>Artist</th>
            </tr>
        </thead>
        <tbody>
            @foreach($songs as $song)
                <tr>
                    <td>
                        <a href="{{ route('song.show', ['songId' => $song->songId]) }}">{{ $song->name }}</a>
                    </td>
                    <td>{{$song->artist->name}}</td>
                </tr>
            @endforeach
        </tbody>
    </table> 

   

@endsection 