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
        return view('veiculo.cadastro', [
            'marcas' => $list_marcas
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
            $novoVeiculo->nmPlacaVeiculo = $veiculo['nmPlacaVeiculo'];          
            $veiculoParaUpdate = Veiculo::find($veiculo['id']);//findByPlaca($novoVeiculo->nmPlacaVeiculo);
            //return var_dump($veiculoParaUpdate);
            if ($veiculoParaUpdate) {
                $veiculoParaUpdate->nmPlacaVeiculo   = $veiculo['nmPlacaVeiculo'];
                $veiculoParaUpdate->idModelo         = $veiculo['idModelo'];
                $veiculoParaUpdate->idUsuario        = $usuario['idUsuario'];
                $veiculoParaUpdate->anoVeiculo       = $veiculo['anoVeiculo'];
                $veiculoParaUpdate->dsConsumoVeiculo = $veiculo['dsConsumoVeiculo'];
            } else {
                $novoVeiculo->idModelo         = $veiculo['idModelo'];
                $novoVeiculo->idUsuario        = $usuario['idUsuario'];
                $novoVeiculo->anoVeiculo       = $veiculo['anoVeiculo'];
                $novoVeiculo->dsConsumoVeiculo = $veiculo['dsConsumoVeiculo'];
            }

            try {
                if ($veiculoParaUpdate) {
                    $veiculoParaUpdate->update();
                } else {
                    $novoVeiculo->save();
                }
            } catch (\Exception $e) {
                return "ERRO: " . $e->getMessage();
            }
        }
        $sen['sucess'] = true;
        return $sen;
    }

    public function listVeiculosByIdUsuario($idUsuario)
    {
        $usuario = $this->usuario->find($idUsuario);
        return $veiculos = $usuario->listVeiculos()->getQuery()->get(['id', 'nmPlacaVeiculo', 'idModelo', 'anoVeiculo', 'dsConsumoVeiculo']);        
    }

    public function findByPlaca($nmPlacaVeiculo)
    {
        return $this->veiculo->where('nmPlacaVeiculo', $nmPlacaVeiculo)->first();
    }

    public function findById($id)
    {
        return $this->veiculo->find($id)->first();
    }
}
