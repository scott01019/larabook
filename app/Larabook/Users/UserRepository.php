<?php namespace Larabook\Users;

class UserRepository {
	
	public function save(User $user)
	{
		return $user->save();
	}

	/**
	 * Get a paginated list of all users.
	 * @param  integer $howMany [description]
	 * @return [type]           [description]
	 */
	public function getPaginated($howMany = 25)
	{
		return User::orderBy('username', 'asc')->simplePaginate($howMany);
	}

	/**
	 * Fetch a user by their username.
	 * @param  [type] $username [description]
	 * @return [type]           [description]
	 */
	public function findByUsername($username)
	{
		return User::with('statuses')->whereUsername($username)->first();
		/*return User::with(['statuses' => function($query)
		{
			$query->latest();
		}])->whereUsername($username)->first();
		*/
	}

	/**
	 * Finds a user by id.
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function findById($id)
	{
		return User::findOrFail($id);
	}

	/**
	 * Follow a larabook user.
	 * @param  [type] $userIdtoFollow [description]
	 * @param  User   $user           [description]
	 * @return [type]                 [description]
	 */
	public function follow($userIdtoFollow, User $user)
	{
		return $user->followedUsers()->attach($userIdtoFollow);
	}

	/**
	 * Unfollow a larabook user.
	 * @param  [type] $userIdToUnfollow [description]
	 * @param  User   $user             [description]
	 * @return mixed                   [description]
	 */
	public function unfollow($userIdToUnfollow, User $user)
	{
		return $user->followedUsers()->detach($userIdToUnfollow);
	}
}