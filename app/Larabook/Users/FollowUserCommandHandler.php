<?php namespace Larabook\Users;

use Larabook\Users\UserRepository;
use Laracasts\Commander\CommandHandler;

class FollowUserCommandHandler implements CommandHandler {

	protected $userRepo;

	function __construct(UserRepository $userRepo)
	{
		$this->userRepo = $userRepo;
	}

	/**
	 * Handle the command.
	 * @param  [type] $command [description]
	 * @return [type] $user    [description]
	 */
	public function handle($command)
	{
		$user = $this->userRepo->findById($command->userId);

		$this->userRepo->follow($command->userIdToFollow, $user);

		return $user;
	}
}