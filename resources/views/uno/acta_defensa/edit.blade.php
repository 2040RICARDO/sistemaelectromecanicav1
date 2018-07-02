@extends ('layouts.admin')
@section ('contenido')

	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<h3><strong>Editar Acta/Calificación:</strong></h3>
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
		{!!Form::model($acta_defensa, ['method'=>'PATCH','route'=>['uno.acta_defensa.update',$acta_defensa->idacta_defensa],'files'=>'true'])!!}
		{{Form::token()}}
	
	
		<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
		
				<label>Postulante</label>
				<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-chevron-up"></i></span>
				<input type="text"  disabled required value="{{$acta_defensa->nombres}}" class="form-control">
				</div>
			</div>
		</div>


		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
		
				<label for="tema_perfil">Titulo Tema</label>
				<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-chevron-up"></i></span>
				<input type="text" disabled required value="{{$acta_defensa->titulo_tema}}" class="form-control">
				<input type="hidden" name="idtema_perfil" required value="{{$acta_defensa->idtema_perfil}}" class="form-control">

				</div>
			</div>
		</div>


		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
			
				<label for="fecha_hora_defensa">Fecha</label>
				<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-chevron-up"></i></span>
				<input type="text" name="fecha_defensa" required value="{{$acta_defensa->fecha_defensa}}" class="form-control datepicker">	
				</div>
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
			
				<label for="fecha_hora_defensa">Hora</label>
				<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-chevron-up"></i></span>
				<input type="text" name="hora_defensa" required value="{{$acta_defensa->hora_defensa}}" class="form-control" id="reloj">
				</div>	
			</div>
		</div>

		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label>Modalidad</label>
				<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-chevron-up"></i></span>
				<input type="text" disabled required value="{{$acta_defensa->modalidad}}" class="form-control">
				</div>
			</div>
		</div>


		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
			
				<label for="puntaje">Puntaje</label>
				<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-chevron-up"></i></span>
				<input type="number" min="0" max="100" name="puntaje" id="puntaje" required value="{{$acta_defensa->puntaje}}" class="form-control">
				</div>	
			</div>
		</div>

		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label>Valoracion</label>
				<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-chevron-up"></i></span>
				<input type="text" disabled id="valoracion" value="{{$acta_defensa->valoracion}}" class="form-control" placeholder="puntaje...">
				<input type="hidden" name="valoracion" id="valoracion1" value="{{$acta_defensa->valoracion}}">
				</div>
			</div>
		</div>



		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
			
				<label for="obs_recomendaciones">Obs/Recm.</label>
				<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-chevron-up"></i></span>
				<input type="text" name="obs_recomendaciones" id="eactadefenza_observacion" required value="{{$acta_defensa->obs_recomendaciones}}" class="form-control">	
				</div>
			</div>
		</div>

		
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="form-group" style="float:right;">
			
				<button class="btn btn-primary" type="submit">Actualizar</button>	
				<a href="{{url('uno/acta_defensa')}}" class="btn btn-danger">Cancelar</a>
				
			</div>
		</div>

	</div>


				
				
			{!!Form::close()!!}


@endsection