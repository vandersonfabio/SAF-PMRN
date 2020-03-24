<div class="modal fade modal-slide-in-right" aria-hidden="true"
role="dialog" tabindex="-1" id="modal-info-{{$viatura->id}}">
	{{Form::Open(array('action'=>array('ViaturaController@destroy',$viatura->id),'method'=>'delete'))}}
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" 
				aria-label="Close">
                     <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title">Dados sobre a Viatura - <b>{{ $viatura->prefixo}}</b></h4>
			</div>
			<div class="modal-body">
                <p>Placa : <b>{{ $viatura->placa}}</b></p>
                <p>Marca / Modelo : <b>{{ $viatura->descricaoMarca}} / {{ $viatura->descricaoModelo}}</b></p>
                <p>Chassi : <b>{{ $viatura->chassi}}</b></p>                
                <p>Ano : <b>{{ $viatura->ano}}</b></p>
                <p>Aquisição : <b>{{ $viatura->aquisicao}}</b></p>                
                <p>Propriedade de : <b>{{ $viatura->nomeProprietario}}</b></p>
                <p>Recebida em : <b><?php echo date("d/m/Y", strtotime($viatura->recebimento));?></b></p>
                <p>Unidade : <b>{{ $viatura->siglaUnidade}}</b></p>
                <p>Efetivo empregado : <b>{{ $viatura->efetivo}} policial (is)</b></p>
                <p>A viatura está operante? : <b><?php echo $viatura->isOperant == 1 ? "Sim" : "Não";  ?></b></p>
                <p>Observações : <b>{{ $viatura->observacoes}}</b></p>                
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
			</div>
		</div>
	</div>
	{{Form::Close()}}

</div>