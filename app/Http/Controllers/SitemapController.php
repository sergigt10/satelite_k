<?php

namespace App\Http\Controllers;

use App\Models\Artista;
use App\Models\Disc;
use App\Models\Llibre;
use Illuminate\Support\Carbon;

class SitemapController extends Controller
{
    public function index()
    {
        return response()->view('frontend.sitemap.index')->header('Content-Type', 'text/xml');
    }

    public function statics()
    {
        $startOfMonth = Carbon::now()->startOfMonth()->format('c');
        $statics = [
            '',
            'quienes-somos-satelitek',
            'artistas',
            'discos',
            'libros',
            'videos',
            'contacto-satelitek'
        ];
        return response()->view('frontend.sitemap.statics', [
            'statics' => $statics,
            'startOfMonth' => $startOfMonth
        ])->header('Content-Type', 'text/xml');
    }

    public function artistes()
    {
        $startOfMonth = Carbon::now()->startOfMonth()->format('c');
        
        $artistes = Artista::all();
        return response()->view('frontend.sitemap.artistes', [
            'artistes' => $artistes,
            'startOfMonth' => $startOfMonth
        ])->header('Content-Type', 'text/xml');
    }

    public function discos()
    {
        $startOfMonth = Carbon::now()->startOfMonth()->format('c');

        $discos = Disc::all();
        return response()->view('frontend.sitemap.discos', [
            'discos' => $discos,
            'startOfMonth' => $startOfMonth
        ])->header('Content-Type', 'text/xml');
    }

    public function llibres()
    {
        $startOfMonth = Carbon::now()->startOfMonth()->format('c');

        $llibres = Llibre::all();
        return response()->view('frontend.sitemap.llibres', [
            'llibres' => $llibres,
            'startOfMonth' => $startOfMonth
        ])->header('Content-Type', 'text/xml');
    }
}
