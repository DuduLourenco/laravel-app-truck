<?php

namespace App\Http\Controllers;

use App\Gasto;
use Illuminate\Http\Request;

class GastoController extends Controller
{
    private $gasto;
    public function __construct()
    {
        $this->gasto = new Gasto();
    }

    public function cadastrar(Request $request)
    {
        date_default_timezone_set(date_default_timezone_get());
        $date = date('Y-m-d h:i:s', time());
        $usuario = $request->session()->get('usuario');
        
        $gasto = new Gasto();
        $gasto->dsTipo = $request->dsTipo;
        $gasto->dsValor = $request->dsValor;
        $gasto->idUsuario = $usuario->idUsuario;
        $gasto->dtGasto = $date;
        try {
            $gasto->save();
        } catch (\Exception $e) {
            return redirect("usuarios/cofrinho")->with("message", "Erro ao registrar gasto");
        }
        return redirect("usuarios/cofrinho")->with("message", "Gasto cadastrado com sucesso!");
    }


    public function listAll()
    {
        return $this->gasto->all();
    }
}
