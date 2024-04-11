@extends('layout')

@section('title', 'Songs')

@section('main')
    <h2 class="mb-3">Songs List</h2>
    <table class="table table-striped table-hover">
        <thead class="thead-dark"> 
            <tr>
                <th scope="col">Song Name</th>
                <th scope="col">Artist</th>
            </tr>
        </thead>
        <tbody>
            @foreach($songs as $song)
                <tr>
                    <td>
                        <a href="{{ route('song.show', ['songId' => $song->songId]) }}">{{ $song->name }}</a>
                    </td>
                    <td>
                        <a href="{{route('artist.show', ['artistId' => $song->artist->id])}}">{{$song->artist->name}}</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table> 

   

@endsection 

@extends('layout')

