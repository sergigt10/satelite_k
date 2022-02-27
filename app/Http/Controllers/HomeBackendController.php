<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeBackendController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('backend.inici.index');
    }
}
