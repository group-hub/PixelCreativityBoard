<?php

namespace PixelCreativityBoard;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class GridItem extends Model
{
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'grid';

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
	 * Get all the grid items
	 *
	 * @return array
	 */
	public static function getGridItems()
	{
		$gridItems = [];
		for ($x=0; $x<env('GRID_MAX_Y', 60); $x++) {
			$gridRow = GridItem::where('y', $x)->get();

			foreach ($gridRow as $gridItem) {
				if ($gridItem->expires_at != null) {
					if (Carbon::now()->timestamp > $gridItem->expires_at->timestamp) {
						$gridItem->expires_at = null;
						$gridItem->color = null;
						$gridItem->save();
					}
				}
			}

			$gridItems[] = $gridRow;
		}

		return $gridItems;
	}
}
