<?php

use Larabook\Users\FollowUserCommand;
use Larabook\Users\UnfollowUserCommand;

class FollowsController extends \BaseController {



	/**
	 * Follow a user.
	 *
	 * @return Response
	 */
	public function store()
	{
		// id of the user to follow
		// id of the auth user
		if (Auth::check())
		{
			$input = array_add(Input::get(), 'userId', Auth::id());
			$this->execute(FollowUserCommand::class, $input);

			Flash::success('You are now following this user.');
		}
		else
		{
			Flash::error("You need to log in to follow a user.");
		}
		return Redirect::back();
	}



	/**
	 * Unfollow a user.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($userIdToUnfollow)
	{
		$input = array_add(Input::get(), 'userId', Auth::id());
		$this->execute(UnfollowUserCommand::class, $input);

		Flash::success('You have no unfollowed this user.');

		return Redirect::back();
	}


}
