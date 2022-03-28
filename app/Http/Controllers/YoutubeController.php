<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;

class YouTubeController extends Controller
{
    public function index()
    {
        if (session('search_query')) {
            $videoLists = $this->_videoLists(session('search_query'));
        } else {
            $videoLists = $this->_videoLists('laravel chat');
        }
        return view('frontend.videos.index', compact('videoLists'));
    }

    public function watch($id)
    {
        $singleVideo = $this->_singleVideo($id);
        if (session('search_query')) {
            $videoLists = $this->_videoLists(session('search_query'));
        } else {
            $videoLists = $this->_videoLists('laravel chat');
        }
        return view('watch', compact('singleVideo', 'videoLists'));
    }

    protected function _videoLists($keywords)
    {
        $part = 'snippet';
        $channel_ID = "UC7sXT1HaXxJEcEqxd3KFY-w";
        $apiKey = config('services.youtube.api_key');
        $maxResults = 15;
        $youTubeEndPoint = config('services.youtube.search_endpoint');
        $type = 'video';

        $url = "$youTubeEndPoint?order=date&part=$part&channelId=$channel_ID&maxResults=$maxResults&type=$type&key=$apiKey";
        $response = Http::get($url);
        $results = json_decode($response);

        File::put(storage_path() . '/app/public/results.json', $response->body());
        return $results;
    }

    protected function _singleVideo($id)
    {
        $apiKey = config('services.youtube.api_key');
        $part = 'snippet';
        $url = "https://www.googleapis.com/youtube/v3/videos?part=$part&id=$id&key=$apiKey";
        $response = Http::get($url);
        $results = json_decode($response);

        File::put(storage_path() . '/app/public/single.json', $response->body());
        return $results;
    }
}