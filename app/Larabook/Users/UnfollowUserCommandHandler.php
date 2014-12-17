<?php namespace Larabook\Users;

use Laracasts\Commander\CommandHandler;
use Larabook\Users\UserRepository;

class UnfollowUserCommandHandler implements CommandHandler {

	protected $userRepo;

	function __construct(UserRepository $userRepo)
	{
		$this->userRepo = $userRepo;
	}

    /**
     * 
     *
     * @param object $command
     * @return void
     */
    public function handle($command)
    {
    	$user = $this->userRepo->findById($command->userId);

    	$this->userRepo->unfollow($command->userIdToUnfollow, $user);
    }

}