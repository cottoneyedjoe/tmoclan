@extends('layouts/main')
	@section('title')
		User registration
	@stop
	@section('content')
	<div class="col-md-4">
		{{ Form::open(array('url' => 'user')) }}

		<div class="form-group">
			{{ Form::label('email', 'E-mail address') }}
			{{ Form::text('email', Input::old('email'), array('placeholder' => 'Your e-mail address')) }}
			<ul class="list-unstyled text-danger">
				@foreach($errors->get('email') as $error)
				<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>

		<div class="form-group">
			{{ Form::label('password', "Password") }}
			{{ Form::password('password') }}
			<ul class="list-unstyled text-danger">
				@foreach($errors->get('password') as $error)
				<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>

		<div class="form-group">
			{{ Form::label('password_confirmation', "Password confirmation") }}
			{{ Form::password('password_confirmation') }}
			<ul class="list-unstyled text-danger">
				@foreach($errors->get('password_confirmation') as $error)
				<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
		
		<hr>
		{{ Form::submit('Register', array("class" => "btn btn-success")) }}
		{{ Form::close() }}
	</div>
	@stop