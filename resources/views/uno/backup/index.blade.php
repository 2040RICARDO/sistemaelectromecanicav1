@extends ('layouts.admin')
@section ('contenido')

<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 -col-xs-12">	
		<h3><strong>Listado de Copias de seguridad</strong></h3>
	</div>
	<div class="col-lg-12 col-md-12 col-sm-12 -col-xs-12"> 
		<div style="padding-bottom: 8px;float: right;">
		@if(Auth::user()->tipo_user == 1) 
		<a href="backup/create"><button class="btn btn-succes"><span data-toggle="tooltip" title class="badge bg-light-blue" data-original-title="Nuevo backup">+</span> Nuevo</button></a>
		@endif
		
		</div>
	
	</div>
</div>

<div class="box box-solid box-primary">
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm12 col-xs-12">
		<div class="table-responsive"> 
		<div class="box-body"> 
			<table class="table table-bordered table-striped" id="general">
				<thead>
					<tr style="background-color:#263238;color: #fff;">
                        <th rowspan="1" colspan="1"><i>Número de copia</i></th>
                        <th rowspan="1" colspan="1"><i>Nombre copia de seguridad</i></th>
                        @if(Auth::user()->tipo_user == 1)
                        <th rowspan="1" colspan="1"><i>Restaurar</i></th>
                        @endif
                   </tr>
				</thead>
				<tbody>
					{{-- */ $rh = 1; /*--}} 
					@foreach($backups as $file)
					{{--*/ @$nombre = str_replace(' ','&nbsp;', $comensal->nombre) /*--}}  
					<tr role="row" class="odd">

						<td>{{ $rh }}</td>
						<td>{{ $file['nombre']}}</td>

						@if(Auth::user()->tipo_user == 1)
						<td class="text-right" >
							<!--<a class="btn btn-xs btn-default"
							href="{{ url('backup/download/'.$file['nombre']) }}"><i
							class="fa fa-cloud-download"></i> Restaurar</a>-->
							<a href="#" data-target="#modal-backup" data-toggle="modal" class="btn btn-xs btn-default" ><i
							class="fa fa-cloud-download" ></i> Restaurar</a>
																				



						</td>
						@endif
					</tr>
					{{-- */ $rh = $rh+1; /*--}} 
					@include('uno.backup.modal')
					@endforeach
				{{-- @foreach ($docentes as $doc)
				<tr>
					<td>{{ $doc->iddocente}}</td>
					<td>{{ $doc->nombre}}</td>
					<td>{{ $doc->direccion}}</td>
					<td>{{ $doc->especialidad}}</td>
					@if(Auth::user()->tipo_user == 1) 
					<td>
						<a href="{{URL::action('DocenteController@edit',$doc->iddocente)}}"><button class="btn bg-navy btn-xs">Editar</button></a>
                        <a href="" data-target="#modal-delete-{{$doc->iddocente}}" data-toggle="modal"><button class="btn btn-danger btn-xs">Eliminar</button></a>
					
					</td>
					@endif
				</tr>
				@include('uno.docente.modal')
				@endforeach --}}
				 </tbody>
			</table>
			</div>
		</div>
		
	
	</div>
</div>
</div>

@endsection