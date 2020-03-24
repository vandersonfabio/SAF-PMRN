@extends('layouts.admin');
@section('conteudo')
<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Cadastro de nova viatura</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::open(array('url'=>'viatura','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}                        
			

            <br><h4>Dados gerais do veículo</h4><hr>
			<div class="form-group">
                <label for="idModelo">Modelo</label>
				<select class="form-control" name="idModelo">
                <option >-- Selecione um modelo</option>
					@foreach ($modelos->all() as $mod)
						<option value = "{{ $mod->id }}">{{$mod->descricaoMarca}} - {{$mod->descricao}}</option>
					@endforeach
				</select>
			</div>

            <div class="form-group">
            	<label for="placa">Placa</label>
            	<input type="text" name="placa" class="form-control" placeholder="Placa do veículo...">
			</div>
            
            <div class="form-group">
                <label for="ano">Ano de fabricação</label>
                <input type="text" name="ano" class="form-control" placeholder="Ano de fabricação do veículo...">
            </div>

            <div class="form-group">
            	<label for="chassi">Chassi</label>
            	<input type="text" name="chassi" class="form-control" placeholder="Chassi do veículo...">
			</div>

            <br><h4>Dados sobre a aquisição do veículo</h4><hr>

            <div class="form-group">
                <label for="aquisicao">Aquisição</label>
				<select class="form-control" name="aquisicao">
                    <option disabled="disabled" selected="selected">>-- Selecione o tipo de aquisição</option>
					<option value = "Própria">Própria</option>
                    <option value = "Locada">Locada</option>
                    <option value = "Cedida">Cedida</option>                    
				</select>
			</div>

            <div class="form-group">
                <label for="idProprietario">Proprietário</label>
				<select class="form-control" name="idProprietario">
                <option disabled="disabled" selected="selected">>-- Selecione o proprietário do veículo</option>
					@foreach ($proprietarios->all() as $prop)
						<option value = "{{ $prop->id }}">{{$prop->nome}} ({{$prop->cnpj}})</option>
					@endforeach
				</select>
			</div>

            <br><h4>Dados sobre a alocação do veículo</h4><hr>

            <div class="form-group">
                <label for="idUnidade">Unidade</label>
				<select class="form-control" name="idUnidade">
                <option disabled="disabled" selected="selected">-- Selecione a unidade na qual o veículo está alocado</option>
					@foreach ($unidades->all() as $unid)
						<option value = "{{ $unid->id }}">{{$unid->sigla}}</option>
					@endforeach
				</select>
			</div>

            <div class="form-group">
            	<label for="prefixo">Prefixo</label>
            	<input type="text" name="prefixo" class="form-control" placeholder="Prefixo da viatura...">
			</div>

            <div class="form-group">
            	<label for="efetivo">Efetivo empregado na viatura</label>
            	<input type="text" name="efetivo" class="form-control" placeholder="Nº de homens ocupantes do veículo durante o serviço...">
			</div>

            <div class="form-group">
            	<label for="recebimento">Data do recebimento do veículo na unidade: </label>
            	<input type="date" id="recebimento" name="recebimento">
			</div>

            <div class="form-group">
                <label for="isOperant">Condição operacional do veículo</label>
				<select class="form-control" name="isOperant">
                    <option value = "">-- Selecione a condição do veículo</option>
					<option value = "1">Operante</option>
                    <option value = "0">Não operante (especificar motivo nas observações)</option>                    
				</select>
			</div>

            <div class="form-group">
            	<label for="observacoes">Observações:</label>
                </br>
            	<textarea id="observacoes" name="observacoes" rows="5" cols="102" placeholder="Insira, se necessário, observações sobre o veículo..."></textarea>
			</div>
            
            <div class="form-group">
            	<button class="btn btn-primary" type="submit">Salvar</button>
            	<button class="btn btn-danger" type="button" onClick="history.go(-1)">Cancelar</button>
            </div>

			{!!Form::close()!!}		
            
		</div>
	</div>
@stop