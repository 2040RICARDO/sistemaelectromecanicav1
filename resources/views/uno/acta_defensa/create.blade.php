@extends ('layouts.admin')
@section ('contenido')

	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3><strong>Nuevo Acta de Calificación</strong></h3>
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
			{!!Form::open(array('url'=>'uno/acta_defensa','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
			{{Form::token()}}


		<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
		
				<label>Postulante</label>
				<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-chevron-up"></i></span>
				<input type="text" disabled id="postulante" required  class="form-control" placeholder="Nombre...">

				</div>
			</div>
		</div>


		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
		
				<label for="tema_perfil">Titulo Tema</label>
				<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-chevron-up"></i></span>
				<select  id="idtema_perfil" class="form-control selectpicker" data-live-search="true" required>
				<option selected=""></option>
				@foreach ($titulos as $tc)
				<option value="{{$tc->titulo_tema}}_{{$tc->nombres}}_{{$tc->modalidad}}_{{$tc->idpostulante}}_{{$tc->idtema_perfil}}_{{ $tc->nombre }}_{{ $tc->nombre_tri1 }}_{{ $tc->nombre_tri2 }}">{{$tc->titulo_tema}}</option>
				@endforeach 
				</select>
				<input type="hidden" name="idtema_perfil" id="pidtitulo">
				</div>
			</div>
		</div>


	
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
			
				<label for="fecha_hora_defensa">Fecha</label>
				<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-chevron-up"></i></span>
				<input type="text" name="fecha_defensa" required id="afecha" class="form-control datepicker" placeholder="fecha_hora...">
				</div>	
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
			
				<label for="fecha_hora_defensa">Hora</label>
				<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-chevron-up"></i></span>
				<input type="text" name="hora_defensa" id="reloj" required class="form-control" placeholder="hora_defensa">
				</div>	
			</div>
		</div>

		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label>Modalidad</label>
				<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-chevron-up"></i></span>
				<input type="text" disabled id="modalidadt" required  class="form-control" placeholder="Modalidalidad">
				</div>
			</div>
		</div>


		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
			
				<label for="puntaje">Puntaje</label>
				<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-chevron-up"></i></span>
				<input type="number" min="0" maxlength="100" name="puntaje" id="puntaje" required value="{{old('puntaje')}}" class="form-control" placeholder="puntaje...">
				</div>	
			</div>
		</div>

		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
			
				<label for="puntaje">Valoracion</label>
				<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-chevron-up"></i></span>
				<input type="text" disabled id="valoracion" class="form-control" placeholder="puntaje...">
				<input type="hidden" name="valoracion" id="valoracion1" class="form-control" placeholder="puntaje...">
				</div>	
			</div>
		</div>


		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
			
				<label for="obs_recomendaciones">Obs/Recm.</label>
				<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-chevron-up"></i></span>
				<input type="text" name="obs_recomendaciones" id="ractadefenza_observacion" required  class="form-control"  placeholder="obs_recomendaciones...">	
				</div>
			</div>
		</div>

		
		

		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="form-group" style="float: right;">
				<a href="" data-target="#modalvista" data-toggle="modal"><button data-toggle="tooltip" title data-original-title="Vista Acta" class="btn btn-danger btn-xs" id="avista">Vista Previa</button></a>
				<button class="btn btn-primary" type="submit">Guardar</button>	
				<a href="{{url('uno/acta_defensa')}}" class="btn btn-danger">Cancelar</a>	
				
			</div>
		</div>

	</div>

			{!!Form::close()!!}

		@include('uno.acta_defensa.modalvista')	

@endsection