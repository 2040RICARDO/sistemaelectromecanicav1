<div class="modal fade modal-slide-in-right" aria-hidden="true"
role="dialog" tabindex="-1" id="modal-vencido-{{$vencido->idtema_perfil}}">
	
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" 
				aria-label="Close">
                     <span aria-hidden="true">x</span>
                </button>
                <h4 class="modal-title"><strong>Cambiar estado de perfil</strong></h4>
			</div>
			<div class="modal-body">
				<p>Selecione un estado</p>
				{{Form::Open(array('action'=>array('TemaperfilController@destroy',$vencido->idtema_perfil),'method'=>'delete'))}}
				<button type="submit" class="btn btn-warning">Vigente</button>
	           {{Form::Close()}}
				<a href="{{ route('tema.show',$vencido->idtema_perfil) }}" class="btn btn-success">Defendido</a>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
			</div>
		</div>
	</div>
</div>
