<?php

namespace PixelCreativityBoard;

use Illuminate\Database\Eloquent\Model;

class PixelDonation extends Model
{
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'pixel_donations';

	/**
	 * Remove eloquent timestamps.
	 *
	 * @var bool
	 */
	public $timestamps = false;

}
