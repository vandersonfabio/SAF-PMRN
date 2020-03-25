@extends('layouts.admin')
@section('conteudo')
<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Viatura: <b> {{ $viatura->prefixo }}</b></h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::model($viatura, ['method'=>'PATCH', 'route'=>['viatura.update', $viatura->id]])!!}
			{{Form::token()}}

            <br><h4>Dados gerais do veículo</h4><hr>
			<div class="form-group">
                <label for="idModelo">Modelo</label>
				<select class="form-control" name="idModelo">
                <option >-- Selecione um modelo</option>
					@foreach ($modelos->all() as $modelo)
						<option
                            value = "{{ $modelo->id }}"
                                @if ($modelo->id == $viatura->idModelo)
                                    selected="selected"
                                @endif>
                                    {{$modelo->descricaoMarca}} - {{$modelo->descricao}}
                        </option>
					@endforeach
				</select>
			</div>

            <div class="form-group">
            	<label for="placa">Placa</label>
            	<input type="text" name="placa" value="{{ $viatura->placa }}" class="form-control" placeholder="Placa do veículo...">
			</div>
            
            <div class="form-group">
                <label for="ano">Ano de fabricação</label>
                <input type="text" name="ano" value="{{ $viatura->ano }}" class="form-control" placeholder="Ano de fabricação do veículo...">
            </div>

            <div class="form-group">
            	<label for="chassi">Chassi</label>
            	<input type="text" name="chassi" value="{{ $viatura->chassi }}" class="form-control" placeholder="Chassi do veículo...">
			</div>

            <br><h4>Dados sobre a aquisição do veículo</h4><hr>

            <div class="form-group">
                <label for="aquisicao">Aquisição</label>
				<select class="form-control" name="aquisicao">
                    <option disabled="disabled">-- Selecione o tipo de aquisição</option>
					<option value = "Própria" @if($viatura->aquisicao == "Própria") selected="selected" @endif >Própria</option>
                    <option value = "Locada" @if($viatura->aquisicao == "Locada") selected="selected" @endif >Locada</option>
                    <option value = "Cedida" @if($viatura->aquisicao == "Cedida") selected="selected" @endif >Cedida</option>                    
				</select>
			</div>

            <div class="form-group">
                <label for="idProprietario">Proprietário</label>
				<select class="form-control" name="idProprietario">
                <option disabled="disabled" selected="selected">>-- Selecione o proprietário do veículo</option>
					@foreach ($proprietarios->all() as $prop)
                    <option
                        value = "{{ $prop->id }}"
                            @if ($prop->id == $viatura->idProprietario)
                                selected="selected"
                            @endif>
                                {{$prop->nome}} ({{$prop->cnpj}})
                    </option>
					@endforeach
				</select>
			</div>

            <br><h4>Dados sobre a alocação do veículo</h4><hr>

            <div class="form-group">
                <label for="idUnidade">Unidade</label>
				<select class="form-control" name="idUnidade">
                <option disabled="disabled" selected="selected">-- Selecione a unidade na qual o veículo está alocado</option>
					@foreach ($unidades->all() as $unid)
                        <option
                            value = "{{ $unid->id }}"
                                @if ($unid->id == $viatura->idUnidade)
                                    selected="selected"
                                @endif>
                                    {{$unid->sigla}}
                        </option>
					@endforeach
				</select>
			</div>

            <div class="form-group">
            	<label for="prefixo">Prefixo</label>
            	<input type="text" name="prefixo" value="{{ $viatura->prefixo }}" class="form-control" placeholder="Prefixo da viatura...">
			</div>

            <div class="form-group">
            	<label for="efetivo">Efetivo empregado na viatura</label>
            	<input type="text" name="efetivo" value="{{ $viatura->efetivo }}" class="form-control" placeholder="Nº de homens ocupantes do veículo durante o serviço...">
			</div>

            <div class="form-group">
            	<label for="recebimento">Data do recebimento do veículo na unidade: </label>
            	<input type="date" id="recebimento" value="{{ $viatura->recebimento }}" name="recebimento">
			</div>

            <div class="form-group">
                <label for="isOperant">Condição operacional do veículo</label>
				<select class="form-control" name="isOperant">
                    <option value = "">-- Selecione a condição do veículo</option>
					<option value = "1" @if($viatura->isOperant == 1) selected="selected" @endif >Operante</option>
                    <option value = "0" @if($viatura->isOperant == 0) selected="selected" @endif >Não operante (especificar motivo nas observações)</option>                    
				</select>
			</div>

            <div class="form-group">
            	<label for="observacoes">Observações:</label>
                </br>
            	<textarea id="observacoes" name="observacoes" value="{{ $viatura->observacoes }}" rows="5" cols="102" placeholder="Insira, se necessário, observações sobre o veículo..."></textarea>
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