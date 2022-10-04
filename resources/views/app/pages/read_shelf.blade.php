@extends('layouts.app')

@section('content')

	<div id="app">
		<Shelf 
			:name='@json($shelfName)' 
			:books='@json($books)'
		/>
	</div>

@endsection