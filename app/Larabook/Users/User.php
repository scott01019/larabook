<?php namespace Larabook\Users;

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Eloquent, Hash;
use Laracasts\Commander\Events\EventGenerator;
use Larabook\Registration\Events\UserHasRegistered;
use Larabook\Statuses\Status;
use Laracasts\Presenter\PresentableTrait;
use Larabook\Users\FollowableTrait;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait, EventGenerator, PresentableTrait, FollowableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * Path to the presenter for a user.
	 * 
	 * @var string
	 */
	protected $presenter = 'Larabook\Users\UserPresenter';

	protected $fillable = [ 'username', 'password', 'email' ];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');


	/**
	 * Password must always be hashed.
	 * @param $password
	 */
	public function setPasswordAttribute($password) 
	{
		$this->attributes['password'] = Hash::make($password);
	}

	/**
	 * A user has many statuses.
	 * @return mixed
	 */
	public function statuses()
	{
		return $this->hasMany('Larabook\Statuses\Status')->latest();
	}

	/**
	 * Register a new user.
	 * @param  $username 
	 * @param  $email   
	 * @param  $password 
	 * @return User
	 */
	public static function register($username, $email, $password) 
	{
		$user = new static(compact('username', 'email', 'password'));

		$user->raise(new UserHasRegistered($user));

		return $user;
	}

	/**
	 * Deteremine if the current user is the given user.
	 * @param  User    $user [description]
	 * @return boolean       [description]
	 */
	public function is(User $user = null)
	{
		if (! isset($user)) return false;
		return $this->username == $user->username;
	}

	/**
	 * 
	 * @return mixed [description]
	 */
	public function comments()
	{
		return $this->hasMany('Larabook\Statuses\Comment');
	}
}