@extends('utility')

@section('content')

<h1>Log In</h1>
@if($errors->has())

		We encountered the following errors:

		<ul>
		    @foreach($errors->all() as $message)

		    <li>{{ $message }}</li>

		    @endforeach
		</ul>

	@endif
	{{ Form::open(array('url' => 'login')) }}
		<!-- if there are login errors, show them here -->
		<p>
			{{ $errors->first('email') }}
			{{ $errors->first('password') }}
		</p>

		<p>
			{{ Form::label('email', 'Email Address') }}
			{{ Form::text('email', Input::old('email'), array('placeholder' => 'awesome@awesome.com')) }}
		</p>

		<p>
			{{ Form::label('password', 'Password') }}
			{{ Form::password('password') }}
		</p>
		<p><a href="/">Main Site</a></p>
		<p><a href="/password/remind">Forgot Password</a></p>
		<p> {{ Form::submit('Submit', array('class' => 'button small')) }}</p>
	{{ Form::close() }}
@stop
