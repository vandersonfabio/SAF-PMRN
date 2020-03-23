@extends('layouts.admin');
@section('conteudo')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listagem de Viaturas <a href="viatura/create"><button class="btn btn-success">Cadastrar nova</button></a></h3>
		@include('viatura.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Id</th>
                    <th>Placa</th>
                    <th>Prefixo</th>
					<th>Marca / Modelo</th>
                    <th>Chassi</th>
                    <th>Unidade</th>
                    <th>Opções</th>				
				</thead>
               @foreach ($listaViaturas as $viatura)
				<tr>
					<td>{{ $viatura->id}}</td>
					<td>{{ $viatura->placa}}</td>
                    <td>{{ $viatura->prefixo}}</td>
                    <td>{{ $viatura->descricaoMarca}}/{{ $viatura->descricaoModelo}}</td>
                    <td>{{ $viatura->chassi}}</td>
                    <td>{{ $viatura->siglaUnidade}}</td>
					<td>
                        <a href="" data-target="#modal-info-{{$viatura->id}}" data-toggle="modal"><button class="btn btn-alert">Info</button></a>
                        <a href="{{URL::action('ViaturaController@edit',$viatura->id)}}"><button class="btn btn-info">Editar</button></a>                        
                        <a href="" data-target="#modal-delete-{{$viatura->id}}" data-toggle="modal"><button class="btn btn-danger">Excluir</button></a>
					</td>
				</tr>
				@include('viatura.modal')
				@endforeach
			</table>
		</div>
		{{$listaViaturas->render()}}
	</div>
</div>
@stop