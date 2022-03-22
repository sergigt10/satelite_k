<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Artista;
use App\Models\Disc;
use App\Models\Llibre;
use App\Models\Noticia;

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

    public function about(){
        return view('frontend.about.index');
    }

    public function search(Request $request) {

        if($request->input('cercar') === null ||  $request->input('cercar') === '') {
            abort(404);
        } else {
            $artistaCercar = $discCercar = $noticiaCercar = $llibreCercar = $request->input('cercar') ;
        
            $filterArtista = Artista::where('nom','LIKE','%'.$artistaCercar.'%')->paginate(12, ['*'], 'pagina');
            $filterDisc = Disc::where('titol','LIKE','%'.$discCercar.'%')->paginate(12, ['*'], 'pagina');
            $filterNoticia = Noticia::where('titol_cat','LIKE','%'.$noticiaCercar.'%')->paginate(12, ['*'], 'pagina');
            $filterLlibre = Llibre::where('titol_cat','LIKE','%'.$llibreCercar.'%')->paginate(12, ['*'], 'pagina');

            return view('frontend.search.index', compact('filterArtista', 'filterDisc', 'filterLlibre', 'filterNoticia'));
        }
    }
}
