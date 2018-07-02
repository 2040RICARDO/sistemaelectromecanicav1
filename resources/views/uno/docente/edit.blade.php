@extends ('layouts.admin')
@section ('contenido')

	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3><strong>Editar Docente:</strong> {{ $docente->nombre}}</h3>
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
			{!!Form::model($docente,['method'=>'PATCH','route'=>['uno.docente.update',$docente->iddocente]])!!}
			{{Form::token()}}

		<div class="row">



		
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				
				<label for="nombre">Nombre</label>
				<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-chevron-up"></i></span>
				<input type="text" name="nombre" class="form-control" id="edocentenombre" value="{{$docente->nombre}}" placeholder="Nombre...">
				</div>
			</div>
			</div>

			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				
				<label for="direccion">Direccion</label>
				<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-chevron-up"></i></span>
				<input type="text" name="direccion" class="form-control" id="edocentedireccion" value="{{$docente->direccion}}" placeholder="Direccion...">
				</div>
			</div>
			</div>


				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				
				<label for="celular">Celular</label>
				<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-chevron-up"></i></span>
				<input type="int" name="celular" class="form-control" id="edocentecelular" value="{{$docente->celular}}" placeholder="Celular...">
				</div>
			</div>
			</div>

			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			
			<div class="form-group">
			
					<label>Especialidad</label>
					<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-chevron-up"></i></span>
						<select name="especialidad" class="form-control" >
						 @if ($docente->especialidad=='CARRERA')
							<option value="CARRERA" selected>CARRERA</option>
							<option value="FPS">FPS</option>
						 @else
						 	<option value="CARRERA">CARRERA</option>
							<option value="FPS" selected>FPS</option>
						  @endif
						</select>
						</div>
			</div>
				</div>
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="form-group" style="float: right;">
			<button class="btn btn-primary" type="submit">Actualizar</button>	
			<a href="{{url('uno/docente')}}" class="btn btn-danger">Cancelar</a>
				
			</div>
			</div>
          </div>

			{!!Form::close()!!}

@endsection