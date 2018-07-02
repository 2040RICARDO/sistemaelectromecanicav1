@extends ('layouts.admin')
@section ('contenido')

<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 -col-xs-12">	
		<h3><strong>Listado de Docentes/Tutores</strong></h3>
	</div>
	<div class="col-lg-12 col-md-12 col-sm-12 -col-xs-12">
	<div style="padding-bottom: 8px;float: right;"> 
		@if(Auth::user()->tipo_user == 1)
		<a href="docente/create"><button class="btn btn-warningd"> <span data-toggle="tooltip" title class="badge bg-light-blue" data-original-title="Nuevo registro">+</span> Nuevo </button></a>
		@endif
		<a href="{{url('reportedocentes')}}" target="_blank"><button class="btn btn-primary"><span data-toggle="tooltip" title class="badge bg-yellow" data-original-title="Nuevo reporte"><i class="fa fa-file-text-o"></i></span> Reporte</button></a>
		</div>
		</div>
	
		<!--@include('uno.docente.search')-->
	
</div>

<div class="box box-solid box-primary">
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm12 col-xs-12">
		<div class="table-responsive"> 
		<div class="box-body"> 
			<table class="table table-bordered table-striped sorting_desc" id="general">
				<thead>
					<tr style="background-color:#263238;color: #fff;" >
					<th ><i>Id</i></th>
					<th><i>Nombre</i></th>
					<th><i>Direccion</i></th>
					<th><i>Celular</i></th>
					<th><i>Especialidad</i></th>
					@if(Auth::user()->tipo_user == 1) 
					<th><i>Accion</i></th>
					@endif
					</tr>	
				</thead>
				<tbody>
				@foreach ($docentes as $doc)
				<tr>
					<td>{{ $doc->iddocente}}</td>
					<td>{{ $doc->nombre}}</td>
					<td>{{ $doc->direccion}}</td>
					<td>{{ $doc->celular}}</td>
					<td>{{ $doc->especialidad}}</td>
					@if(Auth::user()->tipo_user == 1) 
					<td>
						<a href="{{URL::action('DocenteController@edit',$doc->iddocente)}}"><button data-toggle="tooltip" title data-original-title="Editar el registro"  class="btn bg-navy btn-xs">editar</button></a>
                        <a href="" data-target="#modal-delete-{{$doc->iddocente}}" data-toggle="modal"><button data-toggle="tooltip" title data-original-title="Eliminar el registro" class="btn btn-danger btn-xs">Eliminar</button></a>
					
					</td>
					@endif
				</tr>
				@include('uno.docente.modal')
				@endforeach
				</tbody>
			</table>
			</div>
		</div>
		
	
	</div>
</div>
</div>

@endsection