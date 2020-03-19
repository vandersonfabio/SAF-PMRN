<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Unidade;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\UnidadeFormRequest;
use DB;


class UnidadeController extends Controller
{
    public function __construct(){
        //
    }

    public function index(Request $request){
        
        if($request){
            $query = trim($request->get('searchText'));            
            $unidadesEncontradas = DB::table('unidade as u')
            ->leftJoin('unidade as uPai', 'u.id_unidade_superior', '=', 'uPai.id')            
            ->select(
                'u.id',
                'u.sigla',
                'u.descricao',                
                'uPai.sigla as siglaUnidadeSuperior'               
            )
            ->where('u.descricao', 'LIKE', "%".$query.'%')
            ->where('u.is_active', 1)
            ->orderBy('u.id', 'asc')
            ->paginate(7);


            return view('unidade.index', [
                "listaUnidades" => $unidadesEncontradas, 
                "searchText" => $query
            ]);
        }
    }

    public function create(){
        return view("unidade.create");
    }

    public function store(UnidadeFormRequest $request){
        $unidade = new Unidade;
        $unidade->sigla = $request->get('sigla');
        $unidade->descricao = $request->get('descricao');
        $unidade->idUnidadeSuperior = $request->get('id_unidade_superior');
        $unidade->save();

        return Redirect::to('unidade');
    }

    public function show($id){
        return view("unidade.show", 
            ["unidade" => Unidade::findOrFail($id)]);
    }

    public function edit($id){

        $unidades = DB::table('unidade')->where('is_active',1)->where('id','!=',$id)->orderBy('sigla','asc')->get();

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
        $unidade->unidade_superior = $request->get('id_unidade_superior');
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
