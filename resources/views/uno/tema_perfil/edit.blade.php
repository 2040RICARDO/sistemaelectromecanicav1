@extends ('layouts.admin')
@section ('contenido')

	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<h3><strong>Editar Tema Perfil:</strong></h3>
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
			{!!Form::model($tema_perfil,['method'=>'PATCH','route'=>['uno.tema_perfil.update',$tema_perfil->idtema_perfil],'files'=>'true'])!!}
			{{Form::token()}}
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="titulo_tema">Titulo Tema <label id="control"></label></label>
				<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-chevron-up"></i></span>
				<input type="text" name="titulo_tema" id="eperfiltitulotema" required value="{{$tema_perfil->titulo_tema}}" class="form-control">
				<input type="hidden" value="{{ $tema_perfil->idtema_perfil }}" id="edittemaperfil">	
				</div>
			</div>
		</div>



		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label>Modalidad</label>
				<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-chevron-up"></i></span>
					<input type="text"  id="emodalidad" disabled value="{{$tema_perfil->modalidad}}" class="form-control">
					<input type="hidden" name="modalidad" id="eemodalidad"  value="{{$tema_perfil->modalidad}}" >
				</div>
			</div>
		</div>


@if($tema_perfil->institucion != "NULL")
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" id="institucionn1">
			<div class="form-group">
				<label for="institucion">Institucion</label>
				<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-chevron-up"></i></span>
				<input type="text" name="institucion1" id="eperfilinstitucion" required value="{{$tema_perfil->institucion}}" class="form-control">	
				</div>
			</div>
		</div>
@endif


		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" id="institucionn2" style="display:none">
			<div class="form-group">
				<label for="institucion">Institucion</label>
				<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-chevron-up"></i></span>
				<input type="text" name="institucion2" id="eperfilinstitucion"  class="form-control">
				</div>	
			</div>
		</div>





	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
		
				<label>Postulante</label>
				<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-chevron-up"></i></span>
				<select name="idpostulante" class="form-control" required id="etema">
				@foreach ($listapostulantes as $pos)
				@if($pos->idpostulante==$tema_perfil->idpostulante)
				<option value="{{$pos->idpostulante}}_{{$pos->modalidad}}" selected>{{$pos->nombresapellidos}}</option>
				@else
				<option value="{{$pos->idpostulante}}_{{$pos->modalidad}}">{{$pos->nombresapellidos}}</option>
				@endif
				@endforeach 
				</select>
				<input type="hidden" name="idpostulante" id="epostulante" value="{{ $tema_perfil->idpostulante }}">

				<input type="hidden" name="valorconsul" id="valorconsulta" value="{{ $tema_perfil->idpostulante }}">
				</div>
			</div>
		</div>




	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label>Tutor</label>
				<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-chevron-up"></i></span>
				<select name="iddocente" class="form-control" required>
				@foreach ($docentes as $doc)
				@if($doc->iddocente==$tema_perfil->iddocente)
				<option value="{{$doc->iddocente}}" selected>{{$doc->nombre}}</option>
				@else
				<option value="{{$doc->iddocente}}">{{$doc->nombre}}</option>
				@endif
				@endforeach 
				</select>
				</div>
			</div>
		</div>




	
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
			
				<label for="observacion">Observacion</label>
				<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-chevron-up"></i></span>
				<input type="text" name="observacion" id="eperfilobservacion" required value="{{$tema_perfil->observacion}}" class="form-control">
				</div>	
			</div>
		</div>

		
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
			
				<label for="fecha_aprobacion">Fecha_Apro</label>
				<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-chevron-up"></i></span>
				<input type="text" name="fecha_aprobacion" required value="{{$tema_perfil->fecha_aprobacion}}" class="form-control datepicker">
				</div>	
			</div>
		</div>


		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="form-group" style="float: right;">
			
				<button class="btn btn-primary" type="submit" id="boton-consulta">Actualizar</button>	
				<a href="{{url('uno/tema_perfil')}}" class="btn btn-danger">Cancelar</a>		
				
			</div>
		</div>

	</div>

				
			{!!Form::close()!!}


@endsection