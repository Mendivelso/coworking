<?php
  include_once("../../../backend/datos/AnsTek_libs/integracion.inc.php");
  include_once("../resource/header.php");
  include_once("../resource/nav.php");
  include_once("../resource/librerias.php");
  include_once("../../datos/model/lugares.class.php");

  if(Session::get('Perfil') != 1)
  header('Location: logout.php');

  $user = new lugar($db);
  $where = " Where Id > 0 ORDER BY Id DESC";

  $result = $user->selectAll($where);

 ?>
 


<!DOCTYPE>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Destinos</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <?php LibreriasCss(); ?>
  <link rel="stylesheet" type="text/css" href="../../../bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <style type="text/css">

  </style>
</head>
<body class="hold-transition skin-blue sidebar-mini">
  <!-- MODAL REGISTRO LUGARES-->
  <div class="modal fade" id="modal-User">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Nuevo Destino </h4>
        </div>
        <div class="modal-body">



          <form id="Lugares"  role="form" data-parsley-validate="" novalidate="novalidate" enctype="multipart/form-data">

          <div class="form-group has-feedback">
              <span class="glyphicon glyphicon-th-large form-control-feedback"></span>
              <select class="form-control" placeholder="Posición" required="" data-parsley-trigger="keyup"   data-parsley-required-message="Campo requerido" name="txtStatus" id="txtStatus">
                <option value="1">Activo</option>
                <option value="2">Inactivo</option>
              </select>
            </div>


            <div class="form-group has-feedback">
              <label for="txtTipo">Tipo de Destino</label>
              <select name="txtTipoG" id="txtTipoG" class="form-control" data-parsley-required-message="Campo requerido" required="">
                <option value="">Seleccione...</option>
                <option value="Resorts">Resorts</option>
                <option value="Villa-de-Lujo">Villa de Lujo</option>
                <option value="Crucero">Crucero</option>
                <option value="Hotel">Hotel</option>
                <option value="Tour">Tour</option>
              </select>
            </div>

            <div class="form-group has-feedback">
              <input type="text" class="form-control" placeholder="Nombre"  data-parsley-required-message="Campo requerido" required="" name="txtName" id="txtName">
              <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>

            <div class="form-group has-feedback">
              <input type="text" class="form-control" placeholder="Ubicación"  data-parsley-required-message="Campo requerido" required="" name="txtUbi" id="txtUbi">
              <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>

            <div class="form-group has-feedback">
              <textarea name="txtDescrip" id="txtDescrip" cols="30" rows="20" class="form-control" data-parsley-required-message="Campo requerido" required="" placeholder="Ingrese una descripcion"></textarea>
              <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>


            <div class="form-group has-feedback">
            <label for="txtTipo">Imagen  de portada () PNG - JPG - JPEG </label>
              <input type="file" class="form-control" placeholder="Adjunte archivo "  data-parsley-required-message="Adjunte archivo 1" required="false" name="txtImg" id="txtImg">
              <span class="glyphicon glyphicon-file form-control-feedback"></span>
            </div>


            <div class="form-group has-feedback">
              <label for="txtTipo">Imagenes Lugar () PNG - JPG - JPEG </label>
              <input type="file" class="form-control" placeholder="Adjunte archivo "  data-parsley-required-message="Adjunte archivo 1" required="false" name="txtImg1" id="txtImg1">
              <span class="glyphicon glyphicon-file form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
              <label for="txtTipo">Imagenes Lugar () PNG - JPG - JPEG </label>
              <input type="file" class="form-control" placeholder="Adjunte archivo "  data-parsley-required-message="Adjunte archivo 1" required="false" name="txtImg2" id="txtImg2">
              <span class="glyphicon glyphicon-file form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
              <label for="txtTipo">Imagenes Lugar () PNG - JPG - JPEG </label>
              <input type="file" class="form-control" placeholder="Adjunte archivo "  data-parsley-required-message="Adjunte archivo 1" required="false" name="txtImg3" id="txtImg3">
              <span class="glyphicon glyphicon-file form-control-feedback"></span>
            </div>

            <div class="form-group has-feedback">
              <label for="txtTipo">Imagenes Lugar () PNG - JPG - JPEG </label>
              <input type="file" class="form-control" placeholder="Adjunte archivo "  data-parsley-required-message="Adjunte archivo 1" required="false" name="txtImg4" id="txtImg4">
              <span class="glyphicon glyphicon-file form-control-feedback"></span>
            </div>

            <div class="form-group has-feedback">
              <label for="txtTipo">Imagenes Lugar () PNG - JPG - JPEG </label>
              <input type="file" class="form-control" placeholder="Adjunte archivo "  data-parsley-required-message="Adjunte archivo 1" required="false" name="txtImg5" id="txtImg5">
              <span class="glyphicon glyphicon-file form-control-feedback"></span>
            </div>
            
            <div class="form-group has-feedback" id="cont-iframe">

            </div>
            
            <div class="row">
              <!-- /.col -->
              <div class="col-xs-4">
                <input type="hidden" name="txtTab" id="txtTab" value="1">
                <input type="hidden" name="accion" id="accion" value="ins">
                <button type="submit" class="btn btn-primary btn-block btn-flat" id="submit">Registrar</button>
              </div>
              <!-- /.col -->
            </div>
          </form>








        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

  <!-- MODAL ACTUALIZAR USUARIOS-->
  <div class="modal fade" id="modal-UpdatedUser">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Actualizar Registro</h4>
        </div>
        <div class="modal-body">


          <form id="Lugaresup"  role="form" data-parsley-validate="" novalidate="novalidate" enctype="multipart/form-data">

            

            <div class="form-group has-feedback">
              <span class="glyphicon glyphicon-th-large form-control-feedback"></span>
              <select class="form-control" placeholder="Estado" required="" data-parsley-trigger="keyup"   data-parsley-required-message="Campo requerido" name="txtStatusup" id="txtStatusup">
                <option value="1">Activo</option>
                <option value="2">Inactivo</option>
              </select>
            </div>


            <div class="form-group has-feedback">
              <label for="txtTipo">Tipo de Destino</label>
              <select name="txtTipoup" id="txtTipoup" class="form-control" data-parsley-required-message="Campo requerido" required="">                
                <option value="Resorts">Resorts</option>
                <option value="Villa-de-Lujo">Villa de Lujo</option>
                <option value="Crucero">Crucero</option>
                <option value="Hotel">Hotel</option>
                <option value="Tour">Tour</option>
              </select>
            </div>

            <div class="form-group has-feedback">
              <input type="text" class="form-control" placeholder="Nombre"  data-parsley-required-message="Campo requerido" required="" name="txtNameup" id="txtNameup">
              <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>

            <div class="form-group has-feedback">
              <input type="text" class="form-control" placeholder="Ubicación"  data-parsley-required-message="Campo requerido" required="" name="txtUbiup" id="txtUbiup">
              <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>

            <div class="form-group has-feedback">
              <textarea name="txtDescripup" id="txtDescripup" cols="30" rows="20" class="form-control" data-parsley-required-message="Campo requerido" required="" placeholder="Ingrese una descripcion"></textarea>
              <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>


            <div class="form-group has-feedback">
            <div id="contIMG"></div>
            <label for="txtTipo">Imagen  de portada () PNG - JPG - JPEG </label>
              <input type="file" class="form-control" placeholder="Adjunte archivo "   name="txtImgup" id="txtImgup">
              <span class="glyphicon glyphicon-file form-control-feedback"></span>
            </div>


            <div class="form-group has-feedback">
            <div id="contGal1"></div>
              <label for="txtTipo">Imagenes Lugar () PNG - JPG - JPEG </label>
              <input type="file" class="form-control" placeholder="Adjunte archivo "  name="txtImgup1" id="txtImgup1">
              <span class="glyphicon glyphicon-file form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
              <div id="contGal2"></div>
              <label for="txtTipo">Imagenes Lugar () PNG - JPG - JPEG </label>
              <input type="file" class="form-control" placeholder="Adjunte archivo "  name="txtImgup2" id="txtImgup2">
              <span class="glyphicon glyphicon-file form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
              <div id="contGal3"></div>
              <label for="txtTipo">Imagenes Lugar () PNG - JPG - JPEG </label>
              <input type="file" class="form-control" placeholder="Adjunte archivo "  name="txtImgup3" id="txtImgup3">
              <span class="glyphicon glyphicon-file form-control-feedback"></span>
            </div>

            <div class="form-group has-feedback">
              <div id="contGal4"></div>
              <label for="txtTipo">Imagenes Lugar () PNG - JPG - JPEG </label>
              <input type="file" class="form-control" placeholder="Adjunte archivo "  name="txtImgup4" id="txtImgup4">
              <span class="glyphicon glyphicon-file form-control-feedback"></span>
            </div>

            <div class="form-group has-feedback">
              <div id="contGal5"></div>
              <label for="txtTipo">Imagenes Lugar () PNG - JPG - JPEG </label>
              <input type="file" class="form-control" placeholder="Adjunte archivo "  name="txtImgup5" id="txtImg5up">
              <span class="glyphicon glyphicon-file form-control-feedback"></span>
            </div>

            <div class="row">
              <!-- /.col -->
              <div class="col-xs-4">
                <input type="hidden" name="txtIdup" id="txtIdup" value="0">
                <input type="hidden" name="txtTabup" id="txtTabup" value="1">
                <input type="hidden" name="txtPerfilup" id="txtPerfilup" value="2">
                <input type="hidden" name="accion" id="accionup" value="upd">
                <button type="submit" class="btn btn-primary btn-block btn-flat" id="submitup">Actualizar</button>
              </div>
              <!-- /.col -->
            </div>
          </form>




        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->



  <!-- MODAL REGISTRO USUARIOS-->
  <div class="modal fade" id="verUsuario">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Informacion del usuario</h4>
        </div>
        <div class="modal-body">
            <table class="table table-bordered text-center">
              <tr>
                <td>
                  <p>ESTADO</p>
                </td>
                <td>
                  <div id="st"></div>
                </td>
              </tr>

              <tr>
                <td>
                  <p>Portada</p>
                </td>
                <td>
                  <div id="ft"></div>
                </td>
              </tr>

              <tr>
                <td>
                  <p>Tipo</p>
                </td>
                <td>
                  <p id="tip"></p>
                </td>
              </tr>
              <tr>
                <td>
                  <p>Título</p>
                </td>
                <td>
                  <p id="nombre"></p>
                </td>
              </tr>

              <tr>
                <td>
                  <p>Ubicación</p>
                </td>
                <td>
                  <p id="tel"></p>
                </td>
              </tr>

              <tr>
                <td>
                  <p>Descripción</p>
                </td>
                <td>
                  <p id="des"></p>
                </td>
              </tr>

              <tr>
                <td>
                  <p>Foto1</p>
                </td>
                <td>
                  <p id="fot1"></p>
                </td>
              </tr>


              <tr>
                <td>
                  <p>Foto2</p>
                </td>
                <td>
                  <p id="fot2"></p>
                </td>
              </tr>


              <tr>
                <td>
                  <p>Foto3</p>
                </td>
                <td>
                  <p id="fot3"></p>
                </td>
              </tr>


              <tr>
                <td>
                  <p>Foto4</p>
                </td>
                <td>
                  <p id="fot4"></p>
                </td>
              </tr>

              <tr>
                <td>
                  <p>Foto5</p>
                </td>
                <td>
                  <p id="fot5"></p>
                </td>
              </tr>


              <tr>
                <td>
                  <p>Fecha Registro</p>
                </td>
                <td>
                  <p id="reg"></p>
                </td>
              </tr>

            </table>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->


