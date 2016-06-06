<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Validator;
use Session;
use Auth;
use Cache;

class SoundcloudController extends Controller
{
	private $clientID = "20c47993de6f3540cfce0197c2ac7efb";

    public function discover()
    {
    	Session::put('tracks', NULL);
    	Session::put('counter', 0);
    	Session::put('trackCount', 0);

    	return view('discover', [
    		'tracks' => Session::get('tracks'),
    		'counter' => Session::get('counter'),
    		'trackCount' => Session::get('trackCount')
    	]);
    }

    public function update()
    {
    	return view('discover', [
    		'tracks' => Session::get('tracks'),
    		'counter' => Session::get('counter'),
    		'trackCount' => Session::get('trackCount')
    	]);
    }

    public function getFilteredTracks(Request $request)
	{
		$validation = Validator::make($request->all(), [
			'artist' => 'regex:/^[a-z\d\-_\s]+$/i',
		]);

		if ($validation->fails())
		{
			return redirect('/discover')->withErrors($validation);
		}

		$genre = $request->input('genre');
		$artist = $request->input('artist');

		$clientID = $this->clientID;
		$url = "http://api.soundcloud.com/tracks/?";

		if ($artist)
		{
			$a = str_replace(' ', '%20', $artist);
			$url = $url . "q=$a" . "&";
		}
		if ($genre)
		{
			$url = $url . "genres=$genre" . "&";
		}

		$url = $url . "limit=200&client_id=$clientID";

		// check if filter parameters are in cache
		if (Cache::get($url))
		{
			//return data from cache
			$jsonString = Cache::get($url);
		}
		else
		{
			//request data from SoundCloud
			//put the data in the cache and return that data
			$jsonString = file_get_contents($url);
			Cache::put($url, $jsonString, 60);
		}

		$tracks = json_decode($jsonString);
		shuffle($tracks);
		Session::put('tracks', $tracks);
		Session::put('trackCount', count($tracks));
		Session::put('counter', 0);

		return view('discover', [
			'tracks' => $tracks,
			'counter' => Session::get('counter'),
			'trackCount' => Session::get('trackCount')
		]);
	}

	public function nextTrack()
	{
		$count = Session::get('counter');
		if ($count < Session::get('trackCount'))
		{
			$count = $count + 1;
			Session::put('counter', $count);
		}

		return redirect("/discover_next_song");
	}

	public function showTrack($id)
	{
		$url = "http://api.soundcloud.com/tracks/?ids=$id&client_id=$this->clientID";

		if (Cache::get($url))
		{
			$jsonString = Cache::get($url);
		}
		else
		{
			$jsonString = file_get_contents($url);
			Cache::put($url, $jsonString, 60);
		}
		
		$track = json_decode($jsonString);

		return view('song', [
			'track' => $track[0]
		]);
	}
}
