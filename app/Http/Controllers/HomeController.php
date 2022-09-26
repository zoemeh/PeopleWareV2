<?php

namespace App\Http\Controllers;

use App\Models\Puesto;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        Carbon::setLocale('es');
        return view('home')->with("puestos", Puesto::orderBy("created_at")->get());
    }

    public function aplicar(Puesto $puesto)
    {
        return view('aplicar')->with('puesto', $puesto);
    }
}
