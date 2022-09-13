<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoredepartamentoRequest;
use App\Http\Requests\UpdatedepartamentoRequest;
use App\Models\Departamento;

class DepartamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('departamento.index')->with('departamentos', Departamento::orderBy('id')->get())->with('departamento', new Departamento());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('departamento.create')->with('departamento', new Departamento());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoredepartamentoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoredepartamentoRequest $request)
    {
        $departamento = new Departamento();
        $departamento->descripcion = $request->descripcion;
        $departamento->activo = is_null($request->activo) ? false : $request->activo;
        if ($departamento->save()) {
            notify()->success('Departamento creado.');
        } else {
            notify()->error('Departamento no creado.');
        }
        return redirect()->route("departamentos.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Departamento  $Departamento
     * @return \Illuminate\Http\Response
     */
    public function show(Departamento $departamento)
    {
        return view("departamento.show")->with("departamento", $departamento);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Departamento  $Departamento
     * @return \Illuminate\Http\Response
     */
    public function edit(Departamento $departamento)
    {
        return view('departamento.edit')->with('departamento', $departamento);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatedepartamentoRequest  $request
     * @param  \App\Models\Departamento  $Departamento
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatedepartamentoRequest $request, Departamento $departamento)
    {
        $departamento->descripcion = $request->descripcion;
        $departamento->activo = is_null($request->activo) ? false : $request->activo;
        if ($departamento->save()) {
            notify()->success('Departamento modificado.');
        } else {
            notify()->error('Departamento no modificado.');
        }
        return redirect()->route("departamentos.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Departamento  $Departamento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Departamento $departamento)
    {
        if (Departamento::destroy($departamento->id) == 0) {
            notify()->error('Departamento no borrado.');
        } else {
            notify()->success('Departamento borrado.');
        }
        return redirect()->route("departamentos.index");
    }
}
