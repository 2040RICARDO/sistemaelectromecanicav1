@extends ('layouts.admin')
@section ('contenido')

<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 -col-xs-12">	
		<h3><strong>Listado de Actas de Calificación</strong></h3>
	</div>	
		<div class="col-lg-12 col-md-12 col-sm-12 -col-xs-12"> 
		<div style="padding-bottom: 8px;float: right;">
		@if(Auth::user()->tipo_user == 1)  
		<a href="acta_defensa/create"><button class="btn btn-succes"> <span data-toggle="tooltip" title class="badge bg-light-blue" data-original-title="Nuevo registro">+</span> Nuevo</button></a> 
		@endif
		<a href="{{url('reporteacta_defensas')}}" target="_blank"><button class="btn btn-primary"><span data-toggle="tooltip" title class="badge bg-yellow" data-original-title="Nuevo reporte"><i class="fa fa-file-text-o"></i></span>Reporte</button></a></h3>
		<!--@include('uno.acta_defensa.search')-->
			</div>
		</div>
</div>


<div class="box box-solid box-primary" >
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm12 col-xs-12">
		<div class="table-responsive">
		<div class="box-body"> 
			<table id="example1" class="table table-bordered table-striped">
				<thead>
				<tr style="background-color:#263238;color: #fff;" >
					<th><i>Id</i></th>
					<th><i>Postulante</i></th>
					<th><i>Tema Perfil</i></th>
					<th><i>Fecha</i></th>
					<th><i>Modalidad</i></th>
					<th><i>Puntaje</i></th>
					<th><i>Valoracion</i></th>
					<th><i>Obs/Recom.</i></th>
					<th><i>Opciones</i></th>
				</tr>
				</thead>
				@foreach ($acta_defensas as $ad)
				<tr>
					<td>{{ $ad->idacta_defensa}}</td>
					<td>{{ $ad->postulante}}</td>
					<td>{{ $ad->tema_perfil}}</td>
					<td>{{ $ad->fecha_defensa}}</td>
					<td>{{ $ad->modalidad}}</td>
					<td>{{ $ad->puntaje}}</td>
					<td>{{ $ad->valoracion}}</td>
					<td>{{ $ad->obs_recomendaciones}}</td>
					<td>
						@if(Auth::user()->tipo_user == 1) 
						<a href="{{URL::action('ActadefensaController@edit',$ad->idacta_defensa)}}"><button data-toggle="tooltip" title data-original-title="Editar el registro" class="btn bg-navy btn-xs">Editar</button></a>
						<p></p>
                       <a href="" data-target="#modal-delete-{{$ad->idacta_defensa}}" data-toggle="modal"><button  data-toggle="tooltip" title data-original-title="Cambiar estado de registro" class="btn btn-danger btn-xs">Opcion</button></a>
                       @endif
						<p></p>
						<a target="_blank" href="{{URL::action('ActadefensaController@reportec',$ad->idacta_defensa)}}"><button  data-toggle="tooltip" title data-original-title="Generar acta de defensa" class="btn btn-info btn-xs ">Reporte</button></a>
					
					</td>
				</tr>
				@include('uno.acta_defensa.modal')
				@endforeach
			</table>
			</div>
		</div>
		
	
	</div>
</div>
</div>

@endsection