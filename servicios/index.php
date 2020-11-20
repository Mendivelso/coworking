<?php
  include_once('../includes/nav.php');
  include_once('../includes/footer.php');
  include_once("../backend/datos/AnsTek_libs/integracion.inc.php");
  include_once('../backend/datos/model/textos.class.php');
  include_once('../backend/datos/model/imagenes.class.php');
  include_once('../backend/datos/model/equipo.class.php');

   /* Objeto Textos  */
   $ObjTexto = new texto($db);
   $whereTexto = " WHERE Pagina = 'Servicios' AND Status = 1 ORDER BY Id ASC ";
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
    $whereImg = " WHERE Id > 0 AND Tipo = 'Servicios' AND Status = 1 ORDER BY Id ASC ";
    $resultImg = $ObjImagen->selectAll($whereImg);
    $arrayFondo = array();
    if($db->numRows($resultImg) > 0){
        while ($f = $db->datos($resultImg)) {      
            $fondo = $f['Imagen'];
            $arrayFondo[] = $fondo;
            $titulo = $f['Titulo'];
            $arrayTitulo[] = $titulo;

        }
    }

    /* OBJETO INTEGRANTES EQUIPO */
    $integrante =  new integrante($db);
    $whereE = " WHERE Id > 0 AND Status = 1 ORDER BY Id ASC ";
    $resultE = $integrante->selectAll($whereE);

  ?>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>El Taller CoWorking - Servicios </title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <meta name="description" content="En el Taller Coworking vive una vida a toda máquina, moderna y veloz con un puesto flexible especialmente para ti, y claro con las mejores tarifas."/>
  <meta name="keywords" content="puestos flexibles, oficinas en bogotá, coworking bogotá, minicine, puestos individulaes, Oficinas baratas bogota, peluquería"/>
  <meta name="copyright" content="El taller Coworking "/>
  <meta name="robots" content="index, follow"/>
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../front/css/bootstrap.min.css">
  <?php faIcon(2); ?>

  <!-- Recursos Propios -->
  <link rel="stylesheet" type="text/css" href="../front/css/menu.css">
  <link rel="stylesheet" type="text/css" href="../front/css/footer.css">
  <link rel="stylesheet" type="text/css" href="../front/css/ofertas.css">  
  <link rel="stylesheet" type="text/css" href="../front/css/responsive_bootstrap_carousel_mega_min.css">
  <link rel="stylesheet" type="text/css" href="../front/css/tinycarousel.css">
  <link rel="stylesheet" type="text/css" href="../front/css/animate.css">
  <link rel="stylesheet" type="text/css" href="../front/css/magnific-popup.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="../front/css/vegas.css">
  <link rel="stylesheet" type="text/css" href="../front/css/monokai-sublime.css">