<div class="wrapper">
  <!-- IMPRIMIMOS EL HEADER DE LA PAGINA -->
  <?php HeaderAdmin(); ?>

  <!-- IMPRIMIMOS EL NAV DE LA PAGINA -->
  <?php NavAdmin(); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Destinos  Registrados
        <small>AdminLTE</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Destinos </a></li>
        <li class="active">Todos</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">

          <div class="row">
            <div class="col-xs-2">
              <div class="box box-default">
                <div class="box-header with-border">
                  <h3 class="box-title">Nuevo</h3>
                </div>
                <div class="box-body">
                  <div class="col-xs-12">
                    <button type="button" class="btn btn-success" id="NuevoUsuario">
                    <span class="glyphicon glyphicon-plus"></span>
                   Agregar
                  </button>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xs-2">

              <div class="info-box">
                 <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>

                 <div class="info-box-content">
                   <span class="info-box-text">Total Registros</span>
                   <span class="info-box-number">
                     <?php $rows = $user->Count(); if($db->numRows($rows) > 0){ $r = $db->datos($rows);echo "<strong>". $r['num']. "</strong>";}else{echo "NO HAY REGISTROS PARA MOSTRAR";}?>
                   </span>
                 </div>
                 <!-- /.info-box-content -->
               </div>
               <!-- /.info-box -->
            </div>

            <div class="col-xs-5">
              <div class="box box-default">
                <div class="box-header with-border">
                  <h3 class="box-title">Descarga</h3>
                </div>
                <div class="box-body">
                    <form class="form-inline" action="descarga_usuarios.php" method="post">
                      <input type="hidden" name="accion" value="desc">
                      <div class="input-group date col-xs-8" style="background:orange">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" class="form-control pull-right" id="Date1" name="Date1" value="">

                    </div>

                      <div class="input-group">
                          <button type="submit" class="btn btn-primary" id="Descargar_Filtro">
                          <span class="glyphicon glyphicon-download"></span>
                         Descargar
                        </button>
                          <button type="submit" class="btn btn-success">
                          <span class="glyphicon glyphicon-download"></span>&nbsp;Todos
                        </button>
                      </div>
                    </form>
                </div>
              </div>
            </div>


            <div class="col-xs-3">
              <div class="box box-default">
                <div class="box-header with-border">
                  <h3 class="box-title">Gestion</h3>
                </div>
                <div class="box-body">
                  <table class="table table-bordered text-center">
                    <tr>
                      <td>
                        <button type="button" class="btn btn-block btn-info">Default</button>
                      </td>
                      <td>
                        <button type="button" class="btn btn-block btn-danger">Default</button>
                      </td>
                      <td>
                        <button type="button" class="btn btn-block btn-default" id="refresh"><span class="glyphicon glyphicon-refresh"></span>&nbsp;Recargar</button>

                      </td>
                    </tr>
                  </table>

                </div>
              </div>
            </div>









          </div>

          <!-- /.box -->
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Listado de Usuarios</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Estado</th>
                  <th>Nombres</th>
                  <th>Imagén</th>
                  <th>Tipo</th>
                  <th>Acciones</th>
                </tr>
                </thead>


                <tbody>
                  <!-- DATOS DE LA TABLA USUARIOS -->
                  <?php
                      if($db->numRows($result) > 0){
                          while ($r = $db->datos($result)) {
                            $st= "";

                            if ($r['Status'] == 1) {
                              $st = '<img src="../../../front/images/edo_ok.png" class="avatar" width="16px">';
                            }elseif($r['Status'] == 0){
                              $st = '<img src="../../../front/images/edo_nok.png" class="avatar" width="16px">';
                            }

                            $delete = "";
                            $position = "";

                            if($r['Posicion'] == 1){
                                $position = "Principal";
                            }else{
                                $position = "General";
                            }


                            if ($r['Id'] == 0 ) {
                              $delete = '';
                            }else{
                              $delete = '<button type="button" onclick="javascript:DelRegistro('.$r['Id'].')" class="btn btn-danger"><span class="glyphicon glyphicon-remove-circle"></span></button>';
                            }


                            $foo = $r['Url'];
                            $tabImg = "";

                           
                            $tabImg = '<img src="../../../backend/datos/'.$r['Portada'].'" class="avatar" width="150px">';
                            

                              echo '
                                  <tr>
                                    <td>'.$st.'</td>
                                    <td>'.$r['Titulo'].'</td>
                                    <td>'.$tabImg.'</td>
                                    <td>'.$r['Tipo'].'</td>
                                    <td>
                                     <button type="button" onclick="javascript:VerUsuario('.$r['Id'].')" class="btn btn-success"><span class="glyphicon glyphicon-eye-open"></span></button>
                                     <button type="button" onclick="javascript:UpdatedUsuario('.$r['Id'].')" class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span></button>
                                      '.$delete.'
                                    </td>
                                  </tr>
                               ';
                          }

                      }else{
                        echo " No hay datos";
                      }

                   ?>

                </tbody>

              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.13
    </div>
    <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-user bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                <p>New phone +1(800)555-1234</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                <p>nora@example.com</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-file-code-o bg-green"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                <p>Execution time 5 seconds</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="label label-danger pull-right">70%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Update Resume
                <span class="label label-success pull-right">95%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Laravel Integration
                <span class="label label-warning pull-right">50%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Back End Framework
                <span class="label label-primary pull-right">68%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Allow mail redirect
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Other sets of options are available
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Expose author name in posts
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Allow the user to show his name in blog posts
            </p>
          </div>
          <!-- /.form-group -->

          <h3 class="control-sidebar-heading">Chat Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Show me as online
              <input type="checkbox" class="pull-right" checked>
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Turn off notifications
              <input type="checkbox" class="pull-right">
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Delete chat history
              <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
            </label>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- Recursos Js-->
