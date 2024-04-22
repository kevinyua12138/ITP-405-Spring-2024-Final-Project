@extends('layout')

@section('title', 'Artists Details')

@section('main')
    <h2><strong>Title:</strong> {{ $artist->name }}</h2>
    <table class="table table-striped table-hover">
        <thead class="thead-dark"> 
            <tr>
                <th scope="col">Song Name</th>
            </tr>
        </thead>
        <tbody>
            @foreach($artist->songs as $song)
                <tr>
                    <td>
                        <a href=" {{route('song.show', ['songId' => $song->songId])}} ">{{$song->name}}</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection