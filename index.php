<?php
  include_once('includes/nav.php');
  include_once('includes/footer.php');
  include_once("backend/datos/AnsTek_libs/integracion.inc.php");
  include_once('backend/datos/model/textos.class.php');
  include_once('backend/datos/model/imagenes.class.php');


   /* Objeto Textos  */
   $ObjTexto = new texto($db);
   $whereTexto = " WHERE Pagina = 'Inicio' AND Status = 1 ORDER BY Id ASC ";
   $resultTexto = $ObjTexto->selectOne($whereTexto);
   $arrayTexto = array();
   if($db->numRows($resultTexto) > 0){
   while ($t = $db->datos($resultTexto)) {      
      $texto = $t['Texto'];
      $Sub = $t['Sub'];
      $arrayTexto[] = $texto;
      $arraySub[] = $Sub;
   }
   }
    /* Objeto Imagenes  */
    $ObjImagen = new Imagen($db);
    $whereImg = " WHERE Id > 0 AND Tipo = 'Home Galeria Principal' AND Status = 1 ORDER BY Id ASC ";
    $resultImg = $ObjImagen->selectAll($whereImg);
    /* Objeto Imagenes  Slide */
    $whereImgSlide = " WHERE Id > 0 AND Tipo = 'Home Slide' AND Status = 1 ORDER BY Id ASC ";
    $resultImgSlide = $ObjImagen->selectAll($whereImgSlide);
    /* contamos galeria HOme */
    $whereCountR = " WHERE Id > 0 AND Tipo = 'Home Galeria Principal' AND Status = 1 ORDER BY Id ASC ";
    $cuentaR = $ObjImagen->count($whereCountR);
    if($db->numRows($cuentaR) > 0){
      if($cr = $db->datos($cuentaR)) {
        $imagenR = $cr['num'];
      }
    } 

  ?>
<html>
<head>
  <meta charset="utf-8">
  <title>El Taller CoWorking</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <meta name="description" content="El taller coworking es una nueva propuesta que te brinda la posibilidad de trabajar en un lugar diferente. Estamos seguros de que nuestros espacios temáticos te sorprenderán"/>
  <meta name="keywords" content="puestos flexibles, oficinas en bogotá, coworking bogotá, minicine, puestos individulaes"/>
  <meta name="copyright" content="El taller Coworking "/>
  <meta name="robots" content="index, follow"/>
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="front/css/bootstrap.min.css">
  <?php faIcon(1); ?>
  <!-- Recursos Propios -->
  <link rel="stylesheet" type="text/css" href="front/css/menu.css">
  <link rel="stylesheet" type="text/css" href="front/css/footer.css">
  <link rel="stylesheet" type="text/css" href="front/css/inicio.css">
  <link rel="stylesheet" type="text/css" href="front/css/espacios.css">
  <link rel="stylesheet" type="text/css" href="front/css/responsive_bootstrap_carousel_mega_min.css">
  <link rel="stylesheet" type="text/css" href="front/css/tinycarousel.css">
  <link rel="stylesheet" type="text/css" href="front/css/animate.css">
  <link rel="stylesheet" type="text/css" href="front/css/magnific-popup.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="front/css/vegas.css">
  <link rel="stylesheet" type="text/css" href="front/css/monokai-sublime.css">
