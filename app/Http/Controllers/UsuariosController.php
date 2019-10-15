<?php

namespace App\Http\Controllers;

use App\Usuario;
use Illuminate\Http\Request;

class UsuariosController extends Controller
{
    public function loginView()
    {        
        $list_usuarios = Usuario::all();
        return view('usuario.login', [
            'usuarios' => $list_usuarios
        ]);
    }

    public function cadastroView()
    {        
        return view('usuario.cadastro');
    }

    public function entrar(Request $request)
    {
        var_dump($request->all());
    }

    public function cadastrar(Request $request)
    {
        Usuario::created($request->all());
        return redirect("usuarios\login")->with("message", "Usuário cadastro com sucesso!");
    }
}
