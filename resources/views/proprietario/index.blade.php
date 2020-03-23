@extends('layouts.admin');
@section('conteudo')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Lista de Proprietários <a href="proprietario/create"><button class="btn btn-success">Novo</button></a></h3>
		@include('proprietario.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Id</th>                    
					<th>Descrição</th>
                    <th>CNPJ</th>
                    <th>Opções</th>
				</thead>
               @foreach ($listaProprietarios as $prop)
				<tr>
					<td>{{ $prop->id}}</td>                    
                    <td>{{ $prop->nome}}</td>
					<td>{{ $prop->cnpj}}</td>
					<td>
						<a href="{{URL::action('ProprietarioController@edit',$prop->id)}}"><button class="btn btn-info">Editar</button></a>
                         <a href="" data-target="#modal-delete-{{$prop->id}}" data-toggle="modal"><button class="btn btn-danger">Excluir</button></a>
					</td>
				</tr>
				@include('proprietario.modal')
				@endforeach
			</table>
		</div>
		{{$listaProprietarios->render()}}
	</div>
</div>
@stop