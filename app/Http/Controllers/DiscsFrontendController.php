<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artista;
use App\Models\Disc;
use App\Models\Genere;
use App\Models\Tipu;

class DiscsFrontendController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $artistes = Artista::all();
        $generes = Genere::all();
        $tipus = Tipu::all();
        $discs = Disc::paginate(11, ['*'], 'pagina');
        return view('frontend.discs.index', compact('discs','artistes','generes','tipus'));
    }

    public function filter(Request $request)
    {
        $filtreArtista = $request->input('artista');
        $filtreTipus = $request->input('tipus');
        $filtreGenere = $request->input('genere');
        $filtreAny = $request->input('any');

        $artistes = Artista::all();
        $generes = Genere::all();
        $tipus = Tipu::all();
        $discs = Disc::where('artistes_id','LIKE','%'.$filtreArtista.'%')
                    ->where('generes_id','LIKE','%'.$filtreGenere.'%')
                    ->where('tipus_id','LIKE','%'.$filtreTipus.'%')
                    ->where('data_publicacio','LIKE','%'.$filtreAny.'%')
                    ->paginate(12, ['*'], 'pagina');
        return view('frontend.discs.filter', compact('discs','artistes','generes','tipus'));
    }

    public function show($slug)
    {
        $disc = Disc::where('slug','=', $slug)->firstOrFail();
        return view('frontend.discs.show', compact('disc'));
    }
}
