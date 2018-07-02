<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SISTEMA | Electromecánica</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">

     <link rel="stylesheet" href="{{asset('css/bootstrap-select.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('css/font-awesome.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('css/AdminLTE.min.css')}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{asset('css/_all-skins.min.css')}}">
    <link rel="logo_unsxx" href="{{asset('img/logo_unsxx.jpg')}}">
    <link rel="shortcut icon" href="{{asset('img/unsxx.ico')}}">



    <link rel="stylesheet" href="{{asset('css/bootstrap-datepicker.css')}}">
    <link rel="stylesheet" href="{{asset('css/mdtimepicker.css')}}">
   
   <link rel="stylesheet" href="{{asset('datatables/dataTables.bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('css/jquery-ui.css')}}">
    


  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

      <header class="main-header">

        <!-- Logo -->
        <a href="index2.html" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>UNS</b>XX</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>UNSXX</b></span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Navegacion</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="/img/logousuario.png" class="dropdown-toggle" data-toggle="dropdown">
                  
              <img src="/img/logousuario.png" class="user-image" alt="User Image">
                  <span class="hidden-xs">{{ Auth::user()->name}}</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->

                    <li class="user-header">

                <img src="/img/descarga.jpg" class="img-circle" alt="User Image">
                    <p>
                      <small>Cerrando Sesion</small>
                    </p>
                  </li>
                  
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    
                    <div class="pull-right">
                      <a href="{{url('logout')}}" class="btn btn-default btn-flat">Cerrar</a>
                    </div>
                  </li>
                </ul>
              </li>
              
            </ul>
          </div>

        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
                  <div class="user-panel">
        <div class="pull-left image">
          <img src="/img/logoel.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Ing. Electromecánica</p>
        </div>
      </div>        
          <!-- sidebar menu: : style can be found in sidebar.less -->


          @if(Auth::user()->tipo_user!=0)
          <ul class="sidebar-menu">
            <li class="header"></li>

              <li class="treeview">
              <a href="{{url('home')}}">
                <i class="fa fa-home"></i>
                <span>Home</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              
            </li>
            
            <li class="treeview">
              <a href="#">
                <i class="fa fa-laptop"></i>
                <span>Docente</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
               
                <li><a href="{{url('uno/docente')}}"><i class="fa fa-circle-o"></i>Registro</a></li>
              </ul>
            </li>
            
            <li class="treeview">
              <a href="#">
                <i class="fa fa-users"></i>
                <span>Postulante</span>
                 <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{url('uno/postulante')}}"><i class="fa fa-circle-o"></i>Registro</a></li>
              </ul>
            </li>


            <li class="treeview">
              <a href="#">
                <i class="fa fa-folder"></i>
                <span>Tema Perfiles</span>
                 <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                 <li><a href="{{url('uno/tema_perfil')}}"><i class="fa fa-circle-o"></i>Registro</a></li>
               </ul>
            </li>

              <li class="treeview">
              <a href="#">
                <i class="fa fa-shopping-cart"></i>
                <span>Tribunales</span>
                 <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                 <li><a href="{{url('uno/tribunal')}}"><i class="fa fa-circle-o"></i>Registro</a></li>
               </ul>
            </li>

             <li class="treeview">
              <a href="#">
                <i class="fa fa-clipboard"></i>
                <span>Acta/Calificación</span>
                 <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                 <li><a href="{{url('uno/acta_defensa')}}"><i class="fa fa-circle-o"></i>Registro</a></li>
               </ul>
            </li>

            @if(Auth::user()->tipo_user == 1)       
            <li class="treeview">
              <a href="#">
                <i class="fa fa-user"></i> <span>Acceso</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{url('seguridad/usuario')}}"><i class="fa fa-circle-o"></i>Registrar</a></li> 
              </ul>
            </li>

              @endif

              <li class="treeview">
              <a href="#">
                <i class="fa fa-folder-open"></i> <span>Backup</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{url('uno/backup')}}"><i class="fa fa-circle-o"></i>Registrar</a></li> 
              </ul>
            </li>


              <li class="treeview">
              <a href="{{ url('manual') }}">
                <i class="fa fa-user"></i> <span>Ayuda</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
            </li>

                        
          </ul>

          @endif

        </section>
        <!-- /.sidebar -->
      </aside>






       <!--Contenido-->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        
        <!-- Main content -->
        <section class="content">
          
          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Sistema de control de Perfiles</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body box-primary">
                  	<div class="row">
	                  	<div class="col-md-12">
		                          <!--Contenido-->
                              
                              @if(Auth::user()->tipo_user!=0)
                                @yield('contenido')
                              @else
                              <h3>Usuario inactivo contactese con el administrador</h3>

                              @endif

		                          <!--Fin Contenido-->
                           </div>
                        </div>
		                    
                  		</div>
                  	</div><!-- /.row -->
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <!--Fin-Contenido-->

      <footer class="main-footer">
      
        <div class="pull-right hidden-xs">
          <b>Direccion:</b> Campus Maria Barzola
        </div>
        <strong>Carrera ing. Electromecánica <a href="www.electromecánica.com">Facebook</a>.</strong>
      </footer>
  
      
    <!-- jQuery 2.1.4 -->
    <script src="{{asset('js/jQuery-2.1.4.min.js')}}"></script>

    @stack('scripts')

    <!-- Bootstrap 3.3.5 -->
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/bootstrap-select.min.js')}}"></script>
    <script src="{{asset('js/bootstrap-datetimepicker.js')}}"></script>
    <script src="{{asset('js/bootstrap-datepicker.js')}}"></script>
    <script src="{{asset('js/mdtimepicker.js')}}"></script>
 
  
    <!-- AdminLTE App -->

 
  

    <script src="{{asset('js/app.min.js')}}"></script>

    <script src="{{asset('datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('datatables/dataTables.bootstrap.js')}}"></script>
    <script src="{{asset('js/jquery-ui.js')}}"></script>
    
    
    
  </body>


  <script type="text/javascript">

  $('.datepickercc').datepicker({
    
    format: 'yyyy/',
    languaje: "es",
    color: 'red',
    viewMode:'years',
    minViewMode:'years',
  }) .on('changeDate', function(ev){ $('.datepickercc').datepicker('hide');});

  $('.datepicker').datepicker({
          format: "yyyy-mm-dd",
          language: "es",
          color: 'red',
  }) .on('changeDate', function(ev){ $('.datepicker').datepicker('hide'); });

