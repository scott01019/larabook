<?php namespace Larabook\Registration;

class RegisterUserCommand {
	
	public $username;

	public $email;

	public $password;

	function __construct($username, $password, $email)
	{
		$this->email = $email;
		$this->password = $password;
		$this->username = $username;
	}

}