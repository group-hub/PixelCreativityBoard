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

			$pixels[] = $gridRow;
		}

		return $pixels;
	}
}
