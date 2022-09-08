<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCompetenciaRequest;
use App\Http\Requests\UpdateCompetenciaRequest;
use App\Models\Competencia;

class CompetenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('competencia.index')->with('competencias', Competencia::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('competencia.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCompetenciaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCompetenciaRequest $request)
    {
        $competencia = new Competencia();
        $competencia->descripcion = $request->descripcion;
        $competencia->activo = is_null($request->activo) ? false : $request->activo;
        $competencia->save();
        notify()->success('Competencia creada.');
        return redirect()->route("competencias.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Competencia  $competencia
     * @return \Illuminate\Http\Response
     */
    public function show(Competencia $competencia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Competencia  $competencia
     * @return \Illuminate\Http\Response
     */
    public function edit(Competencia $competencia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCompetenciaRequest  $request
     * @param  \App\Models\Competencia  $competencia
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCompetenciaRequest $request, Competencia $competencia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Competencia  $competencia
     * @return \Illuminate\Http\Response
     */
    public function destroy(Competencia $competencia)
    {
        //
    }
}