<script src="../../../bower_components/jquery/jquery.min.js"></script>
<?php LibreriasJs(); ?>
<script src="../../../backend/js/lugares.js"></script>
<script src="../../../bower_components/moment/moment.js"></script>
<script src="../../../bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>


<!-- page script -->
<script>
  $(function () {

    $('#example1').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : false,
      'info'        : true,
      'autoWidth'   : true,
      'responsive' : true,
      'select' : true,
      'language': {
        "emptyTable":     "No hay datos disponibles en la tabla.",
        "info":         "Del _START_ al _END_ de _TOTAL_ ",
        "infoEmpty":      "Mostrando 0 registros de un total de 0.",
        "infoFiltered":     "(filtrados de un total de _MAX_ registros)",
        "infoPostFix":      "(actualizados)",
        "lengthMenu":     "Mostrar _MENU_ registros",
        "loadingRecords":   "Cargando...",
        "processing":     "Procesando...",
        "search":     "Buscar:",
        "searchPlaceholder":    "Dato para buscar",
        "zeroRecords":      "No se han encontrado coincidencias.",
        "paginate": {
          "first":      "Primera",
          "last":       "Última",
          "next":       "Siguiente",
          "previous":     "Anterior"
        }
      }


    })
  })
</script>

<script>

  $('#Date1').daterangepicker({
        autoUpdateInput: false,
        "locale": {
            "format": "YYYY-MM-DD",
            "separator": " / ",
            "applyLabel": "Guardar",
            "cancelLabel": "Cancelar",
            "fromLabel": "Desde",
            "toLabel": "Hasta",
            "customRangeLabel": "Personalizar",
            "daysOfWeek": [
                "Do",
                "Lu",
                "Ma",
                "Mi",
                "Ju",
                "Vi",
                "Sa"
            ],
            "monthNames": [
                "Enero",
                "Febrero",
                "Marzo",
                "Abril",
                "Mayo",
                "Junio",
                "Julio",
                "Agosto",
                "Setiembre",
                "Octubre",
                "Noviembre",
                "Diciembre"
            ],
            "firstDay": 1
        },

        "opens": "center",
        "showDropdowns": "true"

    });

  $('#Date1').on('apply.daterangepicker', function(ev, picker) {
      $(this).val(picker.startDate.format('YYYY-MM-DD') + ' - ' + picker.endDate.format('YYYY-MM-DD'));
  });

  $('#Date1').on('cancel.daterangepicker', function(ev, picker) {
      $(this).val('');
  });


</script>
</body>
</html>
