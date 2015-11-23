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
	 * Returns the percentage of the total amount raised
	 */
	public static function getPercentageRaised()
	{
		$totalAmountRaised = 0;
		$allDonations = Donation::all();
		foreach ($allDonations as $donation) {
			$totalAmountRaised += $donation->amount;
		}

		return ($totalAmountRaised / env('TOTAL_AMOUNT', 5000)) * 100;
	}

	/**
	 * Returns the maximum number of pixels
	 *
	 * @return float
	 */
	public function getMaxNumberOfPixels()
	{
		return ceil($this->amount / env('PIXEL_VALUE'));
	}
}
