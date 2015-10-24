<?php

namespace PixelCreativityBoard;

class JustGiving
{

	/**
	 * Stores the short URL of the JustGiving page being donated to
	 *
	 * @var string
	 */
	protected static $shortUrl;

	/**
	 * Stores the full url of the site
	 *
	 * @var string
	 */
	protected static $siteUrl;

	/**
	 * Initialise all the static variables
	 */
	public static function init()
	{
		self::$shortUrl = env('JUST_GIVING_SHORT_URL');
		self::$siteUrl = env('SITE_URL');
	}

	/**
	 * Get the donation url for JustGiving
	 *
	 * @return string
	 */
	public static function getDonationUrl()
	{
		$donateUrl = 'http://www.justgiving.com/'.self::$shortUrl.'/4w350m3/donate/?exitUrl=';
		$exitUrl = self::$siteUrl.'/donated?donationId=JUSTGIVING-DONATION-ID';
		//Encode the exit URL
		$exitUrl = urlencode($exitUrl);
		//Add the exit Url
		$donateUrl = $donateUrl.$exitUrl;
		return $donateUrl;
	}


}
