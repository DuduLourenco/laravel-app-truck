<?php

namespace App\Http\Controllers;

use App\Veiculo;
use App\MarcaVeiculo;
use App\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class VeiculosController extends Controller
{
    private $veiculo;
    private $usuario;
    private $marcaVeiculo;

    public function __construct(MarcaVeiculo $marcaVeiculo, Usuario $usuario)
    {
        $this->marcaVeiculo = $marcaVeiculo;
        $this->usuario = $usuario;
        $this->veiculo = new Veiculo();
    }

    public function cadastroView(Request $request)
    {        
        $list_marcas = $this->marcaVeiculo->all();
        $list_veiculos = $this->listVeiculosByIdUsuario($request->session()->get('usuario'));
        return view('veiculo.cadastro', [
            'marcas' => $list_marcas,
            'veiculos' => $list_veiculos
        ]);
    }

    public function cadastrar(Request $request)
    {        
        $veiculos = $request->all();
        $usuario = $request->session()->get('usuario');
        $usuario = [
            'idUsuario' => $usuario->id,
            'nmUsuario' => $usuario->nmUsuario
        ];

        foreach ($veiculos as $veiculo) {
            $novoVeiculo = new Veiculo();
            $novoVeiculo->idModelo = $veiculo['idModelo'];
            $novoVeiculo->idUsuario = $usuario['idUsuario'];
            $novoVeiculo->nmPlacaVeiculo = $veiculo['nmPlacaVeiculo'];
            $novoVeiculo->anoVeiculo = $veiculo['anoVeiculo'];
            $novoVeiculo->dsConsumoVeiculo = $veiculo['dsConsumoVeiculo'];

            try{
                $novoVeiculo->save();
            }catch (\Exception $e) {
                return "ERRO: ".$e->getMessage();
            }

        }
        $sen['sucess'] = true;
        return $sen;

    }

    public function listVeiculosByIdUsuario($idUsuario)
    {
        $usuario = $this->usuario->find($idUsuario)->first();
        $veiculos = $usuario->listVeiculos()->getQuery()->get(['id','nmPlacaVeiculo','idModelo','anoVeiculo','dsConsumoVeiculo']);
        return $veiculos;
    }

    public function findByPlaca($nmPlacaVeiculo)
    {
        return $this->veiculo->where('nmPlacaVeiculo', $nmPlacaVeiculo)->first();
    }



}
