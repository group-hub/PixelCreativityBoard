<?php

namespace PixelCreativityBoard\Http\Controllers;

use PixelCreativityBoard\Donation;
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
     * @param Request $request
     *
     * @return $this
     */
    public function index(Request $request)
    {
        $gridItems = GridItem::getGridItems();
        return view('home')->with(['gridItems' => $gridItems, 'justGivingUrl' => JustGiving::getDonationUrl()]);
    }

    /**
     * Called after a donation has been made
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function donated(Request $request)
    {
        if ($request->has('donationId')) {
            $donationId = $request->get('donationId');

            //Get the donation details from JustGiving
            $donationDetails = JustGiving::getDonationDetails($donationId);

            //If the donation is found and valid
            if ($donationDetails != null && $donationDetails->pageShortName != JustGiving::$shortUrl) {

                $donation = null;

                //Check if the donation has  already been saved to the database
                if (Donation::where('just_giving_id', $donationDetails->id)->exists()) {
                    $donation = Donation::where('just_giving_id', $donationDetails->id)->first();
                } else {
                    $donation = new Donation();
                    $donation->just_giving_id =$donationDetails->id;
                    $donation->amount = $donationDetails->amount;
                    $donation->name = $donationDetails->donorDisplayName;
                    $donation->save();
                }

                //If the donation is still valid
                if ($donation->selected == false) {
                    $gridItems = GridItem::getGridItems();
                    $maxPixels = $donation->getMaxNumberOfPixels();
                    return view('select')->with(['gridItems' => $gridItems, 'maxPixels' => $maxPixels]);
                }
            }
        }

        return redirect('/');
    }

}