$(document).ready(function(){
    $('#reloj').mdtimepicker(); //Initializes the time picker
  });


//al inicio de cada letra
$('#rdocentenombre,#rdocentedireccion,#edocentenombre,#edocentedireccion,#rpostulantenombre,#rpostulantedireccion,#epostulantenombre,#epostulantedireccion,#rperfilinstitucion,#eperfilinstitucion,#rtrubunaltribunal1,#rtrubunaltribunal2,#rtrubunaltribunal3,#etrubunaltribunal1,#etrubunaltribunal2,#etrubunaltribunal3').keyup(function(e){
    var x=capitalize($(this).val());
    $(this).val(x);
    function capitalize(s){
      return s.toLowerCase().replace( /(^|\s)([A-zÁ-ú])/g, function(a){return a.toUpperCase();});
  }
});
//todo mayuscula
$('#rperfiltitulotema,#eperfiltitulotema').keyup(function(e){
    var x=capitalize($(this).val());
    $(this).val(x);
    function capitalize(s){
      return s.toUpperCase();
  }
});
//solo al principio
$('#rperfilobservacion,#eperfilobservacion,#ractadefenza_observacion,#eactadefenza_observacion').keydown(function(e){
    var str = $('#rperfilobservacion').val();
    str.each(function() {
      $(this).text($(this).text().charAt(0).toUpperCase() + $(this).text().slice(1).toLowerCase());
    });
});

function mostrar(value){
  if(value == "TRABAJO DIRIGIDO"){
    $('#institucion').show(1000);
    $('#institucion').attr('required');
  }
  if(value == "PROYECTO DE GRADO"){
    $('#institucion').hide(1000);
  }
  if(value == "TESIS DE GRADO"){
    $('#institucion').hide(1000);
  }
}

