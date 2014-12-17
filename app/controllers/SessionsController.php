<?php

use Larabook\Form\SignInForm;

class SessionsController extends \BaseController {
	
	private $signInForm;

	function __construct(SignInForm $signInForm)
	{
		$this->signInForm = $signInForm;
		$this->beforeFilter('guest', ['except' => 'destroy']);
	}

	public function create() 
	{
		return View::make('sessions.create'); 
	}

	public function store()
	{
		//	fetch form input
		// 	validate the form
		//	if invalid then go back
		$formData = Input::only('email', 'password');
		$this->signInForm->validate($formData);

		//	if is valid then try to sign in
		if ( ! Auth::attempt($formData))
		{
			Flash::message('We were unable to sign you in. Please check your credentials and try again!');

			return Redirect::back()->withInput();
		}


		//	redirect to statuses
		Flash::message('Welcome back!');
		return Redirect::intended('statuses');
	}

	public function destroy()
	{
		Auth::logout();

		Flash::message('You have now been logged out.');
		return Redirect::home();
	}
}