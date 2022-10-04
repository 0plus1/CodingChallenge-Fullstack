@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <h1>Welcome!</h1>
            
            <h2>List of shelves</h2>
            <ul>
                @foreach ($shelfs as $text => $link)
                <li><a href="/shelf/{{$link}}/read">{{$text}}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection