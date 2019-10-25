<?php

namespace App\Http\Controllers;

use App\Veiculo;
use App\Usuario;
use Illuminate\Http\Request;


class ViagensController extends Controller
{
    private $veiculo;
    private $usuario;

    public function __construct(Veiculo $veiculo, Usuario $usuario)
    {
        $this->veiculo = $veiculo;
        $this->usuario = $usuario;
    }

    public function viagemView(Request $request)
    {
        $usuario = $request->session()->get('usuario');
        $list_veiculos = $usuario->listVeiculos()->getQuery()->get(['id', 'nmPlacaVeiculo', 'idModelo', 'anoVeiculo', 'dsConsumoVeiculo']);
        return view('viagem.viagem', [
            'veiculos' => $list_veiculos
        ]);
    }

    public function viagemCView(Request $request)
    {
        $usuario = $request->session()->get('usuario');
        $list_veiculos = $usuario->listVeiculos()->getQuery()->get(['id', 'nmPlacaVeiculo', 'idModelo', 'anoVeiculo', 'dsConsumoVeiculo']);
        //return $request->all();
        return view('viagem.viagem_confirmacao', [
            'veiculos' => $list_veiculos,
            'request' => $request
        ]);
    }
}
