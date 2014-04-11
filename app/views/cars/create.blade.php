@extends('cars/cars')

@section('content')
	<div class="row">
      <div class="large-12 columns">
        <h1 class="section-title adminpage">Add Car Listing</h1>
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
    {{ Form::open(array('url' => 'cars', 'files' => true)) }}
    <div>
    {{	Form::label('car_type', 'Car Type'); }}
	{{  Form::text('car_type'); }}
	</div>
	<div>
	{{  Form::label('color', 'Car Color'); }}
	{{  Form::text('color'); }}
	</div>
	<div>
	{{  Form::label('price', 'Car Price Description'); }}
	{{  Form::text('price'); }}
	</div>
	<div>
	{{  Form::label('description', 'Car Description'); }}
	{{  Form::text('description'); }}
	</div>
	<div>
	{{  Form::label('image', 'Car Photo'); }}
	{{  Form::file('image', $attributes = array()); }}
	</div>
	<div>
		{{ Form::submit('Add Listing', array('class' => 'button small')) }}
	</div>
	{{ Form::close() }}


@stop