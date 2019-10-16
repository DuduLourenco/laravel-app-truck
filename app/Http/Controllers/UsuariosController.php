<?php

namespace App\Http\Controllers;

use App\Usuario;
use Illuminate\Http\Request;

class UsuariosController extends Controller
{
    private $usuario;

    public function __construct()
    {
        $this->usuario = new Usuario();
    }

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
        $usuario = $this->findByCpf($request->cdCpfUsuario);

        if ($usuario->nmSenhaUsuario == $request->nmSenhaUsuario ) {
            return redirect("usuarios/")->with("message", "Usuário logado com sucesso!");
        } else {
            return redirect("usuarios/")->with("message", "CPF ou Senha Incorretos!");
        }
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

        return redirect("usuarios/")->with("message", "Usuário cadastrado com sucesso!");
    }

    public function findByCpf($cdCpfUsuario){
        return $this->usuario->where('cdCpfUsuario', $cdCpfUsuario)->first();
    }
}
