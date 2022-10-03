<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsuariosController extends Controller
{
    
    public function index()
    {
        return view('usuario.index')->with('usuarios', User::orderBy("created_at")->get());

    }
}
