<?php

namespace App\Http\Controllers;

use App\Models\Puesto;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        Carbon::setLocale('es');
        return view('home')->with("puestos", Puesto::where("activo", true)->orderBy("created_at")->get());
    }

    public function aplicar(Puesto $puesto)
    {
        return view('aplicar')->with('puesto', $puesto);
    }

    public function perfil()
    {
        return view('perfil');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
