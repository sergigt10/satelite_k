<?php

namespace App\Http\Controllers;

use App\Models\Noticia;

use Artesaos\SEOTools\Facades\SEOTools;

class NoticiesFrontendController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        SEOTools::setTitle('Noticias Satélite K, Discográfica Barcelona, Servicios musicales');
        SEOTools::opengraph()->setUrl('https://www.satelitek.com/noticias');

        $noticies = Noticia::latest('id')->paginate(16, ['*'], 'pagina');
        return view('frontend.noticies.index', compact('noticies'));
    }

    public function show($slug)
    {
        $noticia = Noticia::where('slug','=', $slug)->firstOrFail();

        SEOTools::setTitle($noticia->titol_cat);

        return view('frontend.noticies.show', compact('noticia'));
    }
}
