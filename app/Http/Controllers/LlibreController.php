<?php

namespace App\Http\Controllers;

use App\Models\Llibre;
use App\Models\Artista;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class LlibreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $llibres = Llibre::all();

        return view('backend.llibres.index')
            ->with('llibres', $llibres);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $artistes = Artista::all();

        return view('backend.llibres.create')
                    ->with('artistes', $artistes);
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
            'titol_cat' => 'required',
            'titol_esp' => 'required',
            'autor' => 'required',
            'ilustrador' => 'required',
            'descripcio_cat' => 'required',
            'descripcio_esp' => 'required',
            'foto' => 'required|image|max:10240|mimes:jpeg,png,jpg,gif,svg',
            'editorial' => 'required',
            'data_publicacio' => 'required|date',
            'link_compra_fisica' => '',
            'artistes_id' => '',
        ]);/* Max foto 10 MB */

        $ruta_foto = $request['foto']->store('backend/llibres', 'public');

        $foto = Image::make( storage_path("app/public/{$ruta_foto}") )->resize(1200, 550, function($constraint){$constraint->aspectRatio();});
        $foto->save();

        $llibre = new Llibre($data);
        $llibre->foto = $ruta_foto;
        $llibre->save();

        // Redireccionar
        return redirect()->action('LlibreController@index')->with('estat', 'Llibre inserit correctament');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Llibre  $llibre
     * @return \Illuminate\Http\Response
     */
    public function show(Llibre $llibre)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Llibre  $llibre
     * @return \Illuminate\Http\Response
     */
    public function edit(Llibre $llibre)
    {
        $artistes = Artista::all();

        return view('backend.llibres.edit', compact('llibre'))->with('artistes', $artistes);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Llibre  $llibre
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Llibre $llibre)
    {
        // Validació
        $data = $request->validate([
            'titol_cat' => 'required',
            'titol_esp' => 'required',
            'autor' => 'required',
            'ilustrador' => 'required',
            'descripcio_cat' => 'required',
            'descripcio_esp' => 'required',
            'editorial' => 'required',
            'data_publicacio' => 'required|date',
            'link_compra_fisica' => '',
            'artistes_id' => '',
        ]);

        // Asignar los valores
        $llibre->titol_cat = $data['titol_cat'];
        $llibre->titol_esp = $data['titol_esp'];
        $llibre->autor = $data['autor'];
        $llibre->ilustrador = $data['ilustrador'];
        $llibre->descripcio_cat = $data['descripcio_cat'];
        $llibre->descripcio_esp = $data['descripcio_esp'];
        $llibre->editorial = $data['editorial'];
        $llibre->data_publicacio = $data['data_publicacio'];
        $llibre->link_compra_fisica = $data['link_compra_fisica'];
        $llibre->artistes_id = $data['artistes_id'];

        // Si el usuario sube una nueva imagen
        if($request['foto']) {

            $ruta_foto = $request['foto']->store('backend/llibres', 'public');

            $img = Image::make( storage_path("app/public/{$ruta_foto}") )->fit(1200, 550, function($constraint){$constraint->aspectRatio();});
            $img->save();

            // Eliminamos la imagen anterior
            if (File::exists(storage_path("app/public/$llibre->foto"))) {
                File::delete(storage_path("app/public/$llibre->foto"));
                // Asignar al objeto
                $llibre->foto = $ruta_foto;
            }  
        }

        $llibre->save();

        // Redireccionar
        return redirect()->action('LlibreController@index')->with('estat', 'Llibre modificat correctament');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Llibre  $llibre
     * @return \Illuminate\Http\Response
     */
    public function destroy(Llibre $llibre)
    {
        // Eliminar imatges
        if (File::exists(storage_path("app/public/$llibre->foto"))) {
            File::delete(storage_path("app/public/$llibre->foto"));
        }

        $llibre->delete();

        return redirect()->action('LlibreController@index');
    }
}
