<?php

namespace App\Http\Controllers;

use App\Models\Disc;

class DiscsFrontendController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $discs = Disc::paginate(12, ['*'], 'pagina');
        return view('frontend.discs.index', compact('discs'));
    }

    public function show($slug)
    {
        $disc = Disc::where('slug','=', $slug)->firstOrFail();
        return view('frontend.discs.show', compact('disc'));
    }
}
