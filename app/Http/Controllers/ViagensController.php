<?php

namespace App\Http\Controllers;

use App\Veiculo;
use App\Viagem;
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

    public function viagemConfirmacaoView(Request $request)
    {
        $usuario = $request->session()->get('usuario');
        $list_veiculos = $usuario->listVeiculos()->getQuery()->get(['id', 'nmPlacaVeiculo', 'idModelo', 'anoVeiculo', 'dsConsumoVeiculo']);
        //return $request->all();
        return view('viagem.viagem_confirmacao', [
            'veiculos' => $list_veiculos,
            'request' => $request
        ]);
    }

    public function cadastrar(Request $request)
    {
        $viagem = new Viagem();
        $viagem->dsOrigemLat  = $request->dsOrigemLat;
        $viagem->dsOrigemLng  = $request->dsOrigemLng;
        $viagem->dsDestinoLat = $request->dsDestinoLat;
        $viagem->dsDestinoLng = $request->dsDestinoLng;
        $viagem->dsDistancia  = $request->dsDistancia;
        $viagem->dsTempo      = $request->dsTempo;
        $viagem->dtPrazo      = $request->dtPrazo;
        $viagem->hrPrazo      = $request->hrPrazo;
        $viagem->dsGastos     = $request->dsGastos; 
        $viagem->dsValor      = $request->dsValor;
        $viagem->dsLucro      = $request->dsLucro;
        $viagem->dsStatus     = $request->dsStatus;
        $viagem->idUsuario    = $request->idUsuario;
        $viagem->idVeiculo    = $request->idVeiculo;
        //return var_dump($viagem->first());

        try {
            $viagem->save();
        } catch (\Exception $e) {
            dd($e);
            return redirect("/")->with("message", "Erro ao cadastrar Viagem!");
        }
        return redirect("/")->with("message", "Viagem cadastrada com sucesso!");
    }

    public function listViagensbyId($idUsuario)
    {
        $usuario = $this->usuario->find($idUsuario);
        return $viagens = $usuario->listViagens()->getQuery()->get([
            'dsOrigemLat',
            'dsOrigemLng',
            'dsDestinoLat',
            'dsDestinoLng',
            'dsDistancia',
            'dsTempo',
            'dtPrazo',
            'hrPrazo',
            'dsGastos',
            'dsValor',
            'dsLucro',
            'dsStatus',
            'idUsuario',
            'idVeiculo'
        ]);
    }
}
