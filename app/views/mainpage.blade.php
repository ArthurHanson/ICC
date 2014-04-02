@extends('layout')

@section('content')
	<div class="row">
      <div class="large-12 columns">
        <h1 class="section-title">Available Cars</h1>
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
	        </div>
	      </div>

	@endforeach

	@if (Auth::check())
		<div class="row">
		    <div class="large-3 columns small-centered">
		    	<a href="/cars" title="Add or edit listings">Add / Edit listings</a>
		    </div>
		</div>
	@endif

@stop