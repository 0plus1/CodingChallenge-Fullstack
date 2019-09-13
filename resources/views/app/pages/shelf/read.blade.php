@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <h1>Shelf {{ $shelf->name }}</h1>
            <table>
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>ISBN</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($shelf->books as $book)
                <tr>
                    <td>{{ $book->book_id }}</td>
                    <td><span class="faux-link js-action" data-event="click" data-action="call-api" data="url" data-param="{{ $book->book_id }}">{{ $book->name }}</span></td>
                    <td>{{ $book->isbn }}</td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection