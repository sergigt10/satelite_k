<?php

namespace App\Http\Controllers;

use App\Models\Videoclip;

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

        $videoclips = Videoclip::latest('id')->paginate(15, ['*'], 'pagina');
        return view('frontend.videos.index', compact('videoclips'));
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