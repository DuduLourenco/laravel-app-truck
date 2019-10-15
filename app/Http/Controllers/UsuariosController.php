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
        $usuario = new Usuario();        
        $usuario->nmUsuario = $request->nmUsuario;
        $usuario->cdCpfUsuario = $request->cdCpfUsuario;
        $usuario->dtNascimentoUsuario = $request->dtNascimentoUsuario;
        $usuario->nrTelefoneUsuario = $request->nrTelefoneUsuario;
        $usuario->dsEmailUsuario = $request->dsEmailUsuario;
        $usuario->nmSenhaUsuario = $request->nmSenhaUsuario;
        $usuario->save();

        return redirect("usuarios\login")->with("message", "Usuário cadastrado com sucesso!");
    }
}
