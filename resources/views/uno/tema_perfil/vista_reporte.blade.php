@extends ('layouts.admin')
@section ('contenido')

	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3><strong>Reportes Perfil por Gestion</strong></h3>
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
			{!!Form::open(array('url'=>'reporte_gestion','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
			{{Form::token()}}
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
			
				<label for="fecha_aprobacion">Gestion</label>
				<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-chevron-up"></i></span>
				<input type="text" name="gestion" required  class="form-control datepickercc"  placeholder="Gestion">
				</div>	
			</div>
		</div>


		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label>Modalidad</label>
				<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-chevron-up"></i></span>
				<select name="modalidad" class="form-control" id="modalidadd" required>
							<option value="TRABAJO DIRIGIDO">TRABAJO DIRIGIDO</option>
							<option value="PROYECTO DE GRADO">PROYECTO DE GRADO</option>
							<option value="TESIS DE GRADO">TESIS DE GRADO</option>
							
				</select>
				</div>
			</div>
		</div>

				

		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
			<label>Estado</label>
			<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-chevron-up"></i></span>
				<select name="estado" class="form-control" id="estados" required>
							<option disabled="" selected=""></option>
							<option value="vigente">Vigente</option>
							<option value="defendido">Defendido</option>
							<option value="vencido">Vencido</option>							
				</select>
				</div>
			</div>
		</div>

	



		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="form-group" style="float: right;">
				<button class="btn btn-primary boton" type="submit">Reporte</button>
				 
				<a href="{{url('uno/tema_perfil')}}" class="btn btn-danger">Cancelar</a>		
			</div>
		</div>
	</div>


			{!!Form::close()!!}
			<hr>
			<h3>Reportes Perfil General</h3><br>
			<a href="{{url('reporte_generalperfil')}}" target="_blank"><button class="btn btn-primary">
			Reporte General</button></a>

@endsection