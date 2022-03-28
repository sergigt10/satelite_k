<?php

    use Illuminate\Support\Facades\Http;

    function videoLists($maxResults)
    {
        $part = 'snippet';
        $channel_ID = "UC7sXT1HaXxJEcEqxd3KFY-w";
        $apiKey = config('services.youtube.api_key');
        $youTubeEndPoint = config('services.youtube.search_endpoint');
        $type = 'video';

        $url = "$youTubeEndPoint?order=date&part=$part&channelId=$channel_ID&maxResults=$maxResults&type=$type&key=$apiKey";
        $response = Http::get($url);
        $results = json_decode($response);

        return $results;
    }

    // function singleVideo($id)
    // {
    //     $apiKey = config('services.youtube.api_key');
    //     $part = 'snippet';
    //     $url = "https://www.googleapis.com/youtube/v3/videos?part=$part&id=$id&key=$apiKey";
    //     $response = Http::get($url);
    //     $results = json_decode($response);

    //     return $results;
    // }
