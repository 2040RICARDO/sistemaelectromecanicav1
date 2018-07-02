@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3><strong>Nuevo Usuario</strong></h3>
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
			{!!Form::open(array('url'=>'seguridad/usuario','method'=>'POST','autocomplete'=>'off','class'=>'form-horizontal'))!!}
            {{Form::token()}}
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-sm-3 control-label">Nombre</label>
                            <div class="col-sm-5">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}">
                                </div>
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                        </div>
                
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-sm-3 control-label">E-Mail</label>
                            <div class="col-sm-5">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">
                            </div>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif

                        </div>
            
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-3 control-label">Contraseña</label>
                            <div class="col-sm-5">
                                <input id="password" type="password" class="form-control" name="password">
                            </div>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                        </div>
                
                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="col-md-3 control-label">Confirmar Contraseña</label>
                            <div class="col-sm-5">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                            </div>
                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                        </div>
                   
            <div class="form-group">
            <div class="col-sm-5">
            <label for="password-confirm" class="col-md-7 control-label"></label>
            	<button class="btn btn-primary" type="submit">Registrar</button>
            	<a href="{{url('seguridad/usuario')}}" class="btn btn-danger">Cancelar</a>
                </div>
            </div>


			{!!Form::close()!!}		
            
	
@endsection