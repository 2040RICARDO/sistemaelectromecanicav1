<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body >
	<table align="center" >
      <thead>
       <tr align="center" >   
           <td colspan=""><img style="width: 19cm;height: 3cm;" src="{{  asset('imagen/logo.png')}}" ></td>
           
      </tr>
      <tr><td colspan="8"><hr></td></tr>
      <tr><td colspan="8"><br></td></tr>
      <tr align="center">
          <td colspan="" style="font-size: 150%; font-weight: bold;">ACTA DE CALIFICACIÓN DE PERFIL</td>
      </tr>
      <tr><td colspan="8"><br></td></tr>
      <tr><td colspan="8"><br></td></tr>
    </thead>
	
	</table>
	<table >
		<tr >
			<td colspan="8" style="height: 1cm"><i>POSTULANTE : </i> <strong>{{ $data->nombresapellidos}}</strong></td>
		</tr>
		<tr >
			<td  colspan="8" style="height: 1cm"><i>TITULO DEL PROYECTO :</i></td>
		</tr>
		<tr >
			<td  style="border: 1 solid;height: 2cm" colspan="8" ><strong>{{ $data->titulo_tema}}</strong></td>
		</tr>
		
		<tr>
			<td colspan="5" style="height: 1cm"><i>FECHA: </i> <strong> {{ $fechaliteralll }} </strong></td>
			<td colspan="3" style="height: 1cm"><i>HORA : </i> <strong> {{ $data->hora_defensa }} </strong></td>
		</tr>
		<tr>
			<td colspan="2,3" style="height: 1cm"><i>AREA : </i> <strong>TECNOLOGIA</strong></td>
			<td colspan="5" style="height: 1cm"><i>CARRERA:</i> <strong>INGENIERIA ELECTROMECANICA</strong></td>
		</tr>
		<tr>
			<td colspan="8" style="height: 2cm"><i>Habiendo el/la postulante realizado la elaboracion documemtal de su proyecto de los motivos, objetivos y alcances del proyecto a realizar; obtuvo una calificación de <strong>{{ $data->puntaje }}</strong> puntos, correspondiente a la escala de valoración:</i></td>
		</tr>
		@if($data->puntaje <= 50)
			<tr >
			<td colspan="2" style="background: #00e676; color:#000;border-radius: 2;">Hasta 50 puntos</td>
			<td colspan="4" style="background: #00e676; color:#000"> Reprobado</td>
			<td colspan="2"></td>
		</tr>
		<tr>
			<td colspan="2" >De 51 a 60 puntos</td>
			<td colspan="4"> Regular Aprobado</td>
			<td colspan="2"></td>
		</tr>
		<tr>
			<td colspan="2" >De 61 a 70 puntos</td>
			<td colspan="4">Bueno Aprobado</td>
			<td colspan="2"></td>
		</tr>
		<tr>
			<td colspan="2" >De 71 a 80 puntos</td>
			<td colspan="4"> Muy Bueno Aprobado</td>
			<td colspan="2"></td>
		</tr>
		<tr>
			<td colspan="2" >De 81 a 90 puntos</td>
			<td colspan="4"> Distinguido Aprobado</td>
			<td colspan="2"></td>
		</tr>
		<tr>
			<td colspan="2" >De 91 a 100 puntos</td>
			<td colspan="4"> Sobresaliente Aprobado</td>
			<td colspan="2"></td>
			
		</tr>
		

		@elseif($data->puntaje <= 60 )
			<tr >
			<td colspan="2" >Hasta 50 puntos</td>
			<td colspan="4" > Reprobado</td>
			<td colspan="2"></td>
		</tr>
		<tr>
			<td colspan="2" style="background: #00e676; color:#000;border-radius: 2;">De 51 a 60 puntos</td>
			<td colspan="4" style="background: #00e676; color:#000"> Regular Aprobado</td>
			<td colspan="2"></td>
		</tr>
		<tr>
			<td colspan="2" >De 61 a 70 puntos</td>
			<td colspan="4">Bueno Aprobado</td>
			<td colspan="2"></td>
		</tr>
		<tr>
			<td colspan="2" >De 71 a 80 puntos</td>
			<td colspan="4"> Muy Bueno Aprobado</td>
			<td colspan="2"></td>
		</tr>
		<tr>
			<td colspan="2" >De 81 a 90 puntos</td>
			<td colspan="4"> Distinguido Aprobado</td>
			<td colspan="2"></td>
		</tr>
		<tr>
			<td colspan="2" >De 91 a 100 puntos</td>
			<td colspan="4"> Sobresaliente Aprobado</td>
			<td colspan="2"></td>
			
		</tr>
		
			@elseif($data->puntaje <= 70 )
			<tr >
			<td colspan="2" >Hasta 50 puntos</td>
			<td colspan="4" > Reprobado</td>
			<td colspan="2"></td>
		</tr>
		<tr>
			<td colspan="2" >De 51 a 60 puntos</td>
			<td colspan="4" > Regular Aprobado</td>
			<td colspan="2"></td>
		</tr>
		<tr>
			<td colspan="2" style="background: #00e676; color:#000;border-radius: 2;">De 61 a 70 puntos</td>
			<td colspan="4" style="background: #00e676; color:#000">Bueno Aprobado</td>
			<td colspan="2"></td>
		</tr>
		<tr>
			<td colspan="2" >De 71 a 80 puntos</td>
			<td colspan="4"> Muy Bueno Aprobado</td>
			<td colspan="2"></td>
		</tr>
		<tr>
			<td colspan="2" >De 81 a 90 puntos</td>
			<td colspan="4"> Distinguido Aprobado</td>
			<td colspan="2"></td>
		</tr>
		<tr>
			<td colspan="2" >De 91 a 100 puntos</td>
			<td colspan="4"> Sobresaliente Aprobado</td>
			<td colspan="2"></td>
			
		</tr>
		
		@elseif($data->puntaje <= 80)
			<tr >
			<td colspan="2" >Hasta 50 puntos</td>
			<td colspan="4" > Reprobado</td>
			<td colspan="2"></td>
		</tr>
		<tr>
			<td colspan="2" >De 51 a 60 puntos</td>
			<td colspan="4" > Regular Aprobado</td>
			<td colspan="2"></td>
		</tr>
		<tr>
			<td colspan="2" >De 61 a 70 puntos</td>
			<td colspan="4" >Bueno Aprobado</td>
			<td colspan="2"></td>
		</tr>
		<tr>
			<td colspan="2" style="background: #00e676; color:#000;border-radius: 2;">De 71 a 80 puntos</td>
			<td colspan="4" style="background: #00e676; color:#000"> Muy Bueno Aprobado</td>
			<td colspan="2"></td>
		</tr>
		<tr>
			<td colspan="2" >De 81 a 90 puntos</td>
			<td colspan="4"> Distinguido Aprobado</td>
			<td colspan="2"></td>
		</tr>
		<tr>
			<td colspan="2" >De 91 a 100 puntos</td>
			<td colspan="4"> Sobresaliente Aprobado</td>
			<td colspan="2"></td>
			
		</tr>
		
		@elseif($data->puntaje <= 90)
			<tr >
			<td colspan="2" >Hasta 50 puntos</td>
			<td colspan="4" > Reprobado</td>
			<td colspan="2"></td>
		</tr>
		<tr>
			<td colspan="2" >De 51 a 60 puntos</td>
			<td colspan="4" > Regular Aprobado</td>
			<td colspan="2"></td>
		</tr>
		<tr>
			<td colspan="2" >De 61 a 70 puntos</td>
			<td colspan="4" >Bueno Aprobado</td>
			<td colspan="2"></td>
		</tr>
		<tr>
			<td colspan="2" >De 71 a 80 puntos</td>
			<td colspan="4" > Muy Bueno Aprobado</td>
			<td colspan="2"></td>
		</tr>
		<tr>
			<td colspan="2" style="background: #00e676; color:#000;border-radius: 2;">De 81 a 90 puntos</td>
			<td colspan="4" style="background: #00e676; color:#000"> Distinguido Aprobado</td>
			<td colspan="2"></td>
		</tr>
		<tr>
			<td colspan="2" >De 91 a 100 puntos</td>
			<td colspan="4"> Sobresaliente Aprobado</td>
			<td colspan="2"></td>
			
		</tr>
		
		@elseif($data->puntaje <= 100)
			<tr >
			<td colspan="2" >Hasta 50 puntos</td>
			<td colspan="4" > Reprobado</td>
			<td colspan="2"></td>
		</tr>
		<tr>
			<td colspan="2" >De 51 a 60 puntos</td>
			<td colspan="4" > Regular Aprobado</td>
			<td colspan="2"></td>
		</tr>
		<tr>
			<td colspan="2" >De 61 a 70 puntos</td>
			<td colspan="4" >Bueno Aprobado</td>
			<td colspan="2"></td>
		</tr>
		<tr>
			<td colspan="2" >De 71 a 80 puntos</td>
			<td colspan="4" > Muy Bueno Aprobado</td>
			<td colspan="2"></td>
		</tr>
		<tr>
			<td colspan="2" >De 81 a 90 puntos</td>
			<td colspan="4" > Distinguido Aprobado</td>
			<td colspan="2"></td>
		</tr>
		<tr>
			<td colspan="2" style="background: #00e676; color:#000;border-radius: 2;">De 91 a 100 puntos</td>
			<td colspan="4" style="background: #00e676; color:#000"> Sobresaliente Aprobado</td>
			<td colspan="2"></td>
			
		</tr>
		@endif
		
		<tr>
			<td colspan="8" style="height: 1cm"><i>OBSERVACIONES Y/O RECOMENDACIONES</i></td>
		</tr>
		<tr>
			<td colspan="8" style="border: 1 solid;height: 2cm">{{$data->obs_recomendaciones}}</td>
		</tr>
		
		<tr><td colspan="8"><br></td></tr>
		<tr><td colspan="8"><br></td></tr>

		<tr align="center">
			<td colspan="4" >.................................<br><i>trubunal</i><br><i>Nombre : </i><strong>{{ $data->nombre }}</strong></td>
			<td colspan="4" >.................................<br><i>trubunal</i><br><i>Nombre : </i><strong>{{ $data->nombre_tri1 }}</strong></td>
		</tr>
		 <tr><td colspan="8"><br></td></tr>
		<tr><td colspan="8"><br></td></tr>
		<tr align="center">
			<td colspan="8" >.................................<br><i>trubunal</i><br><i>Nombre : </i><strong>{{ $data->nombre_tri2 }}</strong></td>
		</tr>
	</table>

		
	

</body>
</html>