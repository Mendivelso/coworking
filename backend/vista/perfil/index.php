<?php
  include_once("../../../backend/datos/AnsTek_libs/integracion.inc.php");
  include_once("../resource/header.php");
  include_once("../resource/nav.php");
  include_once("../resource/librerias.php");
  include_once("../../datos/model/usuarios.class.php");
  if(Session::get('Perfil') != 1)
  header('Location: logout.php');

  /* NOMBRE PARA LA SESSION*/
  $vname = Session::get('Nombre');
  $vfoto = Session::get('Foto');
  $vPerfil = Session::get('Perfil');
  $Id = Session::get('Id');

  if ($vPerfil = 1) {
    $vPerfil = "Administrador";
  }elseif($vPerfil = 2){
    $vPerfil = "Usuario";
  }

 ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | User Profile</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <?php LibreriasCss(); ?>

</head>
<body class="hold-transition skin-blue sidebar-mini">
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
        Datos de Perfil
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Perfil</a></li>
        <li class="active">Datos perfil</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="../../../backend/datos/<?php echo $vfoto; ?>" alt="User profile picture">

              <h3 class="profile-username text-center"><?php echo $vname; ?></h3>

              <p class="text-muted text-center"><?php echo $vPerfil; ?></p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Followers</b> <a class="pull-right">1,322</a>
                </li>
                <li class="list-group-item">
                  <b>Following</b> <a class="pull-right">543</a>
                </li>
                <li class="list-group-item">
                  <b>Friends</b> <a class="pull-right">13,287</a>
                </li>
              </ul>

              <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->


          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">Datos</a></li>
              <li><a href="#timeline" data-toggle="tab">Contrasena</a></li>
              <li><a href="#settings" data-toggle="tab">Otros</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                <form class="form-horizontal" id="usuarios">
                  <div class="form-group">
                    <label for="txtImg" class="col-sm-2 control-label">Foto de Perfil (225 x 225 )</label>
                    <div class="col-sm-10">
                      <input type="file" class="form-control" placeholder="Adjunte archivo"  name="txtImgup" id="txtImg">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Cédula</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" placeholder="Cédula" data-parsley-type="number" data-parsley-required-message="Campo requerido" required="" name="txtDocup" id="txtDoc">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="txtName" class="col-sm-2 control-label">Nombre Completo</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" placeholder="Nombre Completo"  data-parsley-required-message="Campo requerido" required="" name="txtNameup" id="txtName">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Dirección</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" placeholder="Dirección" required="" data-parsley-trigger="keyup"   data-parsley-required-message="Campo requerido" name="txtDirup" id="txtDir">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputExperience" class="col-sm-2 control-label">Teléfono</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" placeholder="Celular o teléfono" required="" data-parsley-trigger="keyup"   data-parsley-required-message="Campo requerido" name="txtTelup" id="txtTel">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputSkills" class="col-sm-2 control-label">E-mail</label>
                    <div class="col-sm-10">
                      <input type="email" class="form-control" placeholder="Email" required="" data-parsley-trigger="keyup" data-parsley-type="email"  data-parsley-required-message="Campo requerido" name="txtEmlup" id="txtEml">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputSkills" class="col-sm-2 control-label">Usuario</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" placeholder="Escriba un nombre de usuario" required="" data-parsley-trigger="keyup"   data-parsley-required-message="Campo requerido" name="txtUserup" id="txtUser">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <div id="upd"></div>
                      <input type="hidden" name="txtIdup" id="txtIdup" value=<?php echo $Id; ?>>
                      <input type="hidden" name="txtTab" id="txtTab" value="1">
                      <input type="hidden" name="txtPerfilup" id="txtPerfil" value=<?php echo Session::get('Perfil'); ?>>
                      <input type="hidden" name="accion" value="upd">
                      <button type="submit" class="btn btn-danger">Actualizar</button>
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="timeline">
                <form class="form-horizontal" id="NuevaContrasena">
                  <div class="form-group">
                    <label for="inputSkills" class="col-sm-2 control-label">Nueva Contrasena</label>
                    <div class="col-sm-10">
                      <input type="password" class="form-control" placeholder="Nueva contrasena" required="" data-parsley-trigger="keyup" data-parsley-required-message="Campo requerido" name="txtPassU" id="txtPassU">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputSkills" class="col-sm-2 control-label">Confirmar Contrasena</label>
                    <div class="col-sm-10">
                      <input type="password" class="form-control" placeholder="Escriba un nombre de usuario" required="" data-parsley-trigger="keyup" data-parsley-equalto="#txtPassU"  data-parsley-equalto-message="Las contrasenas no coinciden"  data-parsley-required-message="Campo requerido" name="txtPassU2" id="txtPassU2">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <input type="hidden" name="txtUserId" id="txtUserId" value=<?php echo $Id;?>>
                      <button type="submit" class="btn btn-danger">Actualizar</button>
                    </div>
                  </div>
                </form>

              </div>
              <!-- /.tab-pane -->


              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
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
<!-- ./wrapper -->

<?php LibreriasJs(); ?>





<script src="../../js/usuarios.js"></script>

<script type="text/javascript">
  $(document).ready(function(){
    var vId = '<?php echo $Id; ?>';
    perfil(vId,0);

  });
</script>



</body>
</html>
