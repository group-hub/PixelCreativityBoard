<?php

namespace PixelCreativityBoard;

use Illuminate\Database\Eloquent\Model;

class PayingPixel extends Model
{
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'paying_pixels';

	/**
	 * Remove eloquent timestamps.
	 *
	 * @var bool
	 */
	public $timestamps = false;

}
