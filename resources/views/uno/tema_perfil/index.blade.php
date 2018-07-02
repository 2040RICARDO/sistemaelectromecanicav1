@extends ('layouts.admin')
@section ('contenido')
<ul class="nav nav-tabs">
<li class="active">
		<a href="#gererallista" data-toggle="tab">General</a>
	</li>
	<li>
		<a href="#tema1" data-toggle="tab" >Vigente</a>
	</li>
	<li>
		<a href="#tema2" data-toggle="tab">Defendido</a>
	</li>
	<li>
		<a href="#tema3" data-toggle="tab">Vencidos</a>
	</li>

</ul>
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 -col-xs-12">	
		<h3><strong>Listado de Temas de Perfil</strong></h3> 
	</div>
	<div class="col-lg-12 col-md-12 col-sm-12 -col-xs-12"> 
		<div style="padding-bottom: 8px;float: right;">
		@if(Auth::user()->tipo_user == 1) 
		<a href="tema_perfil/create"><button class="btn btn-succes"><span data-toggle="tooltip" title class="badge bg-light-blue" data-original-title="Nuevo registro">+</span> Nuevo</button></a>
		@endif 
		<a href="{{url('vista_reporte_perfil')}}" ><button class="btn btn-primary"><span data-toggle="tooltip" title class="badge bg-yellow" data-original-title="Nuevo reporte"><i class="fa fa-file-text-o"></i></span>Reporte</button></a> 
		</div>
		</div>
</div>


