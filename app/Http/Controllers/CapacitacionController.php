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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCapacitacionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCapacitacionRequest $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Capacitacion  $capacitacion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Capacitacion $capacitacion)
    {
        //
    }
}
