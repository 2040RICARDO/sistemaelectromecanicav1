@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Usuario: {{ $usuario->name}}</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif
</div>
</div>
<hr>
			{!!Form::model($usuario,['method'=>'PATCH','route'=>['seguridad.usuario.update',$usuario->id]])!!}
            {{Form::token()}}
                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Tipo de usuario</label>

                        <select class="form-control" name="tipo_user">
                                
                                <option value="0">Inactivo</option>
                                <option value="1">Administrador</option>
                                <option value="2">Usuario estandar</option>
                            </select>
                        </div>    
            <div class="form-group">
            	<button class="btn btn-primary" type="submit">Cambiar</button>
            	<a href="{{url('seguridad/usuario')}}" class="btn btn-danger">Cancelar</a>
            </div>

			{!!Form::close()!!}		

@endsection