function mostrar1(value){
  if(value == "TRABAJO DIRIGIDO"){
    $('#institucion1').show(1000);
  }
  if(value == "PROYECTO DE GRADO"){
    $('#institucion1').hide(1000);
    $('#institucion').hide(1000);
  }
  if(value == "TESIS DE GRADO"){ 
    $('#institucion1').hide(1000);
    $('#institucion').hide(1000);
  }

  if(value == "TRABAJO DIRIGIDO1" ){
    $('#institucion').show(1000);
  }
  if(value == "PROYECTO DE GRADO1" ){
    $('#institucion').hide(1000);
  }
  if(value == "TESIS DE GRADO1" ){
    $('#institucion').hide(1000);
  }

}


</script>

  <script type="text/javascript">
 $(document).ready(function() {
        $('#myTabla1').DataTable({
            "pagingType": "full_numbers",
            "lengthMenu": [
                [10, 30, 50, -1],
                [10, 30, 50, "Todo"]
            ],
            responsive: true,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Busqueda",
            }

        });
        $('.card .material-datatables label').addClass('form-group');
    });

  $(document).ready(function() {
        $('#myTabla2').DataTable({
            "pagingType": "full_numbers",
            "lengthMenu": [
                [10, 30, 50, -1],
                [10, 30, 50, "Todo"]
            ],
            responsive: true,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Busqueda",
            }

        });
        $('.card .material-datatables label').addClass('form-group');
    });


 $(document).ready(function() {
        $('#myTabla3').DataTable({
            "pagingType": "full_numbers",
            "lengthMenu": [
                [10, 30, 50, -1],
                [10, 30, 50, "Todo"]
            ],
            responsive: true,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Busqueda",
            }

        });
        $('.card .material-datatables label').addClass('form-group');
    });


 $(document).ready(function() {
        $('#general').DataTable({
            "pagingType": "full_numbers",
            "lengthMenu": [
                [10, 30, 50, -1],
                [10, 30, 50, "Todo"]
            ],
            responsive: true,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Busqueda",
            }

        });
        $('.card .material-datatables label').addClass('form-group');
    });

