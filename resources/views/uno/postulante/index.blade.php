@extends ('layouts.admin')
@section ('contenido')

<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 -col-xs-12">	
		<h3><strong>Listado de Postulantes</strong></h3> 
	</div>
	<div class="col-lg-12 col-md-12 col-sm-12 -col-xs-12"> 
		<div style="padding-bottom: 8px;float: right;">
		@if(Auth::user()->tipo_user == 1) 
		
		<a href="postulante/create"><button class="btn btn-defaultd"><span data-toggle="tooltip" title class="badge bg-light-blue" data-original-title="Nuevo registro">+</span> Nuevo</button></a> 
		@endif
		<a href="{{url('reportepostulantes')}}" target="_blank"><button class="btn btn-primary"><span data-toggle="tooltip" title class="badge bg-yellow" data-original-title="Nuevo reporte"><i class="fa fa-file-text-o"></i></span>Reporte</button></a>
		</div>
		</div>
		<!--@include('uno.postulante.search')-->
	
</div>





<div class="box box-solid box-primary">
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm12 col-xs-12">
		<div class="table-responsive"> 
		<div class="box-body"> 
			<table class="table table-bordered table-striped" id="general">
				<thead>
					<tr style="background-color:#263238;color: #fff;" >
					<th><i>Id</i></th>
					<th><i>Ci</i></th>
					<th><i>Nombre</i></th>
					<th><i>Modalidad</i></th>
					<th><i>Direccion</i></th>
					<th><i>Email</i></th>
					<th><i>Estado</i></th>
					@if(Auth::user()->tipo_user == 1) 
					<th><i>Accion</i></th>
					@endif
					</tr>
				</thead>
				@foreach ($postulantes as $pos)
				<tr>
					<td>{{ $pos->idpostulante}}</td>
					<td>{{ $pos->ci}}</td>
					<td>{{ $pos->nombresapellidos}}</td>
					<td>{{ $pos->modalidad}}</td>
					<td>{{ $pos->direccion}}</td>
					<td>{{ $pos->email}}</td>
					<td>{{ $pos->estado}}</td>
						@if(Auth::user()->tipo_user == 1) 
					<td>
						<a href="{{URL::action('PostulanteController@edit',$pos->idpostulante)}}"><button data-toggle="tooltip" title data-original-title="Editar el registro" class="btn bg-navy btn-xs">Editar</button></a>
                        <a href="" data-target="#modal-delete-{{$pos->idpostulante}}" data-toggle="modal"><button data-toggle="tooltip" title data-original-title="Eliminar el registro" class="btn btn-danger btn-xs">Eliminar</button></a>
					
					</td>
					@endif
				</tr>
				@include('uno.postulante.modal')
				@endforeach
			</table>
			</div>
		</div>

	
	</div>
</div>
</div>


@endsection