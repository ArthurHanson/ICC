<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/
	public function __construct()
    {
        $this->beforeFilter('csrf', ['on' => 'post']);
    }

	// Show login form
	public function showLogin()
	{
		// show the form
		return View::make('login');
	}

	// process contact form
	public function doContact()
	{

		$data = Input::all();

		//Validation rules
		$rules = array (
			'name' => 'required',
			'email' => 'required|email',
			'message' => 'required|min:5'
		);

		//Validate data
		$validator = Validator::make (Input::all(), $rules);
		if ($validator->fails()) {
			return Redirect::to('/')
				->withErrors($validator) // send back all errors to the login form
				->withInput(); // send back the input (not the password) so that we can repopulate the form
		} else {
			//Send email using Laravel send function
			Mail::send('emails.contactform', $data, function($message) use ($data)
			{
				//email 'From' field: Get users email add and name
				$message->from($data['email'] , $data['name']);
				//email 'To' field: cahnge this to emails that you want to be notified. 
				$message->to('arthurhanson@gmail.com', 'Art Hanson')->cc('georgebartz@gmail.com')->subject('Inside Car Connection Contact Form');
			});
			Session::flash('message', 'Thank you for your message');
			return Redirect::to('/');

		}
	}

	// Process Login form
	public function doLogin()
	{
		
		// validate the info, create rules for the inputs
		$rules = array(
			'email'    => 'required|email', // make sure the email is an actual email
			'password' => 'required|alphaNum|min:3' // password can only be alphanumeric and has to be greater than 3 characters
		);

		// run the validation rules on the inputs from the form
		$validator = Validator::make(Input::all(), $rules);

		// if the validator fails, redirect back to the form
		if ($validator->fails()) {
			return Redirect::to('login')
				->withErrors($validator) // send back all errors to the login form
				->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
		} else {

			// create our user data for the authentication
			$userdata = array(
				'email' 	=> Input::get('email'),
				'password' 	=> Input::get('password')
			);

			// attempt to do the login
			if (Auth::attempt($userdata)) {

				// validation successful!
				// redirect them to the secure section or whatever
				 return Redirect::intended('cars');
				// for now we'll just echo success (even though echoing in a controller is bad)
				//echo 'SUCCESS!';

			} else {	 	

				// validation not successful, send back to form	
				return Redirect::to('login');

			}

		}


	}

	// logout
	public function doLogout()
	{
		Auth::logout(); // log the user out of our application
		return Redirect::to('login'); // redirect the user to the login screen
	}

	// Home Page
	public function mainPage()
	{	
		// Get car database and pass it to the view
		$cars = Car::all();
		return View::make('mainpage')->with('cars', $cars);
	}

}