@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3><strong>Listado de Usuarios</strong></h3>
	</div>
		<div class="col-lg-12 col-md-12 col-sm-12 -col-xs-12"> 
		<div style="padding-bottom: 8px;float: right;">
		<a href="usuario/create"><button class="btn btn-succes"><span data-toggle="tooltip" title class="badge bg-light-blue" data-original-title="Nuevo registro">+</span> Nuevo</button></a></h3>
		<!--@include('seguridad.usuario.search')-->
	</div>
	</div>
</div>

<div class="box box-solid box-primary" >
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm12 col-xs-12">
		<div class="table-responsive">
		<div class="box-body"> 
			<table class="table table-bordered table-stripe" id="general">
				<thead>
				<tr style="background-color:#263238;color: #fff;">
					<th><i>Id</i></th>
					<th><i>Nombre</i></th>
					<th><i>Email</i></th>
					<td><i>Tipo de usuario</i></td>
					<th><i>Opciones</i></th>
					</tr>
				</thead>
               @foreach ($usuarios as $usu)
				<tr>
					<td>{{ $usu->id}}</td>
					<td>{{ $usu->name}}</td>
					<td>{{ $usu->email}}</td>
					@if($usu->tipo_user==0)
						<td>Inactivo</td>
					@elseif($usu->tipo_user==1)
						<td>Administrador</td>
					@elseif($usu->tipo_user==2)
						<td>Usuario estandar</td>
					@endif
					<td>
						<a href="{{URL::action('UsuarioController@edit',$usu->id)}}"><button data-toggle="tooltip" title data-original-title="Editar el registro" class="btn bg-navy btn-xs">Editar</button></a>
                         <a href="" data-target="#modal-delete-{{$usu->id}}" data-toggle="modal"><button data-toggle="tooltip" title data-original-title="Eliminar el registro" class="btn btn-danger btn-xs">Eliminar</button></a>
					</td>
				</tr>
				@include('seguridad.usuario.modal')
				@endforeach
			</table>
			</div>
		</div>
		
	
	</div>
</div>
</div>

@endsection