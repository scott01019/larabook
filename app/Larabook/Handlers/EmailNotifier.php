<?php namespace Larabook\Handlers;

use Larabook\Users\User;
use Larabook\Mailers\UserMailer;
use Larabook\Registration\Events\UserHasRegistered;
use Laracasts\Commander\Events\EventListener;

class EmailNotifier extends EventListener {

	protected $mailer;

	function __construct(UserMailer $mailer)
	{
		$this->mailer = $mailer;
	}

	public function whenUserHasRegistered(UserHasRegistered $event)
	{
		$this->mailer->sendWelcomeMessageTo($event->user);
	}
}