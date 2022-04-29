<?php

namespace App\Http\Controllers;

use Artesaos\SEOTools\Facades\SEOTools;

class YoutubeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        SEOTools::setTitle('Discográfica Barcelona, Servicios musicales Barcelona');
        SEOTools::opengraph()->setUrl('https://www.satelitek.com/videos');

        $videoLists = videoLists(12);
        return view('frontend.videos.index', compact('videoLists'));
    }

    // public function watch($id)
    // {
    //     $singleVideo = singleVideo($id);
    //     if (session('search_query')) {
    //         $videoLists = videoLists(session('search_query'));
    //     } else {
    //         $videoLists = videoLists('laravel chat');
    //     }
    //     return view('watch', compact('singleVideo', 'videoLists'));
    // }
}