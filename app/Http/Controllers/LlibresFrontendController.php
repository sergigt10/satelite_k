<?php

namespace App\Http\Controllers;

use App\Models\Llibre;
use Illuminate\Support\Str as Str;

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
        SEOTools::setTitle('Libros Satélite K, Compañia discográfica Barcelona');

        $llibres = Llibre::latest('data_publicacio')->paginate(16, ['*'], 'pagina');
        return view('frontend.llibres.index', compact('llibres'));
    }

    public function show($slug)
    {
        $llibre = Llibre::where('slug','=', $slug)->firstOrFail();

        SEOTools::setTitle($llibre->titol_cat.', Satélite K');
        SEOTools::setDescription(Str::limit(strip_tags($llibre->descripcio_esp)), 155, ' (...)');
        SEOTools::opengraph()->addImage('https://www.satelitek.com/storage/'.$llibre->foto, ['height' => 300, 'width' => 300]);
        SEOTools::jsonLd()->addImage('https://www.satelitek.com/storage/'.$llibre->foto, ['height' => 300, 'width' => 300]);

        return view('frontend.llibres.show', compact('llibre'));
    }
}
