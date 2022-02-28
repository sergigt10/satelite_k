<?php

namespace App\Http\Controllers;

use App\Models\Artista;
use App\Models\Genere;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class ArtistaController extends Controller
{
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
            'foto' => 'required|image|max:10240|mimes:jpeg,png,jpg,gif,svg'
        ]);/* Max foto 10 MB */

        $ruta_foto = $request['foto']->store('backend/artistes', 'public');

        $foto = Image::make( storage_path("app/public/{$ruta_foto}") )->resize(1200, 550, function($constraint){$constraint->aspectRatio();});
        $foto->save();

        $artista = new Artista($data);
        $artista->foto = $ruta_foto;
        $artista->save();

        // Redireccionar
        return redirect()->action('ArtistaController@index')->with('estat', 'Artista actualitzat correctament');
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

            $img = Image::make( storage_path("app/public/{$ruta_foto}") )->resize(1200, 550, function($constraint){$constraint->aspectRatio();});
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
        return redirect()->action('ArtistaController@index')->with('estat', 'Artista modificat correctament');
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

        if($artista->discs) {
            /* Eliminar imatges de discs */
            $artista->discs->each(function ($disc) {
                if (File::exists(storage_path("app/public/$disc->foto"))) {
                    File::delete(storage_path("app/public/$disc->foto"));
                }
                $disc->delete();
            });
        }
        
        if($artista->llibres) {
            /* Eliminar imatges de llibres */
            $artista->llibres->each(function ($llibre) {
                if (File::exists(storage_path("app/public/$llibre->foto"))) {
                    File::delete(storage_path("app/public/$llibre->foto"));
                }
                $llibre->delete();
            });
        }

        if($artista->noticies) {
            /* Eliminar imatges de notícies */
            $artista->noticies->each(function ($noticia) {
                if (File::exists(storage_path("app/public/$noticia->foto"))) {
                    File::delete(storage_path("app/public/$noticia->foto"));
                }
                $noticia->delete();
            });
        }

        $artista->delete();
        
        return redirect()->action('ArtistaController@index');
    }
}
