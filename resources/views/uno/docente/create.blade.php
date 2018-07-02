@extends ('layouts.admin')
@section ('contenido')

	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3><strong>Nuevo Docente</strong></h3>
	
			
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
			{!!Form::open(array('url'=>'uno/docente','method'=>'POST','autocomplete'=>'off'))!!}
			{{Form::token()}}

	<div class="row">

		
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="nombre">Nombre</label>
				<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-chevron-up"></i></span>
				<input type="text" name="nombre" class="form-control" id="rdocentenombre" placeholder="Nombre...">
				</div>
				
			</div>
		</div>

		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="direccion">Direccion</label>
				<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-chevron-up"></i></span>
				<input type="text" name="direccion" class="form-control" id="rdocentedireccion" placeholder="Direccion...">
				</div>
			</div>
		</div>

		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="celular">celular</label>
				<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-chevron-up"></i></span>
				<input type="int" name="celular" class="form-control" id="rdocentecelular" placeholder="celular...">
				</div>
			</div>

			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
						<label>Especialidad</label>
						<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-chevron-up"></i></span>
						<select name="especialidad" class="form-control">
							<option value="CARRERA">CARRERA</option>
							<option value="FPS">FPS</option>
						</select>
						</div>
			</div>
				
				</div>

				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

			<div class="form-group" style="float: right;">
			<button class="btn btn-primary" type="submit">Guardar</button>
			<a href="{{url('uno/docente')}}" class="btn btn-danger">Cancelar</a>	
				
				
			</div>
			</div>





	</div>

			{!!Form::close()!!}




@endsection