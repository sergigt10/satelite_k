<?php

namespace App\Http\Controllers;

use App\Models\Genere;
use Illuminate\Http\Request;

class GenereController extends Controller
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
        $generes = Genere::all();

        return view('backend.generes.index')
            ->with('generes', $generes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.generes.create');
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
            'nom_cat' => 'required',
            'nom_esp' => 'required',
        ]);

        $genere = new Genere($data);
        $genere->save();

        // Redireccionar
        return redirect()->action('GenereController@index')->with('estat', 'Gènere actualitzat correctament');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Genere  $genere
     * @return \Illuminate\Http\Response
     */
    public function show(Genere $genere)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Genere  $genere
     * @return \Illuminate\Http\Response
     */
    public function edit(Genere $genere)
    {
        return view('backend.generes.edit', compact('genere'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Genere  $genere
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Genere $genere)
    {
        // Validació
        $data = $request->validate([
            'nom_cat' => 'required',
            'nom_esp' => 'required',
        ]);

        // Asignar los valores
        $genere->nom_cat = $data['nom_cat'];
        $genere->nom_esp = $data['nom_esp'];

        $genere->save();

        // Redireccionar
        return redirect()->action('GenereController@index')->with('estat', 'Gèneres modificat correctament');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Genere  $genere
     * @return \Illuminate\Http\Response
     */
    public function destroy(Genere $genere)
    {
        $genere->delete();

        return redirect()->action('GenereController@index');
    }
}
