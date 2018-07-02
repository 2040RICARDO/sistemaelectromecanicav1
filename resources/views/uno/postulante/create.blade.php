@extends ('layouts.admin')
@section ('contenido')

	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3> <strong>Nuevo Postulante</strong></h3>
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
			{!!Form::open(array('url'=>'uno/postulante','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
			{{Form::token()}}
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

			<div class="form-group">
				<label for="ci">Ci</label>
				<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-chevron-up"></i></span>
				<input type="int" name="ci" required value="{{old('ci')}}" class="form-control" placeholder="Ci...">
				</div>	
			</div>
		</div>

		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="nombresapellidos">Nombres/Apellidos</label>
				<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-chevron-up"></i></span>
				<input type="text" name="nombresapellidos"  id="rpostulantenombre" required value="{{old('nombresapellidos')}}" class="form-control" placeholder="Nombres/apellidos...">
				</div>	
			</div>
		</div>


<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label>Modalidad</label>
				<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-chevron-up"></i></span>
				<select name="modalidad" class="form-control" onchange="mostrar(this.value);">
							<option value="TRABAJO DIRIGIDO">TRABAJO DIRIGIDO</option>
							<option value="PROYECTO DE GRADO">PROYECTO DE GRADO</option>
							<option value="TESIS DE GRADO">TESIS DE GRADO</option>	
				</select>
				</div>
			</div>
		</div>

		{{-- <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" id="institucion">
			<div class="form-group">
				<label for="institucion">Institucion</label>
				<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-chevron-up"></i></span>
				<input type="text" name="institucion"  id="rperfilinstitucion"  value="{{old('institucion')}}" class="form-control" placeholder="Institucion...">
				</div>	
			</div>
		</div> --}}


		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="direccion">Direccion</label>
				<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-chevron-up"></i></span>
				<input type="text" name="direccion" id="rpostulantedireccion" required value="{{old('direccion')}}" class="form-control" placeholder="Direccion...">
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
				<label for="email">Email</label>
				<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-chevron-up"></i></span>
				<input type="text" name="email" required value="{{old('email')}}" class="form-control" placeholder="Email...">	
				</div>
			</div>
		</div>
	
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >
			<div class="form-group" style="float: right;">
				<button class="btn btn-primary" type="submit">Guardar</button>
				<a href="{{url('uno/postulante')}}" class="btn btn-danger">Cancelar</a>
					
				
			</div>
		</div>
	</div>
				
		
			{!!Form::close()!!}

@endsection