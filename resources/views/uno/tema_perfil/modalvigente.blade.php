<div class="modal fade modal-slide-in-right" aria-hidden="true"
role="dialog" tabindex="-1" id="modal-vigente-{{$vigente->idtema_perfil}}">
	
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
				<a href="{{ route('tema.edit',$vigente->idtema_perfil) }}" class="btn btn-info">Vencido</a>
				<a href="{{ route('tema.show',$vigente->idtema_perfil) }}" class="btn btn-success">Defendido</a>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
			</div>
		</div>
	</div>
</div>
