@extends('layout')

@section('content')
	<div class="row">
      <div class="large-12 columns">
        <h1 class="section-title">Edit Car List</h1>
      </div>
    </div>

	@if($errors->has())

		We encountered the following errors:

		<ul>
		    @foreach($errors->all() as $message)

		    <li>{{ $message }}</li>

		    @endforeach
		</ul>

	@endif
    {{ Form::open(array('url' => 'update/add', 'files' => true)) }}
    <div>
    {{	Form::label('car_type', 'Car Type'); }}
	{{  Form::text('car_type'); }}
	</div>
	<div>
	{{  Form::label('car_color', 'Car Color'); }}
	{{  Form::text('car_color'); }}
	</div>
	<div>
	{{  Form::label('car_description', 'Car Description'); }}
	{{  Form::text('car_description'); }}
	</div>
	<div>
	{{  Form::label('car_photo', 'Car Photo'); }}
	{{  Form::file('car_photo', $attributes = array()); }}
	</div>
	{{ Form::close() }}


	<!-- LOGOUT BUTTON -->
	
	<a href="/">Main Page</a><br />
	<a href="{{ URL::to('logout') }}">Logout</a>
@stop