<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artista;

use Artesaos\SEOTools\Facades\SEOTools;

class ArtistesFrontendController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        SEOTools::setTitle('Artistas Satélite K, Discográfica Barcelona, Compañia discográfica');
        SEOTools::opengraph()->setUrl('https://www.satelitek.com/artistas');

        $artistes = Artista::latest('id')->paginate(16, ['*'], 'pagina');
        return view('frontend.artistes.index', compact('artistes'));
    }

    public function ordre(Request $request)
    {
        SEOTools::setTitle('Artistas Satélite K, Discográfica Barcelona, Compañia discográfica');
        SEOTools::setCanonical('https://www.satelitek.com/artistas');

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

        SEOTools::setTitle($artista->nom);

        return view('frontend.artistes.show', compact('artista'));
    }
}
