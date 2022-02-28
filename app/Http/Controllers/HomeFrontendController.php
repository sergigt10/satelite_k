<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Artista;
use App\Models\Disc;

class HomeFrontendController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $slider1 = Slider::all()->get(0);
        $slider2 = Slider::all()->get(1);
        $slider3 = Slider::all()->get(2);
        $artistes = Artista::latest('id')->take(4)->get();
        $discs = Disc::latest('data_publicacio')->take(5)->get();
        return view('frontend.inici.index', compact('slider1', 'slider2', 'slider3', 'artistes', 'discs'));
    }
}
