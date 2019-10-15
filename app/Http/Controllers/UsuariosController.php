<?php

namespace App\Http\Controllers;

use App\Usuario;
use Illuminate\Http\Request;

class UsuariosController extends Controller
{
    public function cadastro()
    {        
        return view('usuario.cadastro');
    }
}
