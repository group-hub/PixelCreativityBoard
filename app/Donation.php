<?php

namespace PixelCreativityBoard;

use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'donations';

	protected $dates = [
		'date'
	];

	/**
	 * Returns the maximum number of pixels
	 *
	 * @return float
	 */
	public function getMaxNumberOfPixels()
	{
		return $this->amount / env('PIXEL_VALUE');
	}
}
