<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artista;
use App\Models\Disc;
use App\Models\Genere;
use App\Models\Tipu;
use Illuminate\Support\Str as Str;

use Artesaos\SEOTools\Facades\SEOTools;

class DiscsFrontendController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        SEOTools::setTitle('Discos Satélite K, Discográfica independiente Barcelona');

        $artistes = Artista::orderBy('nom')->get();
        $generes = Genere::orderBy('nom_cat')->get();
        $tipus = Tipu::orderBy('nom_cat')->get();
        $discs = Disc::latest('data_publicacio')->paginate(21, ['*'], 'pagina');
        return view('frontend.discs.index', compact('discs','artistes','generes','tipus'));
    }

    public function filter(Request $request)
    {
        SEOTools::setTitle('Discos Satélite K, Discográfica independiente Barcelona');
        SEOTools::setCanonical('https://www.satelitek.com/discos');

        $filtreArtista = $request->input('artista');
        $filtreTipus = $request->input('tipus');
        $filtreGenere = $request->input('genere');
        $filtreAny = $request->input('any');

        $artistes = Artista::orderBy('nom')->get();
        $generes = Genere::orderBy('nom_cat')->get();
        $tipus = Tipu::orderBy('nom_cat')->get();
        $discs = Disc::where('artistes_id','LIKE','%'.$filtreArtista.'%')
                    ->where('generes_id','LIKE','%'.$filtreGenere.'%')
                    ->where('tipus_id','LIKE','%'.$filtreTipus.'%')
                    ->where('data_publicacio','LIKE','%'.$filtreAny.'%')
                    ->paginate(21, ['*'], 'pagina');
        return view('frontend.discs.filter', compact('discs','artistes','generes','tipus'));
    }

    public function show($slug)
    {
        $disc = Disc::where('slug','=', $slug)->firstOrFail();

        SEOTools::setTitle($disc->titol.', Satélite K');
        SEOTools::setDescription(Str::limit(strip_tags($disc->descripcio_esp)), 155, ' (...)');

        return view('frontend.discs.show', compact('disc'));
    }
}
