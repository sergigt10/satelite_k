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
            'foto' => 'required|image|max:10240|mimes:jpeg,png,jpg,gif,svg',
            'foto2' => 'nullable|image|max:10240|mimes:jpeg,png,jpg,gif,svg',
            'alt_foto2' => 'nullable'
        ]);/* Max foto 10 MB */

        $ruta_foto = $request['foto']->store('backend/noticia', 'public');
        $ruta_foto_mini = $request['foto']->store('backend/noticia/mini', 'public');

        $foto = Image::make( storage_path("app/public/{$ruta_foto}"));
        $foto->save();

        $foto_mini = Image::make( storage_path("app/public/{$ruta_foto_mini}") )->fit(1020, 1024, function($constraint){$constraint->aspectRatio();});
        $foto_mini->save();

        if($request['foto2']){
            $ruta_foto_2 = $request['foto2']->store('backend/noticia', 'public');
            $foto2 = Image::make( storage_path("app/public/{$ruta_foto_2}"));
            $foto2->save();
        }

        $noticia = new Noticia($data);
        // $numerosRandom = uniqid();
        // $noticia->slug = Str::of($request['titol_cat'])->slug("-")->limit(255 - mb_strlen($numerosRandom) - 1, "")->trim("-")->append("-", $numerosRandom);
        $noticia->slug = Str::of($request['titol_cat'])->slug("-");
        $noticia->foto = $ruta_foto;
        $noticia->foto_mini = $ruta_foto_mini;
        if($request['foto2']) { $noticia->foto2 = $ruta_foto_2; }
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
            'alt_foto2' => 'nullable',
        ]);/* Max foto 10 MB */

        // Si canviem el nom actualitzem slug
        if($noticia->titol_cat !== $data['titol_cat']) {
            // $numerosRandom = uniqid();
            // $noticia->slug = Str::of($request['titol_cat'])->slug("-")->limit(255 - mb_strlen($numerosRandom) - 1, "")->trim("-")->append("-", $numerosRandom);
            $noticia->slug = Str::of($request['titol_cat'])->slug("-");
        }
        // Asignar los valores
        $noticia->titol_cat = $data['titol_cat'];
        $noticia->titol_esp = $data['titol_esp'];
        $noticia->descripcio_cat = $data['descripcio_cat'];
        $noticia->descripcio_esp = $data['descripcio_esp'];
        $noticia->alt_foto2 = $data['alt_foto2'];
        $noticia->artistes_id = $data['artistes_id'];

        // Eliminar imatge si l'usuari escull l'opció
        if($request['del_img2'] == "1"){
            File::delete(storage_path("app/public/$noticia->foto2"));
            $noticia->foto2 = "";
        }

        // Si el usuario sube una nueva imagen
        if($request['foto']) {

            $ruta_foto = $request['foto']->store('backend/noticia', 'public');
            $ruta_foto_mini = $request['foto']->store('backend/noticia/mini', 'public');

            $img = Image::make( storage_path("app/public/{$ruta_foto}") );
            $img->save();

            $img_mini = Image::make( storage_path("app/public/{$ruta_foto_mini}") )->fit(1020, 1024, function($constraint){$constraint->aspectRatio();});
            $img_mini->save();

            // Eliminamos la imagen anterior
            if (File::exists(storage_path("app/public/$noticia->foto"))) {
                File::delete(storage_path("app/public/$noticia->foto"));
                // Asignar al objeto
                $noticia->foto = $ruta_foto;
            } 
            if (File::exists(storage_path("app/public/$noticia->foto_mini"))) {
                File::delete(storage_path("app/public/$noticia->foto_mini"));
                // Asignar al objeto
                $noticia->foto_mini = $ruta_foto_mini;
            }   
        }
        if($request['foto2']) {

            $ruta_foto_2 = $request['foto2']->store('backend/noticia', 'public');

            $img_2 = Image::make( storage_path("app/public/{$ruta_foto_2}"));
            $img_2->save();

            // Eliminamos la imagen anterior
            if (File::exists(storage_path("app/public/$noticia->foto2"))) {
                File::delete(storage_path("app/public/$noticia->foto2"));
                // Asignar al objeto
                $noticia->foto2 = $ruta_foto_2;
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
        if (File::exists(storage_path("app/public/$noticia->foto_mini"))) {
            File::delete(storage_path("app/public/$noticia->foto_mini"));
        }
        if (File::exists(storage_path("app/public/$noticia->foto2"))) {
            File::delete(storage_path("app/public/$noticia->foto2"));
        }

        $noticia->delete();

        return redirect()->action('NoticiaController@index');
    }
}
