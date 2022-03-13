<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artista;

class ArtistesFrontendController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $artistes = Artista::paginate(10);
        return view('frontend.artistes.index', compact('artistes'));
    }

    public function show($slug)
    {
        $artista = Artista::where('slug','=', $slug)->firstOrFail();
        return view('frontend.artistes.show', compact('artista'));
    }
}
