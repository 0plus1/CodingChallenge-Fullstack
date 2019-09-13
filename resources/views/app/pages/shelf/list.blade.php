@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <h1>Shelves</h1>
            <ul>
                @foreach($shelves as $shelf)
                    <li><a href="{{ Url('/shelf/'.$shelf->slug.'/read') }}">{{ $shelf->name }}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection