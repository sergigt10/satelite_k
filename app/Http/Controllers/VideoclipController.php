<?php

namespace App\Http\Controllers;

use App\Models\Artista;
use App\Models\Videoclip;
use Illuminate\Http\Request;
use Illuminate\Support\Str as Str;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class VideoclipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videoclips = Videoclip::all();

        return view('backend.videoclips.index')
            ->with('videoclips', $videoclips);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $artistes = Artista::orderBy('nom')->get();
        $videoclipsPortada = Videoclip::portada();

        return view('backend.videoclips.create')
                    ->with('artistes', $artistes)
                    ->with('videoclipsPortada', $videoclipsPortada);
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
            'embed_youtube' => 'required',
            'artistes_id' => 'required',
            'portada' => 'required',
        ]);/* Max foto 10 MB */

        $videoclip = new Videoclip($data);

        // Retalla embed de Youtube
        $position = strpos($videoclip->embed_youtube, "=");
        $videoclip->embed_youtube = substr($videoclip->embed_youtube,intval($position)+1);

        $videoclip->slug = Str::of($request['titol'])->slug("-");
        $videoclip->save();

        // Redireccionar
        return redirect()->action('VideoclipController@index')->with('estat', 'Inserit correctament');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Videoclip  $videoclip
     * @return \Illuminate\Http\Response
     */
    public function show(Videoclip $videoclip)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Videoclip  $videoclip
     * @return \Illuminate\Http\Response
     */
    public function edit(Videoclip $videoclip)
    {
        $artistes = Artista::orderBy('nom')->get();
        $videoclipsPortada = Videoclip::portada();

        return view('backend.videoclips.edit', compact('videoclip'))->with('artistes', $artistes)->with('videoclipsPortada', $videoclipsPortada);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Videoclip  $videoclip
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Videoclip $videoclip)
    {
        // Validació
        $data = $request->validate([
            'titol' => 'required',
            'embed_youtube' => 'required',
            'artistes_id' => 'required',
            'portada' => 'required',
        ]);

        // Si canviem el nom actualitzem slug
        if($videoclip->titol !== $data['titol']) {
            $videoclip->slug = Str::of($request['titol'])->slug("-");
        }

        // Asignar los valores
        $videoclip->titol = $data['titol'];

        // Si canviem embed de youtube s'actualitza
        if($videoclip->embed_youtube !== $data['embed_youtube']) {
            // Retalla embed de Youtube
            $position = strpos($data['embed_youtube'], "=");
            $videoclip->embed_youtube = substr($data['embed_youtube'],intval($position)+1);
        } else {
            $videoclip->embed_youtube = $data['embed_youtube'];
        }

        $videoclip->artistes_id = $data['artistes_id'];
        $videoclip->portada = $data['portada'];

        $videoclip->save();

        // Redireccionar
        return redirect()->action('VideoclipController@index')->with('estat', 'Modificat correctament');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Videoclip  $videoclip
     * @return \Illuminate\Http\Response
     */
    public function destroy(Videoclip $videoclip)
    {
        $videoclip->delete();

        return redirect()->action('VideoclipController@index');
    }
}
