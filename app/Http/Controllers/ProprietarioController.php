<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Proprietario;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ProprietarioFormRequest;
use DB;

class ProprietarioController extends Controller
{
    public function __construct(){
        //
    }

    public function index(Request $request){
        
        if($request){
            $query = trim($request->get('searchText'));            
            $proprietariosEncontrados = DB::table('proprietario as prop')            
            ->select(
                'prop.id',
                'prop.nome',                
                'prop.cnpj'
            )
            ->where('prop.nome', 'LIKE', "%".$query.'%')            
            ->orderBy('prop.id', 'asc')
            ->paginate(7);


            return view('proprietario.index', [
                "listaProprietarios" => $proprietariosEncontrados, 
                "searchText" => $query
            ]);
        }
    }

    public function create(){        
        return view("proprietario.create",[           
            ]
        );
    }

    public function store(ProprietarioFormRequest $request){
        $proprietario = new Proprietario;        
        $proprietario->nome = $request->get('nome');
        $proprietario->cnpj = $request->get('cnpj');
        $proprietario->save();

        return Redirect::to('proprietario');
    }

    public function show($id){
        return view("proprietario.show", 
            ["proprietario" => Proprietario::findOrFail($id)]);
    }

    public function edit($id){
        return view("proprietario.edit", 
            [                
                "proprietario" => Proprietario::findOrFail($id)
            ]
        );
    }

    public function update(ProprietarioFormRequest $request, $id){
        $proprietario = Proprietario::findOrFail($id);        
        $proprietario->nome = $request->get('nome');
        $proprietario->cnpj = $request->get('cnpj');
        $proprietario->update();
        return Redirect::to('proprietario');
    }

    public function destroy($id){
        $proprietario = Proprietario::findOrFail($id);        
        $proprietario->delete();
        return Redirect::to('proprietario');
    }
}