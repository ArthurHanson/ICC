@extends('cars/cars')

@section('content')
	<div class="row">
      <div class="large-12 columns">
        <h1 class="section-title adminpage">Available Cars</h1>
      </div>
    </div>


	@foreach ($cars as $car)
	    <div class="row car-listing">
	        <div class="large-4 columns small-3">
	          <img src="/uploads/{{$car->image}}" />
	        </div>
	        <div class="large-8 columns">
	          <h2 class="car-title">{{$car->car_type}}</h2>
	          <p>Color: {{$car->color}}</p>
	          @if ($car->price)
	          <p>{{$car->price}}</p>
	          @endif
	          @if ($car->description)
	          <p>{{$car->description}}</p>
	          @endif
	          <div class="row" id="edit-entry-btns">
	          	<div class="large-4 columns">
	          		<a class="button secondary small" href="/cars/{{$car->id}}/edit" title="Add listing">Edit</a>
	          	</div>
	          	<div class="large-4 columns">
	          {{ Form::open(array('url' => 'cars/' . $car->id, 'class' => 'pull-right')) }}
					{{ Form::hidden('_method', 'DELETE') }}
					{{ Form::submit('Delete this listing', array('class' => 'button alert tiny')) }}
				{{ Form::close() }}
	          	</div>
	          </div>


	        </div>
	      </div>

	@endforeach

	@if (Auth::check())
		<div class="row" id="edit-entry-btns">
		    <div class="large-4 columns small-centered">
		    	<a class="button small secondary" href="/cars/create" title="Add listing">Add a new listing</a>
		    </div>
		</div>
	@endif

@stop