</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
  <!-- Agregamos menu de navegacion  -->
    <?php menu(2, $db)?> 
  <section class="container-fluid b-w" id="sectionPrincipalOfertas">    
    <div class="row oferta">
        <div class="container">
            <div class="row text-center">
                <h1 class="title-main p-5"><?php echo $arrayTexto[0]; ?> </h1>
                <hr>
            </div>
            <div class="row text-center">
                <h3><?php echo $arrayTexto[1]; ?> </h3>
                <p>
                <?php echo $arraySub[1]; ?> 
                </p>
                <a  class="" id="bntContact2"><?php echo $arrayTexto[2]; ?> </a>
            </div>                        
        </div>        
    </div>
    <div class="container-fluid ">
    <?php
      if($db->numRows($resultE) > 0){
        $n = 0;
        while ($int = $db->datos($resultE)) {      
          $n++;           
          if($int['Id'] == 1){
            $espacio = '

            <div class="row espacio">
              <div class="col-xs-12 col-sm-6 col-md-6 pl" id="img-dest">
                <img  src="../backend/datos/'.$int['Foto'].'" alt="'.$int['Nombre'].'"  class="espacios-Img"> 
              </div>
              <div class="col-xs-12 col-sm-6 col-md-6 cont-p">
                  <h2 class="color semi">'.$int['Nombre'].'</h2>
                  <p>
                  '.$int['Detalle'].'
                  </p>
                  
              </div>
              <div class="col-xs-12 col-sm-6 col-md-6 pl" id="img-mobil">
                <img src="../backend/datos/'.$int['Foto'].'" alt="'.$int['Nombre'].'" class="espacios-Img">
              </div>
            </div>
                                    
            ';
          }elseif($int['Id'] == 3){

            $espacio = '
            <div class="row espacio">
              <div class="col-xs-12 col-sm-6 col-md-6 pl" id="img-dest2">
                <img src="../backend/datos/'.$int['Foto'].'" alt="'.$int['Nombre'].'" class="espacios-Img">
              </div>
              <div class="col-xs-12 col-sm-6 col-md-6 cont-p">
              <h2 class="color semi">'.$int['Nombre'].'</h2>
                  <p>
                  '.$int['Detalle'].'
                  </p>
                  
              </div>
              <div class="col-xs-12 col-sm-6 col-md-6 pl" id="img-mobil2">
                <img src="../backend/datos/'.$int['Foto'].'" alt="'.$int['Nombre'].'" class="espacios-Img">
              </div>
            </div>
                        
            ';

          }elseif($int['Id'] == 5){
              $espacio = '

              <div class="row espacio">
                <div class="col-xs-12 col-sm-6 col-md-6 pl" id="img-dest3">
                  <img src="../backend/datos/'.$int['Foto'].'" alt="'.$int['Nombre'].'" class="espacios-Img">
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6 cont-p">
                <h2 class="color semi">'.$int['Nombre'].'</h2>
                    <p>
                    '.$int['Detalle'].' 
                    </p>                    
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6 pl" id="img-mobil3">
                  <img src="../backend/datos/'.$int['Foto'].'" alt="'.$int['Nombre'].'" class="espacios-Img">
                </div>
              </div>                            
              ';


          }elseif($int['Id'] == 6){

            $espacio = '
            <div class="row espacio">
            <div class="col-xs-12 col-sm-6 col-md-6 pl" id="img-dest4">
              <img src="../backend/datos/'.$int['Foto'].'" alt="'.$int['Nombre'].'" class="espacios-Img">
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6 cont-p">
            <h2 class="color semi">'.$int['Nombre'].'</h2>
                <p>
                '.$int['Detalle'].' 
                </p>
                
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6 pl" id="img-mobil4">
              <img  src="../backend/datos/'.$int['Foto'].'" alt="'.$int['Nombre'].'" class="espacios-Img">
            </div>
          </div>
            
            ';
          }else{

            $espacio = '
              
            <div class="row espacio">
              <div class="col-xs-12 col-sm-6 col-md-6 cont-p pb-e">
              <h2 class="color semi">'.$int['Nombre'].'</h2>
                  <p>
                  '.$int['Detalle'].' 
                  </p>                                  
              </div>
              <div class="col-xs-12 col-sm-6 col-md-6 pr">
                <img src="../backend/datos/'.$int['Foto'].'" alt="'.$int['Nombre'].'" class="espacios-Img">
              </div>
            </div>

            ';
          }          
          echo $espacio;         
        }

      }
    ?>
    </div>
    <div class="row franja text-center">
        <h3><?php echo $arrayTexto[1]; ?> </h3>
        <p>
        <?php echo $arraySub[1]; ?> 
        </p>
        <a href="#visita" class=""><?php echo $arrayTexto[2]; ?></a>
    </div>

    <div class="row pt-4">
        <div class="col-xs-12 col-sm-6 col-md-5 caja-form">
            <div class="row">
                <h2><?php echo $arrayTexto[3]; ?></h2>
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
                        <label class="form-check-label lb" for="exampleCheck1"><?php echo $arrayTexto[4]; ?></label>
                        <input type="hidden" name="txtId" id="txtId" value="0">
                        <input type="hidden" name="txtTab" id="txtTab" value="1">
                        <input type="hidden" name="accion" id="accion1" value="ins">
                    </div>
                    <button type="submit" class="btn btn-primary send"><?php echo $arrayTexto[5]; ?></button>
                  </form> 
            </div>                                   
        </div>
        <div class="col-xs-12 col-sm-6 col-md-7 cajaInfo pt-4"> <br><br>
          <?php echo $arrayTexto[6]; ?>
        </div>
    </div>


    <div class="container text-center answer pb-5 ">
        <div class="row">
            <h1 class="title p-5">
            <?php echo $arraySub[7]; ?>
            </h1>
            <p class="p jus">
            <?php echo $arrayTexto[7]; ?>
              
            </p>
        </div>

    </div>


    <div class="container pb-5">
      <div class="row">
        <div class="col-xs-12 col-sm-4 col-md-4">
          <div class="blog shadow">
            <div class="blog-img text-center">
              <img src="../backend/datos/<?php echo $arrayFondo[0]; ?>" alt="imagen blog" class="">
            </div>
            <div class="blog-title">
              <h3><?php echo $arrayTitulo[0]; ?></h3>
            </div>
            <div class="blog-description">
              <p>
               
              </p>
            </div>
           
          </div>
        </div>
        <div class="col-xs-12 col-sm-4 col-md-4">
          <div class="blog shadow">
            <div class="blog-img text-center">
              <img src="../backend/datos/<?php echo $arrayFondo[1]; ?>" alt="imagen blog" class="">
            </div>
            <div class="blog-title">
            <h3><?php echo $arrayTitulo[1]; ?></h3>
            </div>
            <div class="blog-description">
              
            </div>
         
          </div>
        </div>
        <div class="col-xs-12 col-sm-4 col-md-4">
          <div class="blog shadow">
            <div class="blog-img text-center">
              <img src="../backend/datos/<?php echo $arrayFondo[2]; ?>" alt="imagen blog" class="">
            </div>
            <div class="blog-title">
            <h3><?php echo $arrayTitulo[2]; ?></h3>
            </div>
            <div class="blog-description">
              <p>
              
              </p>
            </div>
            
          </div>
        </div>
      </div>      
    </div>

    <div class="container text-center answer pb-5 ">
        <div class="row">
            <h1 class="title-main color p-5">
            <?php echo $arrayTexto[8]; ?>
            </h1>    
        </div>
        <div class="row">
            <div class="col-md-6">
                <h2 class="color semi"><?php echo $arraySub[9]; ?></h2>
                <p class="regular p">
                <?php echo $arrayTexto[9]; ?>
                </p>
            </div>
            <div class="col-md-6">
                <h2 class="color semi"><?php echo $arraySub[10]; ?></h2>
                <p class="regular p">
                <?php echo $arrayTexto[10]; ?>
                </p>
            </div>              
        </div>        
    </div>    
    <div class="row franja text-center">
        <h3><?php echo $arrayTexto[11]; ?></h3>      
    </div>
  <!-- Inlcuimos footer -->
      <?php footer(2, $db); ?>
  </section>
<!-- jQuery 3 -->
<script src="../front/js/jquery.min2.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../front/js/bootstrap.min.js"></script>
<script src="../front/js/jquery.tinycarousel.js"></script>
<script src="../front/js/jquery.magnific-popup.min.js"></script>
<script src="../front/js/highlight.pack.js"></script>
<script src="../front/js/funciones.js"></script>
<script src="../bower_components/parsleyjs/parsley.min.js"></script>
<script src="../bower_components/bootbox/bootbox.min.js"></script>
<script src="../bower_components/bootbox/bootbox.locales.min.js"></script>
<script src="../backend/js/contactos.js"></script>
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
