<?php

namespace PixelCreativityBoard;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ServerException;
use GuzzleHttp\Psr7\Request;

class JustGiving
{

	/**
	 * Stores the short URL of the JustGiving page being donated to
	 *
	 * @var string
	 */
	public static $shortUrl;

	/**
	 * Stores the full url of the site
	 *
	 * @var string
	 */
	protected static $siteUrl;

	/**
	 * Stores the Just Giving API url
	 *
	 * @var string
	 */
	protected static $apiUrl;

	/**
	 * Initialise all the static variables
	 */
	public static function init()
	{
		self::$shortUrl = env('JUST_GIVING_SHORT_URL');
		self::$siteUrl = env('SITE_URL');
		self::$apiUrl = env('JUST_GIVING_API');
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

	/**
	 * Get the donation details from JustGiving
	 *
	 * @param $donationId
	 *
	 * @return mixed|null|\Psr\Http\Message\ResponseInterface
	 */
	public static function getDonationDetails($donationId)
	{
		//Generate the API url to get the donation details
		$url = self::$apiUrl.'/donation/'.$donationId;

		//Create the Guzzle client
		$client = new Client([
			'timeout' => 4.0
		]);
		$request = new Request('GET', $url, ['Accept' => 'application/json']);


		$response = null;
		try {
			$response = $client->send($request);
		} catch (ServerException $ex) {
		} catch (ClientException $ex) { }

		return json_decode($response->getBody());
	}

}
