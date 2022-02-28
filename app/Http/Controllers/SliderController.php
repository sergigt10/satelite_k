<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::all();

        return view('backend.sliders.index')
            ->with('sliders', $sliders);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.sliders.create');
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
            'nom_artista' => 'required',
            'nom_disc' => 'required',
            'titol_link_cat' => '',
            'titol_link_esp' => '',
            'url_link' => '',
            'foto' => 'required|image|max:10240|mimes:jpeg,png,jpg,gif,svg'
        ]);/* Max foto 10 MB */

        $ruta_foto = $request['foto']->store('backend/slides', 'public');

        $foto = Image::make( storage_path("app/public/{$ruta_foto}") )->resize(1200, 550, function($constraint){$constraint->aspectRatio();});
        $foto->save();

        $artista = new Slider($data);
        $artista->foto = $ruta_foto;
        $artista->save();

        // Redireccionar
        return redirect()->action('SliderController@index')->with('estat', 'Slide actualitzat correctament');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit(Slider $slider)
    {
        return view('backend.sliders.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slider $slider)
    {
        $data = $request->validate([
            'nom_artista' => 'required',
            'nom_disc' => 'required',
            'titol_link_cat' => '',
            'titol_link_esp' => '',
            'url_link' => ''
        ]);

        // Asignar los valores
        $slider->nom_artista = $data['nom_artista'];
        $slider->nom_disc = $data['nom_disc'];
        $slider->titol_link_cat = $data['titol_link_cat'];
        $slider->titol_link_esp = $data['titol_link_esp'];
        $slider->url_link = $data['url_link'];

        // Si el usuario sube una nueva imagen
        if($request['foto']) {

            $ruta_foto = $request['foto']->store('backend/slides', 'public');

            $img = Image::make( storage_path("app/public/{$ruta_foto}") )->resize(1200, 550, function($constraint){$constraint->aspectRatio();});
            $img->save();

            // Eliminamos la imagen anterior
            if (File::exists(storage_path("app/public/$slider->foto"))) {
                File::delete(storage_path("app/public/$slider->foto"));
                // Asignar al objeto
                $slider->foto = $ruta_foto;
            }  
        }

        $slider->save();

        // Redireccionar
        return redirect()->action('SliderController@index')->with('estat', 'Slide modificat correctament');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider)
    {
        // Eliminar imatges
        if (File::exists(storage_path("app/public/$slider->foto"))) {
            File::delete(storage_path("app/public/$slider->foto"));
        }

        $slider->delete();

        return redirect()->action('SliderController@index');
    }
}
