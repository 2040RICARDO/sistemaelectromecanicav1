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
          <td colspan="" style="font-size: 150%; font-weight: bold;">REPORTE LISTADO TEMAS DE PERFILES</td>
      </tr>
      <tr><td colspan="8"><br></td></tr>
      <tr><td colspan="8"><br></td></tr>
    </thead>
  </table>

  <table  align="center" border="1">
        
          <tr style=" background: #84ffff; color:#000;" b>
            <th style="width:15px;font-size: 70%; height: 0.8cm;" align="center">N°</th>
            <th style="width:100px;font-size: 70%;" align="center"> Postulante</th>
            <th style="width:150px;font-size: 70%;" align="center">Titulo del Tema</th>
            <th style="width:100px;font-size: 70%;" align="center"> modalidad</th>
            <th style="width:70px;font-size: 70%;" align="center">Puntaje</th>
            <th style="width:100px;font-size: 70%;" align="center">Valoracion</th>
            <th style="width:100px;font-size: 70%;" align="center">Obs/Rec.</th>
            
          </tr>
        


         
           {{-- */ $rh = 1; /*--}} 
        @foreach($data as $datos) 

           <tr>
            <td style="width:2px;font-size: 60%;height: 0.5cm;" align="center">{{ $rh }}</td>
        <td style="font-size: 60%;">{{ $datos->postulante}}</td>
        <td style="width:150px;font-size: 60%;">{{ $datos->tema_perfil}}</td>
        <td align="center" style="width:100px;font-size: 60%;">{{ $datos->modalidad}}</td>
        <td align="center" style="width:70px;font-size: 60%;">{{ $datos->puntaje}}</td>

        @if($datos->puntaje <= 50)
        <td align="center" style="width:100px;font-size: 60%;">Hasta 50 puntos Reprobado</td>
      
  
    @elseif($datos->puntaje <= 60 )
     <td align="center" style="width:100px;font-size: 60%;">De 51 a 60 puntos Regular Aprobado</td>
    
      @elseif($datos->puntaje <= 70 )
    <td align="center" style="width:100px;font-size: 60%;">De 61 a 70 puntos Bueno Aprobado</td>
    
    
    @elseif($datos->puntaje <= 80)
     <td align="center" style="width:100px;font-size: 60%;">De 71 a 80 puntos Muy Bueno Aprobado</td>
  
    @elseif($datos->puntaje <= 90)
      <td align="center" style="width:100px;font-size: 60%;">De 81 a 90 puntos Distinguido Aprobado</td>
  
    @elseif($datos->puntaje <= 100)
     <td align="center" style="width:100px;font-size: 60%;">De 91 a 100 puntos Sobresaliente Aprobado</td>

    @endif
        <td style="width:100px;font-size: 60%;">{{ $datos->obs_recomendaciones}}</td>
       
        
       
          </tr>
       {{-- */ $rh = $rh+1; /*--}} 
      @endforeach
     
       </table>

</body>
</html>