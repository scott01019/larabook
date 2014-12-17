<?php namespace Larabook\Statuses;

use Laracasts\Commander\CommandHandler;
use Larabook\Statuses\StatusRepository;

class LeaveCommentOnStatusCommandHandler implements CommandHandler {

	private $statusRepo;

	function __construct(StatusRepository $statusRepository)
	{
		$this->statusRepo = $statusRepository;
	}

    /**
     * Handle the command.
     *
     * @param object $command
     * @return void
     */
    public function handle($command)
    {
    	$comment = $this->statusRepo->leaveComment($command->user_id, $command->status_id, $command->body);
    
    	return $comment;
    }

}