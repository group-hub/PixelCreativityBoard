<?php

namespace App\Http\Controllers;

use App\GridItem;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

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
            $gridItems[] = GridItem::where('y', $x)->get();
        }
        return view('home')->with(['gridItems' => $gridItems]);
    }

}
