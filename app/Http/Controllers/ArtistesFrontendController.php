<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artista;
use Illuminate\Support\Str as Str;

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

        SEOTools::setTitle($artista->nom.', Satélite K');
        SEOTools::setDescription(Str::limit(strip_tags($artista->biografia_esp)), 155, ' (...)');
        SEOTools::opengraph()->addImage('https://www.satelitek.com/storage/'.$artista->foto, ['height' => 300, 'width' => 300]);
        SEOTools::jsonLd()->addImage('https://www.satelitek.com/storage/'.$artista->foto, ['height' => 300, 'width' => 300]);

        return view('frontend.artistes.show', compact('artista'));
    }
}
