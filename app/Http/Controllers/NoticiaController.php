<?php

namespace App\Http\Controllers;

use App\Models\Artista;
use App\Models\Noticia;
use Illuminate\Http\Request;
use Illuminate\Support\Str as Str;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class NoticiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $noticies = Noticia::all();

        return view('backend.noticies.index')
            ->with('noticies', $noticies);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $artistes = Artista::orderBy('nom')->get();

        return view('backend.noticies.create')
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
            'descripcio_cat' => 'required',
            'descripcio_esp' => 'required',
            'artistes_id' => 'required',
            'foto' => 'required|image|max:10240|mimes:jpeg,png,jpg,gif,svg'
        ]);/* Max foto 10 MB */

        $ruta_foto = $request['foto']->store('backend/noticia', 'public');

        $foto = Image::make( storage_path("app/public/{$ruta_foto}") )->fit(1020, 1024, function($constraint){$constraint->aspectRatio();});
        $foto->save();

        $noticia = new Noticia($data);
        $numerosRandom = uniqid();
        $noticia->slug = Str::of($request['titol_cat'])->slug("-")->limit(255 - mb_strlen($numerosRandom) - 1, "")->trim("-")->append("-", $numerosRandom);
        $noticia->foto = $ruta_foto;
        $noticia->save();

        // Redireccionar
        return redirect()->action('NoticiaController@index')->with('estat', 'Noticia inserit correctament');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Noticia  $noticia
     * @return \Illuminate\Http\Response
     */
    public function show(Noticia $noticia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Noticia  $noticia
     * @return \Illuminate\Http\Response
     */
    public function edit(Noticia $noticia)
    {
        $artistes = Artista::orderBy('nom')->get();

        return view('backend.noticies.edit', compact('noticia'))->with('artistes', $artistes);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Noticia  $noticia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Noticia $noticia)
    {
        // Validació
        $data = $request->validate([
            'titol_cat' => 'required',
            'titol_esp' => 'required',
            'descripcio_cat' => 'required',
            'descripcio_esp' => 'required',
            'artistes_id' => 'required',
        ]);/* Max foto 10 MB */

        // Si canviem el nom actualitzem slug
        if($noticia->titol_cat !== $data['titol_cat']) {
            $numerosRandom = uniqid();
            $noticia->slug = Str::of($request['titol_cat'])->slug("-")->limit(255 - mb_strlen($numerosRandom) - 1, "")->trim("-")->append("-", $numerosRandom);
        }
        // Asignar los valores
        $noticia->titol_cat = $data['titol_cat'];
        $noticia->titol_esp = $data['titol_esp'];
        $noticia->descripcio_cat = $data['descripcio_cat'];
        $noticia->descripcio_esp = $data['descripcio_esp'];
        $noticia->artistes_id = $data['artistes_id'];

        // Si el usuario sube una nueva imagen
        if($request['foto']) {

            $ruta_foto = $request['foto']->store('backend/noticia', 'public');

            $img = Image::make( storage_path("app/public/{$ruta_foto}") )->fit(1020, 1024, function($constraint){$constraint->aspectRatio();});
            $img->save();

            // Eliminamos la imagen anterior
            if (File::exists(storage_path("app/public/$noticia->foto"))) {
                File::delete(storage_path("app/public/$noticia->foto"));
                // Asignar al objeto
                $noticia->foto = $ruta_foto;
            }  
        }

        $noticia->save();

        // Redireccionar
        return redirect()->action('NoticiaController@index')->with('estat', 'Noticia modificada correctament');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Noticia  $noticia
     * @return \Illuminate\Http\Response
     */
    public function destroy(Noticia $noticia)
    {
        // Eliminar imatges
        if (File::exists(storage_path("app/public/$noticia->foto"))) {
            File::delete(storage_path("app/public/$noticia->foto"));
        }

        $noticia->delete();

        return redirect()->action('NoticiaController@index');
    }
}
