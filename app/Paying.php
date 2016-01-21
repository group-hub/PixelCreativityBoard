<?php

namespace PixelCreativityBoard;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Paying extends Model
{
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'paying';

	/**
	 * Get all the pixels the user was buying
	 *
	 * @return mixed
	 */
	public function getPixels()
	{
		return PayingPixel::where('paying_id', $this->id)->get();
	}
}
