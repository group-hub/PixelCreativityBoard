<?php

namespace PixelCreativityBoard\Http\Controllers;

use Illuminate\Support\Facades\Response;
use PixelCreativityBoard\Donation;
use PixelCreativityBoard\Pixel;
use Illuminate\Http\Request;
use PixelCreativityBoard\Http\Requests;
use PixelCreativityBoard\Http\Controllers\Controller;
use Carbon\Carbon;
use PixelCreativityBoard\JustGiving;
use Illuminate\Support\Facades\Log;
use PixelCreativityBoard\PixelDonation;
use Symfony\Component\HttpKernel\Exception\ConflictHttpException;
use PixelCreativityBoard\Paying;
use PixelCreativityBoard\PayingPixel;
use Imagick;

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
        $pixels = Pixel::getPixels();

        $percentageRaised = Donation::getPercentageRaised();

        return view('home')->with([
            'pixels' => $pixels,
            'percentageRaised' => $percentageRaised
        ]);
    }

    /**
     * The user selected their pixels
     *
     * @param Request $request
     * @return Response
     */
    public function selected(Request $request)
    {
        $paying = new Paying();
        $paying->save();

        //Loop through all the selected pixels
        foreach($request->get('pixels') as $pixel) {

            $savedPixel = Pixel::where('x', $pixel['x'])->where('y', $pixel['y'])->first();

            //Save the paying pixel donation
            $pixelDonation = new PayingPixel();
            $pixelDonation->pixel_id = $savedPixel->id;
            $pixelDonation->paying_id = $paying->id;
            $pixelDonation->color = $pixel['color'];
            $pixelDonation->save();
        }

        $amount = number_format(count($request->get('pixels'))/4, 2);

        $donationUrl = JustGiving::getDonationUrl($paying->id, $amount);

        return response($donationUrl, 200);
    }

    /**
     * Called after a selection has been made
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function donated(Request $request)
    {
        if ($request->has('donationId')) {
            $donationId = $request->get('donationId');

            $payingId = $request->get('payingId');

            //Get the donation details from JustGiving
            $donationDetails = JustGiving::getDonationDetails($donationId);

            $paying = Paying::findOrFail($payingId);

            $pixelsSelected = $paying->getPixels();

            //If the donation is found and valid
            if ($donationDetails != null && $donationDetails->pageShortName == JustGiving::$shortUrl && count($pixelsSelected)/2 <= $donationDetails->amount) {

                if (!Donation::where('just_giving_id', $donationId)->exists()) {
                    $donation = new Donation();
                    $donation->just_giving_id =$donationDetails->id;
                    $donation->amount = $donationDetails->amount;
                    $donation->name = $donationDetails->donorDisplayName;
                    $donation->save();

                    foreach ($pixelsSelected as $payingPixel) {
                        $pixel = Pixel::findOrFail($payingPixel->pixel_id);
                        $pixel->color = $payingPixel->color;
                        $pixel->name = $donation->name;
                        $pixel->save();

                        $pixelDonation = new PixelDonation();
                        $pixelDonation->pixel_id = $payingPixel->pixel_id;
                        $pixelDonation->donation_id = $donation->id;
                        $pixelDonation->color = $payingPixel->color;
                        $pixelDonation->grid_num = env('GRID_NUM');
                        $pixelDonation->save();
                    }
                }

            }
        }

        //Clear varnish
        if (env('APP_ENV') == 'production') {
            system('varnishadm -T 127.0.0.1:6082 -S /etc/varnish/secret ban "req.url == /"');
        }

        $pixels = Pixel::getPixels();

        return view('thank-you')->with([
            'pixels' => $pixels
        ]);
    }

    /**
     * Generate the grid as an image
     */
    public function image() {
        $pixels = Pixel::getPixels();

        $svg = '<?xml version="1.0" encoding="UTF-8" standalone="no"?><svg xmlns="http://www.w3.org/2000/svg" width="700" height="800">';
        foreach ($pixels as $gridRow) {
            foreach ($gridRow as $pixel) {
                $svg .= '<rect x="' . 10 * $pixel->x . '" y="' . 10 * $pixel->y . '" width="10" height="10" style="fill:';
                $svg .= ($pixel->color != null) ? $pixel->color : "#333";
                $svg .= ';stroke:#555;stroke-width:1;stroke-opacity:1.0;" />';
                $svg .= $pixel->x . "x";
            }
        }
        $svg .= '</svg>';

        $im = new Imagick();
        $im->readImageBlob($svg);

        $im->setImageFormat("png32");

        header('Content-type: image/png');

        echo $im;

    }

}
