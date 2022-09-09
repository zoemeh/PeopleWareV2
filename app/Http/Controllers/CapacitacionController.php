<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCapacitacionRequest;
use App\Http\Requests\UpdateCapacitacionRequest;
use App\Models\Capacitacion;

class CapacitacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("capacitacion.index")->with("capacitaciones", Capacitacion::orderBy('id')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("capacitacion.create")->with("capacitacion", new Capacitacion());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCapacitacionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCapacitacionRequest $request)
    {
        $capacitacion = new Capacitacion();
        if ($capacitacion->save()) {
            notify()->success('Capacitacion creada.');
        } else {
            notify()->error('Capacitacion no creada.');
        }
        return redirect()->route("capacitiones.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Capacitacion  $capacitacion
     * @return \Illuminate\Http\Response
     */
    public function show(Capacitacion $capacitacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Capacitacion  $capacitacion
     * @return \Illuminate\Http\Response
     */
    public function edit(Capacitacion $capacitacion)
    {
        return view('capacitacion.edit')->with('capacitacion', $capacitacion);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCapacitacionRequest  $request
     * @param  \App\Models\Capacitacion  $capacitacion
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCapacitacionRequest $request, Capacitacion $capacitacion)
    {
        //TODO: 
        if ($capacitacion->save()) {
            notify()->success('Capacitacion modificada.');
        } else {
            notify()->error('Capacitacion no modificada.');
        }
        return redirect()->route("capacitiones.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Capacitacion  $capacitacion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Capacitacion $capacitacion)
    {
        if (Capacitacion::destroy($capacitacion->id) == 0) {
            notify()->error('Capacitacion no borrada.');
        } else {
            notify()->success('Capacitacion borrada.');
        }
        return redirect()->route("capacitaciones.index");
    }
}
