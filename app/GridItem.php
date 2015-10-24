<?php

namespace PixelCreativityBoard;

use Illuminate\Database\Eloquent\Model;

class GridItem extends Model
{
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'grid';

	protected $dates = [
		'expires_at'
	];
}
