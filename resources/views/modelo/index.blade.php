@extends('layouts.admin');
@section('conteudo')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Lista de Modelos <a href="modelo/create"><button class="btn btn-success">Novo</button></a></h3>
		@include('modelo.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Id</th>                    
					<th>Fabricante</th>
                    <th>Modelo</th>                    
                    <th>Opções</th>				
				</thead>
               @foreach ($listaModelos as $modelo)
				<tr>
					<td>{{ $modelo->id}}</td>                    
                    <td>{{ $modelo->descricaoFabricante}}</td>
					<td>{{ $modelo->descricao}}</td>
					<td>
						<a href="{{URL::action('ModeloController@edit',$modelo->id)}}"><button class="btn btn-info">Editar</button></a>
                         <a href="" data-target="#modal-delete-{{$modelo->id}}" data-toggle="modal"><button class="btn btn-danger">Excluir</button></a>
					</td>
				</tr>
				@include('modelo.modal')
				@endforeach
			</table>
		</div>
		{{$listaModelos->render()}}
	</div>
</div>
@stop