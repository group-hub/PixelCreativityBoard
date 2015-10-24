<?php

namespace PixelCreativityBoard\Http\Controllers;

use PixelCreativityBoard\GridItem;
use Illuminate\Http\Request;
use PixelCreativityBoard\Http\Requests;
use PixelCreativityBoard\Http\Controllers\Controller;
use Carbon\Carbon;
use PixelCreativityBoard\JustGiving;

class PageController extends Controller
{
    /**
     * Display the homepage
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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
        return view('home')->with(['gridItems' => $gridItems, 'justGivingUrl' => JustGiving::getDonationUrl()]);
    }

}
