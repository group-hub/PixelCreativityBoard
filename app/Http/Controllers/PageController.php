<?php

namespace App\Http\Controllers;

use App\GridItem;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

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
        return view('home')->with(['gridItems' => $gridItems]);
    }

}
