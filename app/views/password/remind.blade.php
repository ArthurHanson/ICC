@extends('utility')

@section('content')

<h1>Password Reminder</h1>
@if($errors->has())

		We encountered the following errors:

		<ul>
		    @foreach($errors->all() as $message)

		    <li>{{ $message }}</li>

		    @endforeach
		</ul>

	@endif
<form action="{{ action('RemindersController@postRemind') }}" method="POST">
    <input type="email" name="email" placeholder="email address">
    <input type="submit" value="Send Reminder" class="button small">
</form>
@stop