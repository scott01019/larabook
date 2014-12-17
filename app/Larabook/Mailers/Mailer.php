<?php namespace Larabook\Mailers;

use Illuminate\Mail\Mailer as Mail;

abstract class Mailer {

	private $mail;

	function __construct(Mail $mail)
	{
		$this->mail = $mail;
	}

	/**
	 * [sendTo description]
	 * @param  [type] $user [description]
	 * @param  [type] $view [description]
	 * @param  [type] $data [description]
	 * @return [type]       [description]
	 */
	public function sendTo($user, $subject, $view, $data = [])
	{
		$this->mail->queue($view, $data, function($message) use($user, $subject)
		{
			$message->to($user->email)->subject($subject);
		});
	}
}