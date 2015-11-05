<?php

namespace PixelCreativityBoard;

use Illuminate\Database\Eloquent\Model;

class Fundraiser extends Model
{
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'fundraisers';

	/**
	 * Remove eloquent timestamps.
	 *
	 * @var bool
	 */
	public $timestamps = false;

	/**
	 * Get all the fundraisers
	 *
	 * @return \Illuminate\Database\Eloquent\Collection|static[]
	 */
	public static function getAllFundraisers()
	{
		return Fundraiser::all();
	}
}
