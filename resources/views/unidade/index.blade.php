@extends('layouts.admin');
@section('conteudo')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Lista de Unidades <a href="unidade/create"><button class="btn btn-success">Nova</button></a></h3>
		@include('unidade.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Id</th>
                    <th>Sigla</th>
					<th>Descrição</th>
                    <th>Unidade Superior</th>                    
                    <th>Opções</th>				
				</thead>
               @foreach ($listaUnidades as $unid)
				<tr>
					<td>{{ $unid->id}}</td>
                    <td>{{ $unid->sigla}}</td>
                    <td>{{ $unid->descricao}}</td>
					<td>{{ $unid->siglaUnidadeSuperior}}</td>
					<td>
						<a href="{{URL::action('UnidadeController@edit',$unid->id)}}"><button class="btn btn-info">Editar</button></a>
                         <a href="" data-target="#modal-delete-{{$unid->id}}" data-toggle="modal"><button class="btn btn-danger">Excluir</button></a>
					</td>
				</tr>
				@include('unidade.modal')
				@endforeach
			</table>
		</div>
		{{$listaUnidades->render()}}
	</div>
</div>
@stop