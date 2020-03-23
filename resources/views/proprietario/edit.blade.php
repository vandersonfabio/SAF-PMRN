@extends('layouts.admin')
@section('conteudo')
<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Proprietário: <b> {{ $proprietario->nome }}</b></h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::model($proprietario, ['method'=>'PATCH', 'route'=>['proprietario.update', $proprietario->id]])!!}
			{{Form::token()}}           
            
            <div class="form-group">
            	<label for="nome">Nome</label>
            	<input type="text" name="nome" value="{{$proprietario->nome}}" class="form-control" placeholder="Nome do proprietário...">
            </div>
            
            <div class="form-group">
            	<label for="cnpj">CNPJ</label>
            	<input type="text" name="cnpj" value="{{$proprietario->cnpj}}" class="form-control" placeholder="CNPJ do proprietário...">
			</div>				            

            <div class="form-group">
            	<button class="btn btn-primary" type="submit">Salvar</button>
            	<button class="btn btn-cancel" type="reset">Desfazer</button>
                <button class="btn btn-danger" type="button" onClick="history.go(-1)">Cancelar</button>
            </div>

			{!!Form::close()!!}		
            
		</div>
	</div>
@stop