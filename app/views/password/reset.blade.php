@extends('utility')

@section('content')
<h1>Reset Your Password</h1>
@if($errors->has())

		We encountered the following errors:

		<ul>
		    @foreach($errors->all() as $message)

		    <li>{{ $message }}</li>

		    @endforeach
		</ul>

	@endif
<form action="{{ action('RemindersController@postReset') }}" method="POST">
    <input type="hidden" name="token" value="{{ $token }}">
    <input type="email" name="email">
    <label>New Password
    	<input type="password" name="password">
    </label>
    <label>New Password Again
    	<input type="password" name="password_confirmation">
    </label>
    <input type="submit" value="Reset Password" class="button small">
</form>
@stop