<div class="box box-solid box-primary">
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm12 col-xs-12">
		<div class="table-responsive">
		<div class="tab-content"> 
		<div class="tab-pane active" id="gererallista">
		<div class="box-body"> 
			<table class="table table-bordered table-striped" id="general">
				<thead>
				<tr style="background-color:#263238;color: #fff;">
					<th><i>Id</i></th>
					<th><i>Titulo Tema</i></th>
					<th><i>Modalidad</i></th>
					<th><i>Postulante</i></th>
					<th><i>Tutor</i></th>
					<th><i>Obs</i></th>
					<th><i>Fecha_Apro</i></th>
					<th><i>Fecha_Limite</i></th>

					<th><i>Estado</i></th>
					@if(Auth::user()->tipo_user == 1) 
					<th><i>Accion</i></th>
					@endif
					</tr>
				</thead>
				@foreach ($tema_general as $general)
				<tr>
					<td>{{ $general->idtema_perfil}}</td>
					<td>{{ $general->titulo_tema}}</td>
					<td>{{ $general->modalidad}}</td>
					<td>{{ $general->nombresapellidos}}</td>
					<td>{{ $general->nombre}}</td>
					<td>{{ $general->observacion}}</td>
					<td>{{ $general->fecha_aprobacion}}</td>
					@if($general->fecha_limite > $date)
					<td><span class="label label-primary">{{ $general->fecha_limite}}</span></td>
					@else
					<td><span class="label label-danger">{{ $general->fecha_limite}}</span></td>
					@endif
					@if($general->estados == "vigente")
						<td><span class="label label-info">{{ $general->estados}}</span></td>
					@elseif($general->estados == "defendido")
						<td><span class="label label-warning">{{ $general->estados}}</span></td>
					@elseif($general->estados == "vencido")
						<td><span class="label label-danger">{{ $general->estados}}</span></td>
					@endif

					@if(Auth::user()->tipo_user == 1) 
					<td>
					<a href="{{URL::action('TemaperfilController@edit',$general->idtema_perfil)}}"><button data-toggle="tooltip" title data-original-title="Editar el registro" class="btn bg-navy btn-xs">Editar</button></a>
					@if($general->asignaciontribunal == 0)
					<a href="{{ url('asignartribunal',$general->idtema_perfil)}}"><button data-toggle="tooltip" title data-original-title="Editar el registro" class="btn btn-success btn-xs">Tribunal</button></a>
					@elseif($general->asignaciontribunal == 1)
					<a href=""><button data-toggle="tooltip" title data-original-title="Editar el registro" class="btn btn-success btn-xs" disabled>Tribunal</button></a>
					@endif
					</td>
					@endif
				
				</tr>
				@endforeach
			</table>
			</div>
			</div>




		<div class="tab-pane" id="tema1">
		<div class="box-body"> 
			<table class="table table-bordered table-stripe" id="myTabla1">
				<thead>
				<tr style="background-color:#263238;color: #fff;">
					<th><i>Id</i></th>
					<th><i>Titulo Tema</i></th>
					<th><i>Modalidad</i></th>
					<th><i>Postulante</i></th>
					<th><i>Tutor</i></th>
					<th><i>Obs</i></th>
					<th><i>Fecha_Apro</i></th>
					<th><i>Fecha_Limite</i></th>
					<th><i>Estado</i></th>
					@if(Auth::user()->tipo_user == 1) 
					<th><i>Accion</i></th>
					@endif
					</tr>
				</thead>
				
				@foreach ($tema_vigente as $vigente)
				<tr>
					<td>{{ $vigente->idtema_perfil}}</td>
					<td>{{ $vigente->titulo_tema}}</td>
					<td>{{ $vigente->modalidad}}</td>
					<td>{{ $vigente->nombresapellidos}}</td>
					<td>{{ $vigente->nombre}}</td>
					<td>{{ $vigente->observacion}}</td>
					<td>{{ $vigente->fecha_aprobacion}}</td>
					@if($vigente->fecha_limite > $date)
					<td><span class="label label-primary">{{ $vigente->fecha_limite}}</span></td>
					@else
					<td><span class="label label-danger">{{ $vigente->fecha_limite}}</span></td>
					@endif
					<td><span class="label label-info">{{ $vigente->estados}}</span></td>
					
					@if(Auth::user()->tipo_user == 1) 
					<td>
						<a href="{{URL::action('TemaperfilController@edit',$vigente->idtema_perfil)}}"><button class="btn bg-navy btn-xs">Editar</button></a>
						<p></p>
						<a href="" data-target="#modal-vigente-{{$vigente->idtema_perfil}}" data-toggle="modal"><button class="btn btn-danger btn-xs">Opcion</button></a>
					
					</td>
					@endif
				</tr>
				@include('uno.tema_perfil.modalvigente')
				@endforeach
			</table>
			</div>
			</div>
			
			<div class="tab-pane" id="tema2">
			<div class="box-body"> 
			<table class="table table-bordered table-stripe" id="myTabla2">
				<thead>
				<tr style="background-color:#263238;color: #fff;">
					<th><i>Id</i></th>
					<th><i>Titulo Tema</i></th>
					<th><i>Modalidad</i></th>
					<th><i>Postulante</i></th>
					<th><i>Tutor</i></th>
					<th><i>Obs</i></th>
					<th><i>Fecha_Apro</i></th>
					<th><i>Fecha_Limite</i></th>
					<th><i>Estado</i></th>
					@if(Auth::user()->tipo_user == 1) 
					<th><i>Accion</i></th>
					@endif
					</tr>
				</thead>
				@foreach ($tema_defendido as $defendido)
				<tr>
					<td>{{ $defendido->idtema_perfil}}</td>
					<td>{{ $defendido->titulo_tema}}</td>
					<td>{{ $defendido->modalidad}}</td>
					<td>{{ $defendido->nombresapellidos}}</td>
					<td>{{ $defendido->nombre}}</td>
					<td>{{ $defendido->observacion}}</td>
					<td>{{ $defendido->fecha_aprobacion}}</td>
					@if($defendido->fecha_limite > $date)
					<td><span class="label label-primary">{{ $defendido->fecha_limite}}</span></td>
					@else
					<td><span class="label label-danger">{{ $defendido->fecha_limite}}</span></td>
					@endif
					<td><span class="label label-warning">{{ $defendido->estados}}</span></td>
					
					@if(Auth::user()->tipo_user == 1) 
					<td>
						<a href="{{URL::action('TemaperfilController@edit',$defendido->idtema_perfil)}}"><button class="btn bg-navy btn-xs">Editar</button></a>
						<p></p>
						<a href="" data-target="#modal-defendido-{{$defendido->idtema_perfil}}" data-toggle="modal"><button class="btn btn-danger btn-xs">Opcion</button></a>
					
					</td>
					@endif
				</tr>
				@include('uno.tema_perfil.modaldefendido')
				@endforeach
			</table>
			</div>
			</div>
	
			<div class="tab-pane" id="tema3">
			<div class="box-body"> 
			<table class="table table-bordered table-stripe" id="myTabla3">
				<thead>
				<tr style="background-color:#263238;color: #fff;">
					<th><i>Id</i></th>
					<th><i>Titulo Tema</i></th>
					<th><i>Modalidad</i></th>
					<th><i>Postulante</i></th>
					<th><i>Tutor</i></th>
					<th><i>Obs</i></th>
					<th><i>Fecha_Apro</i></th>
					<th><i>Fecha_Limite</i></th>
					<th><i>Estado</i></th>
					@if(Auth::user()->tipo_user == 1) 
					<th><i>Accion</i></th>
					@endif
				</thead>
				</tr>
				@foreach ($tema_vencido as $vencido)
				<tr>
					<td>{{ $vencido->idtema_perfil}}</td>
					<td>{{ $vencido->titulo_tema}}</td>
					<td>{{ $vencido->modalidad}}</td>
					<td>{{ $vencido->nombresapellidos}}</td>
					<td>{{ $vencido->nombre}}</td>
					<td>{{ $vencido->observacion}}</td>
					<td>{{ $vencido->fecha_aprobacion}}</td>
					@if($vencido->fecha_limite > $date)
					<td><span class="label label-primary">{{ $vencido->fecha_limite}}</span></td>
					@else
					<td><span class="label label-danger">{{ $vencido->fecha_limite}}</span></td>
					@endif
					<td><span class="label label-danger">{{ $vencido->estados}}</span></td>
					
					@if(Auth::user()->tipo_user == 1) 
					<td>
						<a href="{{URL::action('TemaperfilController@edit',$vencido->idtema_perfil)}}"><button class="btn bg-navy btn-xs">Editar</button></a>
						<p></p>
						<a href="" data-target="#modal-vencido-{{$vencido->idtema_perfil}}" data-toggle="modal"><button class="btn btn-danger btn-xs">Opcion</button></a>
					
					</td>
					@endif
				</tr>
				@include('uno.tema_perfil.modalvencido')
				@endforeach
			</table>
			</div>
			</div>
			
		</div>
		</div>
		
	
	</div>
</div>
</div>

@endsection