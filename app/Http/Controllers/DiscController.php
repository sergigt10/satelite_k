<?php

namespace App\Http\Controllers;

use App\Models\Artista;
use App\Models\Disc;
use App\Models\Genere;
use App\Models\Tipu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class DiscController extends Controller
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
        $discs = Disc::all();

        return view('backend.discs.index')
            ->with('discs', $discs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $artistes = Artista::all();
        $generes = Genere::all();
        $tipus = Tipu::all();

        return view('backend.discs.create')
                    ->with('generes', $generes)
                    ->with('artistes', $artistes)
                    ->with('tipus', $tipus);
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
            'titol' => 'required',
            'descripcio_cat' => 'required',
            'descripcio_esp' => 'required',
            'foto' => 'required|image|max:10240|mimes:jpeg,png,jpg,gif,svg',
            'data_publicacio' => 'required|date',
            'embed_spotify' => '',
            'link_spotify' => '',
            'link_apple_music' => '',
            'link_venda_fisica' => '',
            'generes_id' => '',
            'artistes_id' => '',
            'tipus_id' => '',
        ]);/* Max foto 10 MB */

        $ruta_foto = $request['foto']->store('backend/discs', 'public');

        $foto = Image::make( storage_path("app/public/{$ruta_foto}") )->resize(1200, 550, function($constraint){$constraint->aspectRatio();});
        $foto->save();

        $disc = new Disc($data);
        $disc->foto = $ruta_foto;
        $disc->save();

        // Redireccionar
        return redirect()->action('DiscController@index')->with('estat', 'Inserit correctament.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Disc  $disc
     * @return \Illuminate\Http\Response
     */
    public function show(Disc $disc)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Disc  $disc
     * @return \Illuminate\Http\Response
     */
    public function edit(Disc $disc)
    {
        $artistes = Artista::all();
        $generes = Genere::all();
        $tipus = Tipu::all();

        return view('backend.discs.edit', compact('disc'))->with('artistes', $artistes)->with('generes', $generes)->with('tipus', $tipus);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Disc  $disc
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Disc $disc)
    {
        // Validació
        $data = $request->validate([
            'titol' => 'required',
            'descripcio_cat' => 'required',
            'descripcio_esp' => 'required',
            'data_publicacio' => 'required|date',
            'embed_spotify' => '',
            'link_spotify' => '',
            'link_apple_music' => '',
            'link_venda_fisica' => '',
            'generes_id' => '',
            'artistes_id' => '',
            'tipus_id' => '',
        ]);

        // Asignar los valores
        $disc->titol = $data['titol'];
        $disc->embed_spotify = $data['embed_spotify'];
        $disc->descripcio_cat = $data['descripcio_cat'];
        $disc->descripcio_esp = $data['descripcio_esp'];
        $disc->data_publicacio = $data['data_publicacio'];
        $disc->link_spotify = $data['link_spotify'];
        $disc->link_apple_music = $data['link_apple_music'];
        $disc->link_venda_fisica = $data['link_venda_fisica'];
        $disc->generes_id = $data['generes_id'];
        $disc->artistes_id = $data['artistes_id'];
        $disc->tipus_id = $data['tipus_id'];

        // Si el usuario sube una nueva imagen
        if($request['foto']) {

            $ruta_foto = $request['foto']->store('backend/discs', 'public');

            $img = Image::make( storage_path("app/public/{$ruta_foto}") )->fit(1200, 550, function($constraint){$constraint->aspectRatio();});
            $img->save();

            // Eliminamos la imagen anterior
            if (File::exists(storage_path("app/public/$disc->foto"))) {
                File::delete(storage_path("app/public/$disc->foto"));
                // Asignar al objeto
                $disc->foto = $ruta_foto;
            }  
        }

        $disc->save();

        // Redireccionar
        return redirect()->action('DiscController@index')->with('estat', 'Modificat correctament.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Disc  $disc
     * @return \Illuminate\Http\Response
     */
    public function destroy(Disc $disc)
    {
        // Eliminar imatges
        if (File::exists(storage_path("app/public/$disc->foto"))) {
            File::delete(storage_path("app/public/$disc->foto"));
        }

        $disc->delete();

        return redirect()->action('DiscController@index');
    }
}
