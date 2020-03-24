<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Viatura;
use App\Modelo;
use App\Proprietario;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ViaturaFormRequest;
use DB;


class ViaturaController extends Controller
{
    public function __construct(){
        //
    }

    public function index(Request $request){
        
        if($request){
            $query = trim($request->get('searchText'));            
            $viaturasEncontradas = DB::table('viatura as vtr')
            ->join('modelo as mod', 'vtr.idModelo', '=', 'mod.id')
            ->join('marca', 'mod.idMarca', '=', 'marca.id')
            ->join('unidade as unid', 'vtr.idUnidade', '=', 'unid.id')
            ->join('proprietario as prop', 'vtr.idProprietario', '=', 'prop.id')
            ->select(
                'vtr.id',
                'vtr.chassi',
                'vtr.placa',
                'vtr.prefixo',
                'vtr.ano',
                'vtr.aquisicao',
                'vtr.isOperant',
                'vtr.isActive',
                'vtr.observacoes',
                'vtr.recebimento',
                'vtr.baixa',
                'vtr.efetivo',
                'mod.descricao as descricaoModelo',
                'marca.descricao as descricaoMarca',
                'unid.sigla as siglaUnidade',
                'prop.nome as nomeProprietario'
            )
            ->where('vtr.placa', 'LIKE', "%".$query.'%')            
            ->where('vtr.isActive', '=', 1)            
            ->orderBy('vtr.id', 'asc')
            ->paginate(7);


            return view('viatura.index', [
                "listaViaturas" => $viaturasEncontradas, 
                "searchText" => $query
            ]);
        }
    }

    public function create(){
        $modelos = DB::table('modelo as modelo')
        ->join('marca as marca', 'modelo.idMarca', '=', 'marca.id')            
        ->select(
            'modelo.id',
            'modelo.descricao',                
            'marca.descricao as descricaoMarca'               
        )        
        ->orderBy('marca.descricao', 'asc')
        ->orderBy('modelo.descricao', 'asc')
        ->get();
        
        $unidades = DB::table('unidade')
            ->orderBy('sigla', 'asc')
            ->get();
        
        $proprietarios = DB::table('proprietario')
            ->orderBy('nome', 'asc')
            ->get();
        
        return view("viatura.create",[
            "modelos"=>$modelos,
            "unidades"=>$unidades,
            "proprietarios"=>$proprietarios
            ]
        );
    }

    public function store(ViaturaFormRequest $request){
        $viatura = new Viatura;        
        $viatura->chassi = strtoupper($request->get('chassi'));
        $viatura->placa = strtoupper($request->get('placa'));
        $viatura->prefixo = strtoupper($request->get('prefixo'));
        $viatura->ano = $request->get('ano');
        $viatura->aquisicao = $request->get('aquisicao');
        $viatura->isOperant = $request->get('isOperant');        
        $viatura->observacoes = $request->get('observacoes');
        $viatura->recebimento = $request->get('recebimento');
        $viatura->efetivo = $request->get('efetivo');
        $viatura->idModelo = $request->get('idModelo');
        $viatura->idProprietario = $request->get('idProprietario');
        $viatura->idUnidade = $request->get('idUnidade');
        $viatura->save();

        return Redirect::to('viatura');
    }

    public function show($id){
        return view("modelo.show", 
            ["modelo" => Modelo::findOrFail($id)]);
    }

    public function edit($id){

        $fabricantes = DB::table('marca')->orderBy('descricao','asc')->get();

        return view("modelo.edit", 
            [
                "fabricantes" => $fabricantes,
                "modelo" => Modelo::findOrFail($id)
            ]
        );
    }

    public function update(ModeloFormRequest $request, $id){
        $modelo = Modelo::findOrFail($id);        
        $modelo->descricao = $request->get('descricao');
        $modelo->idMarca = $request->get('idMarca');
        $modelo->update();
        return Redirect::to('modelo');
    }

    public function destroy($id){
        $modelo = Modelo::findOrFail($id);        
        $modelo->delete();
        return Redirect::to('modelo');
    }
}
