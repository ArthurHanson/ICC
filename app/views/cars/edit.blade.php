@extends('cars/cars')

@section('content')
	<div class="row">
      <div class="large-12 columns">
        <h1 class="section-title">Edit Car Listing</h1>
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
    {{ Form::model($car, array('route' => array('cars.update', $car->id), 'method' => 'PUT', 'files' => true)) }}
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
		<p>Current Image. Upload a new image to replace it.</p>
		<img src="/uploads/{{$car->image}}" />
	</div>

	<div>
	{{  Form::label('image', 'Car Photo'); }}
	{{  Form::file('image', $attributes = array()); }}
	</div>
	<div>
		{{ Form::submit('Update Listing', array('class' => 'button small')) }}
	</div>
	{{ Form::close() }}


@stop