$(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>

<script type="text/javascript">
  $(document).ready(function(){
    
    $('#rperfiltitulotema').focus();
   
    $('#rperfiltitulotema').keyup(function(tecla){
      
        var consulta = $('#rperfiltitulotema').val();
        //if(tecla.which == 32){
          $.ajax({
          url: "{{ url('control')}}",
          data:"b="+consulta+"&_token={{ csrf_token()}}",
          dataType:"json",
          method: "POST",
          success:function(data){
          if (data == 1) {
            $('#control').html('<label  class="label label-primary">Tema  disponible</label>');
               $('#boton-consulta').prop('disabled',false);
              console.log("no existe");
          }if (data == 3) {
              $('#control').html('<label  class="label label-danger">Tema defendido (No disponible)</label>');
              $('#boton-consulta').prop('disabled',true);
          } if(data == 4){
              $('#control').html('<label  class="label label-danger">Tema vigente (No disponible)</label>');
              $('#boton-consulta').prop('disabled',true);
            }if(data == 5){
                $('#control').html('<label  class="label label-primary">Tema vencido (Disponible)</label>');
                $('#boton-consulta').prop('disabled',false);
            }   
            },
          });
        //} 
    });
    $('#rperfiltitulotema').mousedown(function(tecla){
      
        var consulta = $('#rperfiltitulotema').val();
        //if(tecla.which == 32){
          $.ajax({
          url: "{{ url('control')}}",
          data:"b="+consulta+"&_token={{ csrf_token()}}",
          dataType:"json",
          method: "POST",
          success:function(data){
          if (data == 1) {
            $('#control').html('<label  class="label label-primary">Tema  disponible</label>');
               $('#boton-consulta').prop('disabled',false);
              console.log("no existe");
          }if (data == 3) {
              $('#control').html('<label  class="label label-danger">Tema defendido (No disponible)</label>');
              $('#boton-consulta').prop('disabled',true);
          } if(data == 4){
              $('#control').html('<label  class="label label-danger">Tema vigente (No disponible)</label>');
              $('#boton-consulta').prop('disabled',true);
            }if(data == 5){
                $('#control').html('<label  class="label label-primary">Tema vencido (Disponible)</label>');
                $('#boton-consulta').prop('disabled',false);
            }   
            },
          });
        //} 
    });

  });
</script>

<script type="text/javascript">
  $(document).ready(function(){
    
    $('#eperfiltitulotema').focus();
   
    $('#eperfiltitulotema').keyup(function(tecla){
      
        var consulta = $('#eperfiltitulotema').val();
        var cd=$('#edittemaperfil').val();
        //if(tecla.which == 32){
          $.ajax({
          url: "{{ url('econtrol')}}",
          data:{"_token": "{{ csrf_token() }}", "b":consulta ,"c":cd },
          
          dataType:"json",
          method: "POST",
          success:function(data){
          if (data == 1) {
            $('#control').html('<label  class="label label-primary">Tema  disponible</label>');
               $('#boton-consulta').prop('disabled',false);
              console.log("no existe");
          }if (data == 3) {
              $('#control').html('<label  class="label label-danger">Tema defendido (No disponible)</label>');
              $('#boton-consulta').prop('disabled',true);
          } if(data == 4){
              $('#control').html('<label  class="label label-danger">Tema vigente (No disponible)</label>');
              $('#boton-consulta').prop('disabled',true);
            }if(data == 5){
                $('#control').html('<label  class="label label-primary">Tema vencido (Disponible)</label>');
                $('#boton-consulta').prop('disabled',false);
            }   
            },
          });
        //} 
    });

    $('#eperfiltitulotema').mousedown(function(tecla){
      
        var consulta = $('#eperfiltitulotema').val();
        var cd=$('#edittemaperfil').val();
        //if(tecla.which == 32){
          $.ajax({
          url: "{{ url('econtrol')}}",
          data:{"_token": "{{ csrf_token() }}", "b":consulta ,"c":cd },
          dataType:"json",
          method: "POST",
          success:function(data){
          if (data == 1) {
            $('#control').html('<label  class="label label-primary">Tema  disponible</label>');
               $('#boton-consulta').prop('disabled',false);
              console.log("no existe");
          }if (data == 3) {
              $('#control').html('<label  class="label label-danger">Tema defendido (No disponible)</label>');
              $('#boton-consulta').prop('disabled',true);
          } if(data == 4){
              $('#control').html('<label  class="label label-danger">Tema vigente (No disponible)</label>');
              $('#boton-consulta').prop('disabled',true);
            }if(data == 5){
                $('#control').html('<label  class="label label-primary">Tema vencido (Disponible)</label>');
                $('#boton-consulta').prop('disabled',false);
            }   
            },
          });
        //} 
    });

  });
</script>




 <script type="text/javascript">

           jQuery(document).ready(function($) {

                 $('#rperfiltitulotema,#eperfiltitulotema').autocomplete({

                       source: "{{ url('autocomplete') }}" ,
                       minlength:3,
                       autofocus:true,
                select:function(event,ui){

                     $("rperfiltitulotema").val(ui.item.value);
                   }
             });

       });




$('#puntaje').keyup(function(){
  var val= $('#puntaje').val(); 
  if (val <= 50) {
    $('#valoracion').val("Reprobado");
    $('#valoracion1').val("Reprobado");
  }else if(val <= 60){
    $('#valoracion').val("Regular Aprobado");
    $('#valoracion1').val("Regular Aprobado");
  }else if(val <= 70 ){
    $('#valoracion').val("Bueno Aprobado");
    $('#valoracion1').val("Bueno Aprobado");
  }else if(val <= 80){
    $('#valoracion').val("Muy Bueno Aprobado");
     $('#valoracion1').val("Muy Bueno Aprobado");
  }else if(val <= 90 ){
    $('#valoracion').val("Distinguido Aprobado");
     $('#valoracion1').val("Distinguido Aprobado");
  }else if(val <= 100 ){
    $('#valoracion').val("Sobresaliente Aprobado");
    $('#valoracion1').val("Sobresaliente Aprobado");
  }

});




$('#avista').click(function(){
 var f = $('#afecha').val();
 var h = $('#reloj').val();
 var o = $('#ractadefenza_observacion').val();
 var v = $('#valoracion').val();
$('#aafecha').html('<strong >'+f+'</strong>');
$('#aahora').html('<strong >'+h+'</strong>');
$('#aobs').html('<strong >'+o+'</strong>');
if(v == "Reprobado"){
  $('#val1').html('<strong style="background: #00e676; color:#000;border-radius: 2;">Hasta 50 puntos</strong>');
  $('#val2').html('<strong style="background: #00e676; color:#000">Reprobado</strong>');
  $('#val3').html('<strong>De 51 a 60 puntos</strong>');
  $('#val4').html('<strong >Regular Aprobado</strong>');
  $('#val5').html('<strong >De 61 a 70 puntos</strong>');
  $('#val6').html('<strong >Bueno Aprobado</strong>');
  $('#val7').html('<strong >De 71 a 80 puntos</strong>');
  $('#val8').html('<strong >Muy Bueno Aprobado</strong>');
  $('#val9').html('<strong >De 81 a 90 puntos</strong>');
  $('#val10').html('<strong >Distinguido Aprobado</strong>');
  $('#val11').html('<strong >De 91 a 100 puntos</strong>');
  $('#val12').html('<strong >Sobresaliente Aprobado</strong>');
}else if(v == "Regular Aprobado"){
  $('#val1').html('<strong >Hasta 50 puntos</strong>');
  $('#val2').html('<strong >Reprobado</strong>')
  $('#val3').html('<strong style="background: #00e676; color:#000;border-radius: 2;">De 51 a 60 puntos</strong>');
  $('#val4').html('<strong style="background: #00e676; color:#000">Regular Aprobado</strong>');
  $('#val5').html('<strong >De 61 a 70 puntos</strong>');
  $('#val6').html('<strong >Bueno Aprobado</strong>');
  $('#val7').html('<strong >De 71 a 80 puntos</strong>');
  $('#val8').html('<strong >Muy Bueno Aprobado</strong>');
  $('#val9').html('<strong >De 81 a 90 puntos</strong>');
  $('#val10').html('<strong >Distinguido Aprobado</strong>');
  $('#val11').html('<strong >De 91 a 100 puntos</strong>');
  $('#val12').html('<strong >Sobresaliente Aprobado</strong>');
}else if(v == "Bueno Aprobado"){
  $('#val1').html('<strong >Hasta 50 puntos</strong>');
  $('#val2').html('<strong >Reprobado</strong>')
  $('#val3').html('<strong>De 51 a 60 puntos</strong>');
  $('#val4').html('<strong >Regular Aprobado</strong>');
  $('#val5').html('<strong style="background: #00e676; color:#000;border-radius: 2;">De 61 a 70 puntos</strong>');
  $('#val6').html('<strong style="background: #00e676; color:#000">Bueno Aprobado</strong>');
  $('#val7').html('<strong >De 71 a 80 puntos</strong>');
  $('#val8').html('<strong >Muy Bueno Aprobado</strong>');
  $('#val9').html('<strong >De 81 a 90 puntos</strong>');
  $('#val10').html('<strong >Distinguido Aprobado</strong>');
  $('#val11').html('<strong >De 91 a 100 puntos</strong>');
  $('#val12').html('<strong >Sobresaliente Aprobado</strong>');
}else if(v == "Muy Bueno Aprobado"){
  $('#val1').html('<strong >Hasta 50 puntos</strong>');
  $('#val2').html('<strong >Reprobado</strong>')
  $('#val3').html('<strong>De 51 a 60 puntos</strong>');
  $('#val4').html('<strong >Regular Aprobado</strong>');
  $('#val5').html('<strong >De 61 a 70 puntos</strong>');
  $('#val6').html('<strong >Bueno Aprobado</strong>');
  $('#val7').html('<strong style="background: #00e676; color:#000;border-radius: 2;">De 71 a 80 puntos</strong>');
  $('#val8').html('<strong style="background: #00e676; color:#000">Muy Bueno Aprobado</strong>');
  $('#val9').html('<strong >De 81 a 90 puntos</strong>');
  $('#val10').html('<strong >Distinguido Aprobado</strong>');
  $('#val11').html('<strong >De 91 a 100 puntos</strong>');
  $('#val12').html('<strong >Sobresaliente Aprobado</strong>'); 
}else if(v == "Distinguido Aprobado"){
  $('#val1').html('<strong >Hasta 50 puntos</strong>');
  $('#val2').html('<strong >Reprobado</strong>')
  $('#val3').html('<strong>De 51 a 60 puntos</strong>');
  $('#val4').html('<strong >Regular Aprobado</strong>');
  $('#val5').html('<strong >De 61 a 70 puntos</strong>');
  $('#val6').html('<strong >Bueno Aprobado</strong>');
  $('#val7').html('<strong >De 71 a 80 puntos</strong>');
  $('#val8').html('<strong >Muy Bueno Aprobado</strong>');
  $('#val9').html('<strong style="background: #00e676; color:#000;border-radius: 2;">De 81 a 90 puntos</strong>');
  $('#val10').html('<strong style="background: #00e676; color:#000">Distinguido Aprobado</strong>');
  $('#val11').html('<strong >De 91 a 100 puntos</strong>');
  $('#val12').html('<strong >Sobresaliente Aprobado</strong>');
}else if(v == "Sobresaliente Aprobado"){
  $('#val1').html('<strong >Hasta 50 puntos</strong>');
  $('#val2').html('<strong >Reprobado</strong>')
  $('#val3').html('<strong>De 51 a 60 puntos</strong>');
  $('#val4').html('<strong >Regular Aprobado</strong>');
  $('#val5').html('<strong >De 61 a 70 puntos</strong>');
  $('#val6').html('<strong >Bueno Aprobado</strong>');
  $('#val7').html('<strong >De 71 a 80 puntos</strong>');
  $('#val8').html('<strong >Muy Bueno Aprobado</strong>');
  $('#val9').html('<strong >De 81 a 90 puntos</strong>');
  $('#val10').html('<strong >Distinguido Aprobado</strong>');
  $('#val11').html('<strong style="background: #00e676; color:#000;border-radius: 2;">De 91 a 100 puntos</strong>');
  $('#val12').html('<strong style="background: #00e676; color:#000">Sobresaliente Aprobado</strong>');
}
});






  var cont=0;
  $("#guardar").hide();
$("#postu").change(mostrarDevolucion);
   function mostrarDevolucion()
  {
    datosDevolucion=document.getElementById('postu').value.split('_');
    $("#idpostulantee").val(datosDevolucion[0]);
    $("#pmodalidad").val(datosDevolucion[1]); 
    $("#ppmodalidad").val(datosDevolucion[1]); 
    if ( $("#pmodalidad").val() == "TRABAJO DIRIGIDO") {
      $('#institucionin').show(1000);
      //$("#pinstitucion").val(datosDevolucion[2]);
    }else{
      $('#institucionin').hide(1000);
    }      
  }





  $("#etema").change(mostrarDevolucionn);
   function mostrarDevolucionn()
  {
    datosDevolucion=document.getElementById('etema').value.split('_');
    $("#epostulante").val(datosDevolucion[0]);
    $("#emodalidad").val(datosDevolucion[1]);
    $("#eemodalidad").val(datosDevolucion[1]);
    if ( $("#emodalidad").val() == "TRABAJO DIRIGIDO") {
      if($('#valorconsulta').val() == datosDevolucion[0]){
        $('#institucionn1').show(1000);
        $('#institucionn2').hide(1000);
      }else{
        $('#institucionn1').hide(1000);
        $('#institucionn2').show(1000);
      }
    }else{
      $('#institucionn1').hide(1000);
      $('#institucionn2').hide(1000);
    }
         
  }
 


$("#idtema_perfil").change(mostrarDevolucionnn);
   function mostrarDevolucionnn()
  {
    datosDevolucion=document.getElementById('idtema_perfil').value.split('_');
     $("#postulante").val(datosDevolucion[1]);  
    $("#modalidadt").val(datosDevolucion[2]); 
     $("#pmodalidad").val(datosDevolucion[2]); 
    $("#pidpostulante").val(datosDevolucion[3]); 
    $("#pidtitulo").val(datosDevolucion[4]); 


    $('#anombrepostulante').html('<strong >'+datosDevolucion[1]+'</strong>'); 
    $('#atitulo').html('<strong >'+datosDevolucion[0]+'</strong>');

    $('#a1').html('<strong >'+datosDevolucion[5]+'</strong>');
    $('#a2').html('<strong >'+datosDevolucion[6]+'</strong>'); 
    $('#a3').html('<strong >'+datosDevolucion[7]+'</strong>'); 
  }
 

 </script>

</html>
