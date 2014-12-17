<?php namespace Larabook\Users;

trait FollowableTrait {
	/**
	 * Get the list of users that the current user follows.
	 * @return mixed
	 */
	public function followedUsers()
	{
		return $this->belongsToMany(User::class, 'follows', 'follower_id', 'followed_id')->withTimeStamps();
	}

	/**
	 * Get the list of users who follow the current user.
	 */
	public function followers()
	{
		return $this->belongsToMany(User::class, 'follows', 'followed_id', 'follower_id')->withTimeStamps();
	}

	/**
	 * Determine if current user follows another user.
	 * @param  User    $otherUser [description]
	 * @return boolean            [description]
	 */
	public function isFollowedBy(User $otherUser)
	{
		$idsWhoOtherUserFollows = $otherUser->followedUsers()->lists('followed_id');

		return in_array($this->id, $idsWhoOtherUserFollows);
	}
}