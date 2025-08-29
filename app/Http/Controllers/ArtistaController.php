<?php

namespace App\Http\Controllers;

use App\Models\Artista;
use App\Models\Genere;
use Illuminate\Http\Request;
use Illuminate\Support\Str as Str;
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
        $generes = Genere::orderBy('nom_cat')->get();
        $artistesPortada = Artista::portada();
        return view('backend.artistes.create')
                    ->with('generes', $generes)
                    ->with('artistesPortada', $artistesPortada);
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
            'link_web' => 'nullable',
            'link_instagram' => 'nullable',
            'link_youtube' => 'nullable',
            'link_tiktok' => 'nullable',
            'link_spotify' => 'nullable',
            'generes_id' => 'required',
            'portada' => 'required',
            'foto' => 'required|image|max:10240|mimes:jpeg,png,jpg,gif,svg',
            'alt_foto' => 'nullable',
            'foto_2' => 'nullable|image|max:10240|mimes:jpeg,png,jpg,gif,svg',
            'alt_foto_2' => 'nullable',
            'foto_3' => 'nullable|image|max:10240|mimes:jpeg,png,jpg,gif,svg',
            'alt_foto_3' => 'nullable',
            'foto_4' => 'nullable|image|max:10240|mimes:jpeg,png,jpg,gif,svg',
            'alt_foto_4' => 'nullable',
            'data' => 'required',
            'title' => 'nullable',
            'description' => 'nullable'
        ]);/* Max foto 10 MB */

        if($request['foto']) {
            $ruta_foto = $request['foto']->store('backend/artistes', 'public');

            $foto = Image::make( storage_path("app/public/{$ruta_foto}") )->fit(1020, 1024, function($constraint){$constraint->aspectRatio();});
            $foto->save();
        }

        if($request['foto_2']) {
            $ruta_foto_2 = $request['foto_2']->store('backend/artistes', 'public');

            $foto_2 = Image::make( storage_path("app/public/{$ruta_foto_2}") )->fit(1020, 1024, function($constraint){$constraint->aspectRatio();});
            $foto_2->save();
        }

        if($request['foto_3']) {
            $ruta_foto_3 = $request['foto_3']->store('backend/artistes', 'public');

            $foto_3 = Image::make( storage_path("app/public/{$ruta_foto_3}") )->fit(1020, 1024, function($constraint){$constraint->aspectRatio();});
            $foto_3->save();
        }

        if($request['foto_4']) {
            $ruta_foto_4 = $request['foto_4']->store('backend/artistes', 'public');

            $foto_4 = Image::make( storage_path("app/public/{$ruta_foto_4}") )->fit(1020, 1024, function($constraint){$constraint->aspectRatio();});
            $foto_4->save();
        }

        $artista = new Artista($data);
        // $numerosRandom = uniqid();
        // $artista->slug = Str::of($request['nom'])->slug("-")->limit(255 - mb_strlen($numerosRandom) - 1, "")->trim("-")->append("-", $numerosRandom);
        $artista->slug = Str::of($request['nom'])->slug("-");
        if($request['foto']) { $artista->foto = $ruta_foto; }
        if($request['foto_2']) { $artista->foto_2 = $ruta_foto_2; }
        if($request['foto_3']) { $artista->foto_3 = $ruta_foto_3; }
        if($request['foto_4']) { $artista->foto_4 = $ruta_foto_4; }
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
        $generes = Genere::orderBy('nom_cat')->get();
        $artistesPortada = Artista::portada();

        return view('backend.artistes.edit', compact('artista'))->with('generes', $generes)->with('artistesPortada', $artistesPortada);
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
            'link_web' => 'nullable',
            'link_instagram' => 'nullable',
            'link_youtube' => 'nullable',
            'link_tiktok' => 'nullable',
            'link_spotify' => 'nullable',
            'generes_id' => 'required',
            'portada' => 'required',
            'data' => 'required',
            'alt_foto' => 'nullable',
            'alt_foto_2' => 'nullable',
            'alt_foto_3' => 'nullable',
            'alt_foto_4' => 'nullable',
            'data' => 'required',
            'title' => 'nullable',
            'description' => 'nullable'
        ]);
        
        // Si canviem el nom actualitzem slug
        if($artista->nom !== $data['nom']) {
            // $numerosRandom = uniqid();
            // $artista->slug = Str::of($request['nom'])->slug("-")->limit(255 - mb_strlen($numerosRandom) - 1, "")->trim("-")->append("-", $numerosRandom);
            $artista->slug = Str::of($request['nom'])->slug("-");
        }
        // Asignar los valores
        $artista->nom = $data['nom'];
        $artista->biografia_cat = $data['biografia_cat'];
        $artista->biografia_esp = $data['biografia_esp'];
        $artista->link_web = $data['link_web'];
        $artista->link_instagram = $data['link_instagram'];
        $artista->link_youtube = $data['link_youtube'];
        $artista->link_tiktok = $data['link_tiktok'];
        $artista->link_spotify = $data['link_spotify'];
        $artista->generes_id = $data['generes_id'];
        $artista->portada = $data['portada'];
        $artista->data = $data['data'];
        $artista->alt_foto = $data['alt_foto'];
        $artista->alt_foto_2 = $data['alt_foto_2'];
        $artista->alt_foto_3 = $data['alt_foto_3'];
        $artista->alt_foto_4 = $data['alt_foto_4'];
        $artista->title = $data['title'];
        $artista->description = $data['description'];

        if($request['del_foto_2'] == "1"){
            File::delete(storage_path("app/public/$artista->foto_2"));
            $artista->foto_2 = "";
        }
        if($request['del_foto_3'] == "1"){
            File::delete(storage_path("app/public/$artista->foto_3"));
            $artista->foto_3 = "";
        }
        if($request['del_foto_4'] == "1"){
            File::delete(storage_path("app/public/$artista->foto_4"));
            $artista->foto_4 = "";
        }

        // Si el usuario sube una nueva imagen
        if($request['foto']) {

            $ruta_foto = $request['foto']->store('backend/artistes', 'public');

            $img = Image::make( storage_path("app/public/{$ruta_foto}") )->fit(1020, 1024, function($constraint){$constraint->aspectRatio();});
            $img->save();

            // Eliminamos la imagen anterior
            if (File::exists(storage_path("app/public/$artista->foto"))) {
                File::delete(storage_path("app/public/$artista->foto"));
                // Asignar al objeto
                $artista->foto = $ruta_foto;
            }  
        }

        if($request['foto_2']) {

            $ruta_foto_2 = $request['foto_2']->store('backend/artistes', 'public');

            $img = Image::make( storage_path("app/public/{$ruta_foto_2}") )->fit(1020, 1024, function($constraint){$constraint->aspectRatio();});
            $img->save();

            // Eliminamos la imagen anterior
            if (File::exists(storage_path("app/public/$artista->foto_2"))) {
                File::delete(storage_path("app/public/$artista->foto_2"));
                // Asignar al objeto
                $artista->foto_2 = $ruta_foto_2;
            }  
        }

        if($request['foto_3']) {

            $ruta_foto_3 = $request['foto_3']->store('backend/artistes', 'public');

            $img = Image::make( storage_path("app/public/{$ruta_foto_3}") )->fit(1020, 1024, function($constraint){$constraint->aspectRatio();});
            $img->save();

            // Eliminamos la imagen anterior
            if (File::exists(storage_path("app/public/$artista->foto_3"))) {
                File::delete(storage_path("app/public/$artista->foto_3"));
                // Asignar al objeto
                $artista->foto_3 = $ruta_foto_3;
            }  
        }

        if($request['foto_4']) {

            $ruta_foto_4 = $request['foto_4']->store('backend/artistes', 'public');

            $img = Image::make( storage_path("app/public/{$ruta_foto_4}") )->fit(1020, 1024, function($constraint){$constraint->aspectRatio();});
            $img->save();

            // Eliminamos la imagen anterior
            if (File::exists(storage_path("app/public/$artista->foto_4"))) {
                File::delete(storage_path("app/public/$artista->foto_4"));
                // Asignar al objeto
                $artista->foto_4 = $ruta_foto_4;
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
        if (File::exists(storage_path("app/public/$artista->foto_2"))) {
            File::delete(storage_path("app/public/$artista->foto_2"));
        }
        if (File::exists(storage_path("app/public/$artista->foto_3"))) {
            File::delete(storage_path("app/public/$artista->foto_3"));
        }
        if (File::exists(storage_path("app/public/$artista->foto_4"))) {
            File::delete(storage_path("app/public/$artista->foto_4"));
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

        if($artista->noticies) {
            /* Eliminar imatges de notícies */
            $artista->noticies->each(function ($noticia) {
                if (File::exists(storage_path("app/public/$noticia->foto"))) {
                    File::delete(storage_path("app/public/$noticia->foto"));
                }
                $noticia->delete();
            });
        }

        if($artista->videoclips) {
            /* Eliminar imatges de notícies */
            $artista->videoclips->each(function ($videoclip) {
                $videoclip->delete();
            });
        }

        $artista->delete();
        
        return redirect()->action('ArtistaController@index');
    }
}
