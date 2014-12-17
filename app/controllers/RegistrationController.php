<?php

use Larabook\Registration\RegisterUserCommand;
use Larabook\Form\RegistrationForm;

class RegistrationController extends BaseController {

	private $registrationForm;

	function __construct(RegistrationForm $registrationForm)
	{
		$this->registrationForm = $registrationForm;

		$this->beforeFilter('guests');
	}

	public function create()
	{
		return View::make('registration.create');
	}

	public function store()
	{
		$this->registrationForm->validate(Input::all());

		$user = $this->execute(RegisterUserCommand::class);

		Auth::login($user);

		Flash::overlay('Glad to have you as a new Larabook memeber!');

		return Redirect::home();
	}
}