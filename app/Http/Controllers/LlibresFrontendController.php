<?php

namespace App\Http\Controllers;

use App\Models\Llibre;

class LlibresFrontendController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        $llibres = Llibre::paginate(12, ['*'], 'pagina');
        return view('frontend.llibres.index', compact('llibres'));
    }

    public function show($slug)
    {
        $llibre = Llibre::where('slug','=', $slug)->firstOrFail();
        return view('frontend.llibres.show', compact('llibre'));
    }
}
