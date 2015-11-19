<?php

namespace PixelCreativityBoard;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Pixel extends Model
{
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'pixels';

	/**
	 * Remove eloquent timestamps.
	 *
	 * @var bool
	 */
	public $timestamps = false;

	protected $dates = [
		'expires_at'
	];

	/**
	 * Get all the pixels
	 *
	 * @return array
	 */
	public static function getPixels()
	{
		$pixels = [];
		for ($x=0; $x<env('GRID_MAX_Y', 60); $x++) {
			$gridRow = Pixel::where('y', $x)->get();

			foreach ($gridRow as $pixel) {
				if ($pixel->expires_at != null) {
					if (Carbon::now()->timestamp > $pixel->expires_at->timestamp) {
						$pixel->expires_at = null;
						$pixel->color = null;
						$pixel->name = null;
						$pixel->save();
					}
				}
			}

			$pixels[] = $gridRow;
		}

		return $pixels;
	}
}