</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
  <!-- Agregamos menu de navegacion  -->
    <?php menu(1, $db)?>  
  <section class="container-fluid b-w" id="sectionPrincipal">
    <div class="row frase">
      <div class="col-xs-12 col-sm-6 col-md-6 frase2">
        <div class="row caja-title text-center">
          <h3 class="title-h3">
            <?php echo $arrayTexto[0]; ?>
          </h3>
          <button class="btn contactanos" id="bntContact"><?php echo $arrayTexto[1]; ?></button>
        </div>        
      </div>
      <div class="col-xs-12 col-sm-6 col-md-6 npdd fondo-recepcion" id="fd1">
              <div id="puestosEsp" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                    <?php 
                        for ($ir=0; $ir < $imagenR ; $ir++) {
                            if($ir == 0 ){
                              echo '<li data-target="#puestosEsp" data-slide-to="'.$ir.'" class="active"></li>';
                            }else{
                              echo '<li data-target="#puestosEsp" data-slide-to="'.$ir.'"></li>';
                            }
                        }
                    ?>                      
                    </ol>
                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                    <?php
                      if($db->numRows($resultImg) > 0){
                        $p = 0;
                        while ($gr = $db->datos($resultImg)) {      
                          $p++;
                          $imagenr = $gr['Imagen'];
                          $Titulor = $gr['Titulo'];
                          if($p == 1){
                            echo ' <div class="item active">
                            <img  src="backend/datos/'.$imagenr.'" alt="'.$Titulor.'" class="espacios-Img">
                          </div>';
                          }else{
                            echo ' <div class="item">
                            <img  src="backend/datos/'.$imagenr.'" alt="'.$Titulor.'" class="espacios-Img">
                          </div>';
                          }
                        }
                      }                    
                    ?>
                    </div>
                    <!-- Left and right controls -->
                    <a class="left carousel-control" href="#puestosEsp" data-slide="prev">                    
                        <i class="fa fa-arrow-left glyphicon-chevron-left" aria-hidden="true"></i>
                    </a>
                    <a class="right carousel-control" href="#puestosEsp" data-slide="next">
                    <i class="fa fa-arrow-right glyphicon-chevron-right" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
      </div>
    </div>
    
    <!-- Texto -->

    <div class="container">
      <div class="row text-center">
        <h1 class="title-main p-5"><?php echo $arrayTexto[2]; ?></h1>
      </div>
      <div class="row text-justify">
        <p class=" description">
        <?php echo $arrayTexto[3]; ?>
            </p>
      </div>
      <div class="row text-center pt-4 pb-4">
        <button class="btn contact" id="bntContact2"><?php echo $arrayTexto[1]; ?></button>
      </div>
    </div>

    <!-- ACORDEONNN  -->
    <div class="container pt-5">
      <div class="panel-group" id="accordion">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title">
              <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
              <?php echo $arraySub[4]; ?>  <i class="fa fa-plus fa-1x fs" aria-hidden="true"></i>&nbsp;   </a>
            </h4>
          </div>
          <div id="collapse1" class="panel-collapse collapse in">
            <div class="panel-body">
            <?php echo $arrayTexto[4]; ?>
            </div>
          </div>
        </div>
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title">
              <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
              <?php echo $arraySub[5]; ?> <i class="fa fa-plus fa-1x fs" aria-hidden="true"></i>&nbsp;</a>
            </h4>
          </div>
          <div id="collapse2" class="panel-collapse collapse">
            <div class="panel-body">
            <?php echo $arrayTexto[5]; ?>
            </div>
          </div>
        </div>
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title">
              <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">
              <?php echo $arraySub[6]; ?> <i class="fa fa-plus fa-1x fs" aria-hidden="true"></i>&nbsp; </a>
            </h4>
          </div>
          <div id="collapse3" class="panel-collapse collapse">
            <div class="panel-body">
            <?php echo $arrayTexto[6]; ?>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="row pt-4">
        <div class="col-xs-12 col-sm-6 col-md-5 caja-form">
            <div class="row">
                <h2><?php echo $arrayTexto[7]; ?></h2>
            </div>
            <div class="row">               
                <form id="contact-form"  role="form" data-parsley-validate="" novalidate="novalidate" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="text" class="form-control input" id="txtName" name="txtName" aria-describedby="emailHelp" data-parsley-required-message="Campo requerido" required="" placeholder="Ingrese su nombre">                        
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control input" id="txtTel" name="txtTel" data-parsley-required-message="Campo requerido" required="" placeholder="Ingrese su celular">
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control input" id="txtEmail" name="txtEmail" data-parsley-required-message="Campo requerido" required="" placeholder="Ingrese su Email">
                    </div>
                    <div class="form-group">
                        <select name="txtSer" id="txtSer" class="form-control" data-parsley-required-message="Seleccione " required="">
                        <option>Salas Coworking</option>
                        <option>Puestos flexibles </option>
                        <option>Puestos flexibles </option>
                        <option>Oficinas de 3, 4 y 5 puestos </option>
                        <option>Espacios para conferencias</option>
                        <option>Sala de cine</option>                        
                        </select>
                    </div>
                    <div class="form-group">
                        <textarea name="txtMsj" id="txtMsj" cols="" rows="4" class="form-control" placeholder="Dejanos un comentario" data-parsley-required-message="Campo requerido" required=""></textarea>
                    </div>
                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1" data-parsley-required-message="Campo requerido" required="">
                        <label class="form-check-label lb" for="exampleCheck1"><?php echo $arrayTexto[8]; ?></label>
                        <input type="hidden" name="txtId" id="txtId" value="0">
                        <input type="hidden" name="txtTab" id="txtTab" value="0">
                        <input type="hidden" name="accion" id="accion1" value="ins">
                    </div>
                    <button type="submit" class="btn btn-primary send"><?php echo $arrayTexto[9]; ?></button>
                  </form> 

            </div>                                   
        </div>
        <div class="col-xs-12 col-sm-6 col-md-7 cajaInfo">
            <div class="row">
                <h2><?php echo $arraySub[10]; ?></h2>                
            </div>
            <?php echo $arrayTexto[10]; ?>
        </div>
    </div>


    <div class="container">
        <div class="row">
            <h1 class="title-main text-center p-5" id=""><?php echo $arrayTexto[11]; ?></h1>       
        </div>
        <div class="row serv">
            <div class="col-xs-12 col-sm-4 col-md-4 text-center s">
            <?php echo $arrayTexto[12]; ?>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4 text-center s">
            <?php echo $arrayTexto[13]; ?>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4 text-center s">
            <?php echo $arrayTexto[14]; ?>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4 text-center s">
            <?php echo $arrayTexto[15]; ?>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4 text-center s">
            <?php echo $arrayTexto[16]; ?>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4 text-center s">
            <?php echo $arrayTexto[17]; ?>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4 text-center s">
            <?php echo $arrayTexto[18]; ?>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4 text-center s">
            <?php echo $arrayTexto[19]; ?>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4 text-center s">
            <?php echo $arrayTexto[20]; ?>
            </div>
        </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="row text-center">
          <h1 class="title-main p-5"><?php echo $arrayTexto[21]; ?></h1>
        </div>
      </div>
    </div>


    <div class="row">
        <div id="slider1">
          <a class="buttons prev" href="#"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
          <div class="viewport">
            <ul class="overview">

            <?php
                if($db->numRows($resultImgSlide) > 0){
                  $p = 0;
                  while ($gr = $db->datos($resultImgSlide)) {      
                    $p++;
                    $imagenr = $gr['Imagen'];
                    $Titulor = $gr['Titulo'];
                    echo '
                    <li>
                    <a href="#" title="">
                    <img  src="backend/datos/'.$imagenr.'" alt="'.$Titulor.'" title="'.$Titulor.'" class="img-responsive"/>
                    <p>
                      '.$Titulor.'
                    </p>
                    </a>
                  </li>                          
                    ';
                  }
                }
            ?>
            </ul>
          </div>
          <a class="buttons next" href="#"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
        </div>

    </div>


    <div class="container text-center answer pb-5 ">
        <div class="row">
            <h1 class="title-main color p-5" id="ubicacion">
            <?php echo $arrayTexto[22]; ?>
            </h1>    
        </div>
        <div class="row">
            <div class="col-md-6">
                <h2 class="color semi"><?php echo $arraySub[23]; ?></h2>
                <p class="regular p">
                <?php echo $arrayTexto[23]; ?>
                </p>
            </div>
            <div class="col-md-6">
                <h2 class="color semi"><?php echo $arraySub[24]; ?></h2>
                <p class="regular p">
                <?php echo $arrayTexto[24]; ?>
                </p>
            </div>
              
        </div>
        <div class="row" >
            <h1 class="title-main color p-5">
            <?php echo $arrayTexto[25]; ?>
            </h1>    
        </div>
    </div>

    <!-- map -->
    <div class="row">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3976.409350983703!2d-74.04966338474935!3d4.69872984298177!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e3f9ab12b74a291%3A0x83716c8a1058576e!2sOptima%20TM!5e0!3m2!1ses!2sco!4v1602691322871!5m2!1ses!2sco" width="100%" height="500" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>              
    </div>

    <div class="row pt-5">
      <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
          <!-- Wrapper for slides -->
          <div class="carousel-inner">
            <div class="item active item1">
              <p>
              <?php echo $arrayTexto[26]; ?>
              </p>
            </div>

            <div class="item item2">
              <p>
              <?php echo $arrayTexto[27]; ?>
              </p>
            </div>

            <div class="item item3">
              <p>
              <?php echo $arrayTexto[28]; ?>
              </p>
            </div>
          </div>

        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
          
          <i class="fa fa-chevron-left glyphicon-chevron-left" aria-hidden="true"></i>
        </a>  
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
          
          <i class="fa fa-chevron-right glyphicon-chevron-right" aria-hidden="true"></i>
        </a>
      </div>
    </div>
  <!-- Inlcuimos footer -->
      <?php footer(1, $db); ?>
  </section>
<!-- jQuery 3 -->
<script src="front/js/jquery.min2.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="front/js/bootstrap.min.js"></script>
<script src="front/js/jquery.tinycarousel.js"></script>
<script src="front/js/jquery.magnific-popup.min.js"></script>
<script src="front/js/highlight.pack.js"></script>
<script src="front/js/funciones.js"></script>
<script src="bower_components/parsleyjs/parsley.min.js"></script>
<script src="bower_components/bootbox/bootbox.min.js"></script>
<script src="bower_components/bootbox/bootbox.locales.min.js"></script>
<script src="backend/js/contactos.js"></script>
    <script type="text/javascript">
        $(document).ready(function()
        {
          $('#slider1').tinycarousel({ interval: true });
          interval = 10000;
        });
    </script>
</body>
</body>
</html>
