@extends ('layouts.admin')
@section ('contenido')

<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 -col-xs-12">	
		<h3><strong>Listado de Tribunales</strong></h3>
	</div>
	<div class="col-lg-12 col-md-12 col-sm-12 -col-xs-12"> 
		<div style="padding-bottom: 8px;float: right;">	
		
		<a href="{{url('reportetribunals')}}" target="_blank"><button class="btn btn-primary"><span data-toggle="tooltip" title class="badge bg-yellow" data-original-title="Nuevo reporte"><i class="fa fa-file-text-o"></i></span>Reporte</button></a></h3>
		<!--@include('uno.tribunal.search')-->
	</div>
	</div>
</div>


<div class="box box-solid box-primary">
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm12 col-xs-12">
		<div class="table-responsive"> 
		<div class="box-body"> 
			<table class="table table-bordered table-stripe" id="general">
				<thead>
				<tr style="background-color:#263238;color: #fff;">
					<th><i>Id</i></th>
					<th><i>Postulante</i></th>
					<th><i>Tema Perfil</i></th>
					<th><i>Tribunal 1</i></th>
					<th><i>Tribunal 2</i></th>
					<th><i>Tribunal 3</i></th>
					@if(Auth::user()->tipo_user == 1) 
					<th><i>Accion</i></th>
					@endif
					</tr>
				</thead>
				@foreach ($tribunals as $tri)
				<tr>
					<td>{{ $tri->idtribunal}}</td>
					<td>{{ $tri->postulante}}</td>
					<td>{{ $tri->tema_perfil}}</td>
					<td>{{ $tri->docente}}</td>
					<td>{{ $tri->nombre_tri1}}</td>
					<td>{{ $tri->nombre_tri2}}</td>
					@if(Auth::user()->tipo_user == 1) 
					<td>
						<a href="{{URL::action('TribunalController@edit',$tri->idtribunal)}}"><button data-toggle="tooltip" title data-original-title="Editar el registro" class="btn bg-navy btn-xs">Editar</button></a>
						<p></p>
                       <a href="" data-target="#modal-delete-{{$tri->idtribunal}}" data-toggle="modal"><button data-toggle="tooltip" title data-original-title="Eliminar el registro" class="btn btn-danger btn-xs">Anular</button></a>
					</td>
					@endif
				</tr>
				@include('uno.tribunal.modal')
				@endforeach
			</table>
			</div>
		</div>
		
	
	</div>
</div>
</div>

@endsection