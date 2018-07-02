<div class="modal fade modal-slide-in-right" aria-hidden="true"
role="dialog" tabindex="-1" id="modal-backup">
	
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" 
				aria-label="Close">
                     <span aria-hidden="true">x</span>
                </button>
                <h4 class="modal-title">Restaurar Copia de seguridad</h4>
			</div>
			<div class="modal-body">
				<p>Esta seguro de restaurar la copia de seguridad</p>
				
				
			</div>
			<div class="modal-footer">
			<a href="{{ url('backup/download/'.$file['nombre']) }}" class="btn btn-success">Confirmar</a>
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
			</div>
		</div>
	</div>
</div>
