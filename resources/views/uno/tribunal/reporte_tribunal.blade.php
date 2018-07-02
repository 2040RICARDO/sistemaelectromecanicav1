<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<table align="center" >
      <thead>
       <tr align="center" >   
           <td colspan=""><img style="width: 19cm;height: 3cm;" src="{{  asset('imagen/logo.png')}}" ></td>
           
      </tr>
      <tr><td colspan="8"><hr></td></tr>
      <tr><td colspan="8"><br></td></tr>
      <tr align="center">
          <td colspan="" style="font-size: 150%; font-weight: bold;">REPORTE LISTADO TRIBUNALES</td>
      </tr>
      <tr><td colspan="8"><br></td></tr>
      <tr><td colspan="8"><br></td></tr>
    </thead>
	</table>

	<table  align="center" border="1">
        
          <tr style=" background: #84ffff; color:#000;" b>
            <th style="width:15px;font-size: 70%; height: 0.8cm;" align="center">N°</th>
            <th style="width:100px;font-size: 70%;" align="center"> Postulante</th>
            <th style="width:200px;font-size: 70%;" align="center">Titulo del Tema</th>
            <th style="width:70px;font-size: 70%;" align="center"> Tribunal 1</th>
            <th style="width:70px;font-size: 70%;" align="center">Tribunal 2</th>
            <th style="width:70px;font-size: 70%;" align="center">Tribunal 3</th>
          </tr>
        


         
           {{-- */ $rh = 1; /*--}} 
        @foreach($data as $datos) 

           <tr>
        <td style="width:2px;font-size: 60%;height: 0.5cm;" align="center">{{ $rh }}</td>
        <td style="font-size: 60%;">{{ $datos->postulante}}</td>
        <td style="width:200px;font-size: 60%;">{{ $datos->tema_perfil}}</td>
        <td style="width:70px;font-size: 60%;">{{ $datos->docente}}</td>
        <td style="width:70px;font-size: 60%;">{{ $datos->nombre_tri1}}</td>
        <td style="width:70px;font-size: 60%;">{{ $datos->nombre_tri2}}</td>
        
       
      </tr>
       {{-- */ $rh = $rh+1; /*--}} 
      @endforeach
     
       </table>

</body>
</html>