<?php
  include_once("../../../backend/datos/AnsTek_libs/integracion.inc.php");
  include_once("../resource/header.php");
  include_once("../resource/nav.php");
  include_once("../resource/librerias.php");
  include_once("../../datos/model/equipo.class.php");

  /*Validamos la existencia de la session*/
  if(Session::get('Perfil') != 1)
    header('Location: logout.php');

  /* Objeto Registros */
  $ObjResultado = new integrante($db);
  $whereRegistros = " WHERE Id > 0 ORDER BY Id ASC";
  $result = $ObjResultado->selectAll($whereRegistros);


  /* CUENTA REGISTROS*/
  $rows = $ObjResultado->Count();
  if($db->numRows($rows) > 0){
   $r = $db->datos($rows);
    $NumerodeRegistros = $r['num'];
  }else{
  echo "NO HAY REGISTROS PARA MOSTRAR";
  }





 ?>
<!DOCTYPE>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Equipo</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <?php LibreriasCss(); ?>
  <link rel="stylesheet" type="text/css" href="../../../bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <link rel="stylesheet" type="text/css" href="../../css/cargar.css">
  <link rel="stylesheet" type="text/css" href="../../../bower_components/sweetalert/sweetalert.css">
</head>
<body class="hold-transition skin-blue sidebar-mini">

  <!-- /.Cargas Regsitros -->
  <div class="modal fade" id="modal-CargarRegistros">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Subir registros</h4>
        </div>
        <div class="modal-body">
            <div class="principal">
              <h3>subir archivos</h3>
                <form  id="uploadForm" name="frmupload" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="txtCategoria">Seleccione una categoría</label>
                      <select class="form-control" name="txtCategoria" id="txtCategoria">
                        <option>Seleccione...</option>
                        <option value="1">BABY ROK</option>
                        <option value="2">MICRO ROK</option>
                        <option value="3">MINI ROK</option>
                        <option value="4">JUNIOR ROK</option>
                        <option value="5">SENIOR ROK</option>
                        <option value="6">SUPER ROK</option>
                        <option value="7">SHIFTER MASTER ROK</option>
                        <option value="8">SHIFTER ROK</option>
                        <option value="9">EQUIPOS</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <input type="file" id="uploadImage" name="uploadImage" class="form-control" />
                    </div>

                    <div class="form-group">
                      <button id="submitButton" type="submit" name='btnSubmit' class="btn btn-success">Comenzar la carga</button>
                      <input type="hidden" name="accion" value="car">
                    </div>
                </form>
                <div class='progress' id="progressDivId">
                    <div class='progress-bar' id='progressBar'></div>
                    <div class='percent' id='percent'>0%</div>
                </div>
                <div style="height: 10px;"></div>
                <div id='outputImage'></div>
            </div>


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
  <div class="modal fade" id="modal-Registros">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Integrante Nuevo</h4>
        </div>
        <div class="modal-body">
          <form id="registros"  role="form" data-parsley-validate="" novalidate="novalidate" enctype="multipart/form-data">
          <div class="form-group has-feedback">
              <span class="glyphicon glyphicon-th-large form-control-feedback"></span>
              <select class="form-control" placeholder="Posición" required="" data-parsley-trigger="keyup"   data-parsley-required-message="Campo requerido" name="txtStatus" id="txtStatus">
                <option value="1">Activo</option>
                <option value="2">Inactivo</option>
              </select>
            </div>
            <div class="form-group has-feedback">
              <input type="text" class="form-control" placeholder="Nombre Completo"  data-parsley-required-message="Campo requerido" required="" name="txtName" id="txtName">
              <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
              <input type="text" class="form-control" placeholder="Cargo" required="" data-parsley-trigger="keyup"   data-parsley-required-message="Campo requerido" name="txtCargo" id="txtCargo">
              <span class="glyphicon glyphicon-earphone form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
              <input type="email" class="form-control" placeholder="Email" required="" data-parsley-trigger="keyup" data-parsley-type="email"  data-parsley-required-message="Campo requerido" name="txtEmail" id="txtEmail">
              <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
              <label for="">Adjunte Foto (PNG o JPG 160px por 160px)</label>
              <input type="file" class="form-control"  required="" data-parsley-trigger="keyup"   data-parsley-required-message="Campo requerido" name="txtImg" id="txtImg">
              <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback" id="pass2">
                <textarea name="txtDetalle" id="txtDetalle" class="form-control" rows="5" placeholder="Descripcion del cargo" required="" data-parsley-required-message="Campo requerido"></textarea>
              <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
            </div>
            <div class="row">
              <!-- /.col -->
              <div class="col-xs-4">
                <input type="hidden" name="txtId" id="txtId" value="0">
                <input type="hidden" name="txtTab" id="txtTab" value="1">
                <input type="hidden" name="accion" id="accion1" value="ins">
                <button type="submit" class="btn btn-primary btn-block btn-flat" id="submit1">Registrar</button>
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
          <h4 class="modal-title">Actualizar Integrante</h4>
        </div>
        <div class="modal-body">
          <form id="usuariosup"  role="form" data-parsley-validate="" novalidate="novalidate" enctype="multipart/form-data">
              <div class="form-group has-feedback">
                <select class="form-control" name="txtStatusup" id="txtStatusup" required="" data-parsley-required-message="Campo requerido">
                  <option value="">Seleccione.</option>
                  <option value="1">Activo</option>
                  <option value="0">Inactivo</option>
                </select>
              </div>

            <div class="form-group has-feedback">
              <input type="text" class="form-control" placeholder="Nombre Completo"  data-parsley-required-message="Campo requerido" required="" name="txtNameup" id="txtNameup">
              <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
              <input type="text" class="form-control" placeholder="Cargo" required="" data-parsley-trigger="keyup"   data-parsley-required-message="Campo requerido" name="txtCargoup" id="txtCargoup">
              <span class="glyphicon glyphicon-earphone form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
              <input type="email" class="form-control" placeholder="Email" required="" data-parsley-trigger="keyup" data-parsley-type="email"  data-parsley-required-message="Campo requerido" name="txtEmailup" id="txtEmailup">
              <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
              <div id="FotoInt"></div>
              <input type="file" class="form-control" placeholder="Programa"  data-parsley-trigger="keyup"   name="txtImgup" id="txtImgup">
              <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
              <textarea name="txtDetalleup" id="txtDetalleup" class="form-control" rows="5" placeholder="Tus comentarias" required="" data-parsley-required-message="Campo requerido"></textarea>
              <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>


            <div class="row">
              <!-- /.col -->
              <div class="col-xs-4">
                <input type="hidden" name="txtIdup" id="txtIdup" value="0">
                <input type="hidden" name="txtTabup" id="txtTabup" value="1">
                <input type="hidden" name="accion" id="accion2" value="upd">
                <button type="submit" class="btn btn-primary btn-block btn-flat" id="submit2">Actualizar</button>
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
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Informacion del Registro</h4>
        </div>
        <div class="modal-body">
            <table class="table table-bordered text-center">
              <tr>
                <td>
                  <p>Estado</p>
                </td>
                <td>
                  <div id="st"></div>
                </td>
              </tr>

              <tr>
                <td>
                  <p>Cargo</p>
                </td>
                <td>
                  <p id="car"></p>
                </td>
              </tr>

              <tr>
                <td>
                  <p>Email</p>
                </td>
                <td>
                  <p id="ema"></p>
                </td>
              </tr>

              <tr>
                <td>
                  <p>Nombre</p>
                </td>
                <td>
                  <p id="nombre"></p>
                </td>
              </tr>

              <tr>
                <td>
                  <p>Detalle</p>
                </td>
                <td>
                  <p id="de"></p>
                </td>
              </tr>

              <tr>
                <td>
                  <p>Foto</p>
                </td>
                <td>
                  <div id="FT"></div>
                </td>
              </tr>

              

              <tr>
                <td>
                  <p>Fecha Registro</p>
                </td>
                <td>
                  <p id="FechaR"></p>
                </td>
              </tr>

              <tr>
                <td>
                  <p>Última Actualización</p>
                </td>
                <td>
                  <p id="FechaU"></p>
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
        RESULTADOS
        <small>AdminLTE</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">RESULTADOS</a></li>
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
                    <button type="button" class="btn btn-success" id="NuevoRegistro22">
                    <span class="glyphicon glyphicon-plus"></span>
                   Agregar
                  </button>
                  <button type="button" class="btn btn-danger" onclick="DelRegistroVarios();">Eliminar</button>
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
                     <?php
                     /*Cuenta Regsitros*/
                     echo $NumerodeRegistros;
                      ?>
                   </span>
                 </div>
                 <!-- /.info-box-content -->
               </div>
               <!-- /.info-box -->
            </div>

            <div class="col-xs-5">
              <div class="box box-default">
                <div class="box-header with-border">
                  <h3 class="box-title">Descarga de Registros</h3>
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
                  <h3 class="box-title">Subida de regsitros</h3>
                </div>
                <div class="box-body">
                  <table class="table table-bordered text-center">
                    <tr>
                      <td>
                        <a class="btn btn-block btn-success" title="Descargar Formato" download="Resultados.xlsx" href="Resultados.xlsx"><span class="glyphicon glyphicon-save-file" style="font-size: 22px;"></span></a>
                      </td>
                      <td>
                        <button type="button" class="btn btn-block btn-warning" title="Subir Formato" data-toggle="modal" data-target="#modal-CargarRegistros"><span class="glyphicon glyphicon-open-file" style="font-size: 22px;"></span></button>
                      </td>
                      <td>
                        <button type="button" class="btn btn-block bg-maroon" title="Recargar Pagina" id="refresh"><span class="glyphicon glyphicon-refresh" style="font-size: 22px;"></span></button>
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
              <h3 class="box-title">Listado de Registros</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th><input type="checkbox" id="select_all"/> All</th>
                  <th>Estado</th>
                  <th>Nombre</th>
                  <th>Cargo</th>
                  <th>Foto</th>
                  <th>Acciones</th>
                </tr>
                </thead>

                <tbody>
                  <!-- DATOS DE LA TABLA USUARIOS -->
                  <?php
                      if($db->numRows($result) > 0){
                          while ($r = $db->datos($result)) {
                            if ($r['Status'] == 1) {
                              $st = '<img src="../../../front/images/edo_ok.png" class="avatar" width="16px">';
                            }elseif($r['Status'] == 0){
                              $st = '<img src="../../../front/images/edo_nok.png" class="avatar" width="16px">';
                            }

                            $tabImg = "";

                           
                            $tabImg = '<img src="../../../backend/datos/'.$r['Foto'].'" class="avatar" width="150px">';
                          
                              echo '
                                  <tr>
                                    <td>
                                      <input type="checkbox" name="IdsRegistros[]" value='.$r['Id'].' class ="update_registro">
                                    </td>
                                    <td>'.$st.'</td>
                                    <td>'.$r['Nombre'].'</td>
                                    <td>'.$r['Cargo'].'</td>
                                    <td>'.$tabImg.'</td>

                                    <td>
                                     <button type="button" onclick="javascript:VerUsuario('.$r['Id'].')" class="btn btn-success"><span class="glyphicon glyphicon-eye-open"></span></button>
                                     <button type="button" onclick="javascript:UpdatedUsuario('.$r['Id'].')" class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span></button>
                                     <button type="button" onclick="javascript:DelRegistro('.$r['Id'].')" class="btn btn-danger"><span class="glyphicon glyphicon-remove-circle"></span></button>
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
<?php LibreriasJs(); ?>
<script src="../../../backend/js/equipo.js"></script>
<script src="../../../bower_components/moment/moment.js"></script>
<script src="../../../bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="../../../bower_components/sweetalert/sweetalert.min.js"></script>
<script src="../../../bower_components/sweetalert/jquery.form.min.js"></script>


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
