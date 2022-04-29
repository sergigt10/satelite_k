<?php

namespace App\Http\Controllers;

use App\Models\Llibre;

use Artesaos\SEOTools\Facades\SEOTools;

class LlibresFrontendController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        SEOTools::setTitle('Compañia discográfica Barcelona, Servicios musicales Barcelona');
        SEOTools::opengraph()->setUrl('https://www.satelitek.com/libros');

        $llibres = Llibre::latest('data_publicacio')->paginate(16, ['*'], 'pagina');
        return view('frontend.llibres.index', compact('llibres'));
    }

    public function show($slug)
    {
        $llibre = Llibre::where('slug','=', $slug)->firstOrFail();

        SEOTools::setTitle($llibre->titol_cat);

        return view('frontend.llibres.show', compact('llibre'));
    }
}
