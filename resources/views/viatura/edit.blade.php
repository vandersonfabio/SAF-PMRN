@extends('layouts.admin')
@section('conteudo')
<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Modelo: <b> {{ $modelo->descricao }}</b></h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::model($modelo, ['method'=>'PATCH', 'route'=>['modelo.update', $modelo->id]])!!}
			{{Form::token()}}

            <div class="form-group">
                <label for="idMarca">Fabricante</label>
				<select class="form-control" name="idMarca">
                <option value = "">-- Selecione um fabricante</option>
					@foreach ($fabricantes->all() as $fab)
                        <option 
							value = "{{ $fab->id }}"
							@if ($fab->id == $modelo->idMarca)
        						selected="selected"
							@endif>
								{{$fab->descricao}}
						</option>
					@endforeach
				</select>
			</div>

            <div class="form-group">
            	<label for="descricao">Descrição</label>
            	<input type="text" name="descricao" value="{{$modelo->descricao}}" class="form-control" placeholder="Modelo do veículo...">
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