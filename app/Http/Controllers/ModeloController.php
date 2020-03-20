<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modelo;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ModeloFormRequest;
use DB;


class ModeloController extends Controller
{
    public function __construct(){
        //
    }

    public function index(Request $request){
        
        if($request){
            $query = trim($request->get('searchText'));            
            $modelosEncontrados = DB::table('modelo as mod')
            ->join('marca as fab', 'mod.idMarca', '=', 'fab.id')            
            ->select(
                'mod.id',
                'mod.descricao',                
                'fab.descricao as descricaoFabricante'               
            )
            ->where('mod.descricao', 'LIKE', "%".$query.'%')            
            ->orderBy('mod.id', 'asc')
            ->paginate(7);


            return view('modelo.index', [
                "listaModelos" => $modelosEncontrados, 
                "searchText" => $query
            ]);
        }
    }

    public function create(){
        $fabricantes = DB::table('marca')->orderBy('descricao','asc')->get();
        return view("modelo.create",[
            "fabricantes"=>$fabricantes
            ]
        );
    }

    public function store(ModeloFormRequest $request){
        $modelo = new Modelo;        
        $modelo->descricao = $request->get('descricao');
        $modelo->idMarca = $request->get('idMarca');
        $modelo->save();

        return Redirect::to('modelo');
    }

    public function show($id){
        return view("modelo.show", 
            ["modelo" => Modelo::findOrFail($id)]);
    }

    public function edit($id){

        $unidades = DB::table('unidade')->where('isActive',1)->where('id','!=',$id)->orderBy('sigla','asc')->get();

        return view("unidade.edit", 
            [
                "unidades" => $unidades,
                "unidade" => Unidade::findOrFail($id)
            ]
        );
    }

    public function update(UnidadeFormRequest $request, $id){
        $unidade = Unidade::findOrFail($id);
        $unidade->sigla = $request->get('sigla');
        $unidade->descricao = $request->get('descricao');
        $unidade->idUnidadeSuperior = $request->get('idUnidadeSuperior');
        $unidade->update();
        return Redirect::to('unidade');
    }

    public function destroy($id){
        $unidade = Unidade::findOrFail($id);
        $unidade->isActive = 0;
        $unidade->update();
        //Caso queira realmente deletar o registro do banco, use o método DELETE()
        //$fabricante->delete();
        return Redirect::to('unidade');
    }
}
