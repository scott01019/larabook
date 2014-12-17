<?php namespace Larabook\Statuses;

use Eloquent;

class Comment extends Eloquent {

	protected $fillable = ['user_id', 'status_id', 'body'];

	/**
	 * 
	 * @return mixed [description]
	 */
	public function owner()
	{
		return $this->belongsTo('Larabook\Users\User', 'user_id');
	}

	/**
	 * @param  [type] $body     [description]
	 * @param  [type] $statusId [description]
	 * @return [type]           [description]
	 */
	public static function leave($body, $statusId)
	{
		return new static([
			'body' => $body,
			'status_id' => $statusId
		]);
	}
}