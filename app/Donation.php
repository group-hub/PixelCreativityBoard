<?php

namespace PixelCreativityBoard;

use Illuminate\Database\Eloquent\Model;
use Symfony\Component\Routing\Exception\MethodNotAllowedException;

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
	 * Returns the donation with JustGiving id
	 *
	 * @param $donationId
	 */
	public static function donationWithJustGivingId($donationId)
	{
		return Donation::where('just_giving_id', $donationId)->firstOrFail();
	}

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
