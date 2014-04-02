<?php

class CarController extends \BaseController {

	
	// CSRF protection on posts
	public function __construct()
    {
        $this->beforeFilter('csrf', ['on' => 'post']);
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		// get all car listings
		// Get car database and pass it to the view
		$cars = Car::all();
		return View::make('cars.index')
			->with('cars', $cars);

	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('cars.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//

		// validate the info, create rules for the inputs
		$rules = array(
			'car_type'    => 'required|min:5', // make sure there is something in the title field
			'color' => 'required|alphaNum|min:3' // make sure there is something in the color field
		);

		// run the validation rules on the inputs from the form
		$validator = Validator::make(Input::all(), $rules);

		// if the validator fails, redirect back to the form
		if ($validator->fails()) {
			return Redirect::to('cars/create')
				->withErrors($validator) // send back all errors to the login form
				->withInput(); // send back the input (not the password) so that we can repopulate the form
		} else {
			$car = new Car;
			$car->car_type = Input::get('car_type');
			$car->color = Input::get('color');
			$car->price = Input::get('price');
			$car->description = Input::get('description');
			if (Input::hasFile('image'))
			{
			    $file = Input::file('image');
			    $name = Input::file('image')->getClientOriginalName();
			    $fileName = uniqid('car_')."_".$name;
			    $fileDestination = public_path().'/uploads';
			    Input::file('image')->move($fileDestination, $fileName);
			    $car->image = $fileName;
			}
			$car->save();
		}

		// create a success message
		Session::flash('message', 'Successfully updated car list!');
		// Send them back to the update page
		return Redirect::to('cars');

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$cars = Car::all();
		return View::make('cars.index')
			->with('cars', $cars);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$car = Car::find($id);

		// show the edit form and pass the nerd
		return View::make('cars.edit')
			->with('car', $car);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		
		// validate the info, create rules for the inputs
		$rules = array(
			'car_type'    => 'required|min:5', // make sure there is something in the title field
			'color' => 'required|alphaNum|min:3' // make sure there is something in the color field
		);

		// run the validation rules on the inputs from the form
		$validator = Validator::make(Input::all(), $rules);

		// if the validator fails, redirect back to the form
		if ($validator->fails()) {
			return Redirect::to('cars/create')
				->withErrors($validator) // send back all errors to the login form
				->withInput(); // send back the input (not the password) so that we can repopulate the form
		} else {
			$car = Car::find($id);
			$car->car_type = Input::get('car_type');
			$car->color = Input::get('color');
			$car->price = Input::get('price');
			$car->description = Input::get('description');
			if (Input::hasFile('image'))
			{
			    $file = Input::file('image');
			    $name = Input::file('image')->getClientOriginalName();
			    $fileName = uniqid('car_')."_".$name;
			    $fileDestination = public_path().'/uploads';
			    Input::file('image')->move($fileDestination, $fileName);
			    $car->image = $fileName;
			}
			$car->save();
		}

		// create a success message
		Session::flash('message', 'Successfully updated car listing!');
		// Send them back to the update page
		return Redirect::to('cars');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$car = Car::find($id);
		$car->delete();

		// redirect
		Session::flash('message', 'Successfully deleted the listing!');
		return Redirect::to('cars');
	}

}