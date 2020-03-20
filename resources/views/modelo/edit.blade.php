@extends('layouts.admin')
@section('conteudo')
<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Unidade: <b> {{ $unidade->sigla }}</b></h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::model($unidade, ['method'=>'PATCH', 'route'=>['unidade.update', $unidade->id]])!!}
			{{Form::token()}}
                        
            <div class="form-group">
            	<label for="sigla">Sigla</label>
            	<input type="text" name="sigla" value="{{$unidade->sigla}}" class="form-control" placeholder="Sigla da unidade...">
            </div>
            
            <div class="form-group">
            	<label for="descricao">Sigla</label>
            	<input type="text" name="descricao" value="{{$unidade->descricao}}" class="form-control" placeholder="Descrição da unidade...">
            </div>
            
			<div class="form-group">
                <label for="idUnidadeSuperior">Unidade Superior</label>
				<select class="form-control" name="idUnidadeSuperior">
					@foreach ($unidades->all() as $u)
					<option 
							value = "{{ $u->id }}"
							@if ($u->id == $unidade->idUnidadeSuperior)
        						selected="selected"
							@endif>
								{{$u->sigla}}
						</option>
					@endforeach
				</select>
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