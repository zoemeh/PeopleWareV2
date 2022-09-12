<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreIdiomaRequest;
use App\Http\Requests\UpdateIdiomaRequest;
use App\Models\Idioma;

class IdiomaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('idioma.index')->with('idiomas', Idioma::orderBy('id')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('idioma.create')->with('idioma', new Idioma());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreIdiomaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreIdiomaRequest $request)
    {
        $idioma = new Idioma();
        $idioma->descripcion = $request->descripcion;
        $idioma->activo = is_null($request->activo) ? false : $request->activo;
        if ($idioma->save()) {
            notify()->success('Idioma creado.');
        } else {
            notify()->error('Idioma no creado.');
        }
        return redirect()->route("idiomas.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Idioma  $idioma
     * @return \Illuminate\Http\Response
     */
    public function show(Idioma $idioma)
    {
        return view('idioma.show')->with('idioma', $idioma);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Idioma  $idioma
     * @return \Illuminate\Http\Response
     */
    public function edit(Idioma $idioma)
    {
        return view('idioma.edit')->with('idioma', $idioma);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateIdiomaRequest  $request
     * @param  \App\Models\Idioma  $idioma
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateIdiomaRequest $request, Idioma $idioma)
    {
        $idioma->descripcion = $request->descripcion;
        $idioma->activo = is_null($request->activo) ? false : $request->activo;
        if ($idioma->save()) {
            notify()->success('Idioma modificado.');
        } else {
            notify()->error('Idioma no modificado.');
        }
        return redirect()->route("idiomas.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Idioma  $idioma
     * @return \Illuminate\Http\Response
     */
    public function destroy(Idioma $idioma)
    {
        if (Idioma::destroy($idioma->id) == 0) {
            notify()->error('Idioma no borrado.');
        } else {
            notify()->success('Idioma borrado.');
        }
        return redirect()->route("idiomas.index");
    }
}
