@extends ('layouts.admin')
@section ('contenido')
<center>
<div class="row">
  <div class="inner">
		<i class=""><h3><strong>SISTEMA DE INFORMACIÓN PARA EL CONTROL Y SEGUIMIENTO DE PERFILES</strong></h3></i>

    <br><br>
</div>
	
</div>
</center>


<div class="row">

            <div class="col-lg-4 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
              
                <div class="inner">
                 <i class="fa fa-users">
                  <p>POSTULANTES</p></i>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="{{url('uno/postulante')}}" class="small-box-footer">Postulantes <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>

            <div class="col-lg-4 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                 <i class="fa fa-folder">
                  <p>TEMAS PERFILES</p></i>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="{{url('uno/tema_perfil')}}" class="small-box-footer">Temas/Perfil <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->

            <div class="col-lg-4 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <i class="fa fa-shopping-cart">
                  <p>ACTA CALIFICACIÓN</p></i>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
                <a href="{{url('uno/acta_defensa')}}" class="small-box-footer">Acta/Calificación <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
        </div>
<br><br><br>
<div class="row">

          <div class="col-lg-4 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                   <i class="fa fa-laptop">
                  <p>DOCENTES</p></i>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
                <a href="{{url('uno/docente')}}" class="small-box-footer">Docentes<i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->

            

            <div class="col-lg-4 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <i class="fa fa-shopping-cart">
                  <p>TRIBUNALES</p></i>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="{{url('uno/tribunal')}}" class="small-box-footer">Tribunales <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->

            <div class="col-lg-4 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                 <i class="fa fa-folder">
                  <p>COPIAS DE SEGURIDAD</p></i>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="{{url('uno/backup')}}" class="small-box-footer">Backups <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
            
        </div>

        <!-- EstadÃ­sticas grÃ¡ficos -->
        

@endsection