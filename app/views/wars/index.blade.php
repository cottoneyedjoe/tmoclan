@extends('layouts/main')
	@section('title')
		Wars
	@stop
	@section('content')
		@foreach($errors->all() as $error)
			<h1>Error!</h1>
			<p>{{ $error }}</p>
		@endforeach
	@stop