<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Noticia;

class NoticiesFrontendController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $noticies = Noticia::latest('id')->paginate(16, ['*'], 'pagina');
        return view('frontend.noticies.index', compact('noticies'));
    }

    public function show($slug)
    {
        $noticia = Noticia::where('slug','=', $slug)->firstOrFail();
        return view('frontend.noticies.show', compact('noticia'));
    }
}
