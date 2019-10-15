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
        $usuario = new Usuario;
        $usuario->nmUsuario = $request->nmUsuario;
        return redirect("usuarios\login")->with("message", "OI".$request->nmUsuario);
    }
}
