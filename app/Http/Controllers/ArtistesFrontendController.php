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
        $artistes = Artista::latest('id')->paginate(16, ['*'], 'pagina');
        return view('frontend.artistes.index', compact('artistes'));
    }

    public function ordre(Request $request)
    {
        if ( $request->input('ordre') === 'id' ) {
            $artistes = Artista::latest('id')->paginate(16, ['*'], 'pagina');
        } else {
            $artistes = Artista::orderBy('nom')->paginate(16, ['*'], 'pagina');
        }
        
        return view('frontend.artistes.index', compact('artistes'));
    }

    public function show($slug)
    {
        $artista = Artista::where('slug','=', $slug)->firstOrFail();
        return view('frontend.artistes.show', compact('artista'));
    }
}
