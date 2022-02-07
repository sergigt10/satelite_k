<?php

namespace App\Http\Controllers;

use App\Models\Artista;
use App\Models\Genere;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class ArtistaController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $artistes = Artista::all();

        return view('backend.artistes.index')
            ->with('artistes', $artistes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $generes = Genere::all();

        return view('backend.artistes.create')
                    ->with('generes', $generes);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nom' => 'required',
            'biografia_cat' => 'required',
            'biografia_esp' => 'required',
            'link_web' => '',
            'generes_id' => '',
            'foto' => 'required|image|max:10240'
        ]);/* Max foto 10 MB */

        $ruta_foto = $request['foto']->store('backend/artistes', 'public');

        $foto = Image::make( storage_path("app/public/{$ruta_foto}") )->fit(1200, 550);
        $foto->save();

        $artista = new Artista($data);
        $artista->foto = $ruta_foto;
        $artista->save();

        // Redireccionar
        return redirect()->action('ArtistaController@index')->with('estat', 'Artista actualitzat correctament.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Artista  $artista
     * @return \Illuminate\Http\Response
     */
    public function show(Artista $artista)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Artista  $artista
     * @return \Illuminate\Http\Response
     */
    public function edit(Artista $artista)
    {
        $generes = Genere::all();

        return view('backend.artistes.edit', compact('artista'))->with('generes', $generes);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Artista  $artista
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Artista $artista)
    {
        // Validació
        $data = $request->validate([
            'nom' => 'required',
            'biografia_cat' => 'required',
            'biografia_esp' => 'required',
            'link_web' => '',
            'generes_id' => '',
        ]);

        // Asignar los valores
        $artista->nom = $data['nom'];
        $artista->biografia_cat = $data['biografia_cat'];
        $artista->biografia_esp = $data['biografia_esp'];
        $artista->link_web = $data['link_web'];
        $artista->generes_id = $data['generes_id'];

        // Si el usuario sube una nueva imagen
        if($request['foto']) {

            $ruta_foto = $request['foto']->store('backend/artistes', 'public');

            $img = Image::make( storage_path("app/public/{$ruta_foto}") )->fit(1200, 550);
            $img->save();

            // Eliminamos la imagen anterior
            if (File::exists(storage_path("app/public/$artista->foto"))) {
                File::delete(storage_path("app/public/$artista->foto"));
                // Asignar al objeto
                $artista->foto = $ruta_foto;
            }  
        }

        $artista->save();

        // Redireccionar
        return redirect()->action('ArtistaController@index')->with('estat', 'Artista modificat correctament.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Artista  $artista
     * @return \Illuminate\Http\Response
     */
    public function destroy(Artista $artista)
    {
        // Eliminar imatges
        if (File::exists(storage_path("app/public/$artista->foto"))) {
            File::delete(storage_path("app/public/$artista->foto"));
        }

        $artista->delete();

        return redirect()->action('ArtistaController@index');
    }
}
