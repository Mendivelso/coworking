<?php
  include_once('../includes/nav.php');
  include_once('../includes/footer.php');
  include_once("../backend/datos/AnsTek_libs/integracion.inc.php");
  include_once('../backend/datos/model/textos.class.php');
  include_once('../backend/datos/model/imagenes.class.php');
  include_once('../backend/datos/model/lugares.class.php');
    /* Objeto Textos  */
    $ObjTexto = new texto($db);
    $whereTexto = " WHERE Id > 32 AND Id < 37 AND  Pagina = 'Servicios' AND Status = 1 ORDER BY Id ASC ";
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
    /*Objeto otros textos */
    $whereTexto2 = " WHERE Id > 11 AND Id < 22 AND  Pagina = 'Inicio' AND Status = 1 ORDER BY Id ASC ";
    $resultTexto2 = $ObjTexto->selectOne($whereTexto2);
    $arrayTexto2 = array();
    if($db->numRows($resultTexto2) > 0){
    while ($t2 = $db->datos($resultTexto2)) {      
       $texto2 = $t2['Texto'];
       $Sub2 = $t2['Sub'];
       $arrayTexto2[] = $texto2;
       $arraySub2[] = $Sub2;
    }
    }

    $whereTexto3 = " WHERE  Pagina = 'Tarifas' AND Status = 1 ORDER BY Id ASC ";
    $resultTexto3 = $ObjTexto->selectOne($whereTexto3);
    $arrayTexto3 = array();
    if($db->numRows($resultTexto3) > 0){
    while ($t3 = $db->datos($resultTexto3)) {      
       $texto3 = $t3['Texto'];
       $Sub3 = $t3['Sub'];
       $arrayTexto3[] = $texto3;
       $arraySub3[] = $Sub3;
    }
    }

    /* Objeto Imagenes  */
    $ObjLugar = new lugar($db);
    $whereTarifa = " WHERE Id > 0  AND Status = 1 ORDER BY Id ASC ";
    $resultTarifa = $ObjLugar->selectAll($whereTarifa);
  ?>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>El taller CoWorking</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <meta name="description" content="En el Taller Coworking vive una vida a toda máquina, moderna y veloz con un puesto flexible especialmente para ti, y claro con las mejores tarifas."/>
  <meta name="keywords" content="puestos flexibles, oficinas en bogotá, coworking bogotá, minicine, puestos individulaes, Oficinas baratas bogota, peluquería"/>
  <meta name="copyright" content="El taller Coworking "/>
  <meta name="robots" content="index, follow"/>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../front/css/bootstrap.min.css">
  <?php faIcon(2); ?>
  <!-- Recursos Propios -->
  <link rel="stylesheet" type="text/css" href="../front/css/menu.css">
  <link rel="stylesheet" type="text/css" href="../front/css/footer.css">
  <link rel="stylesheet" type="text/css" href="../front/css/espacios.css">
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
  <section class="container-fluid b-w" id="sectionPrincipalEspacios">
    <?php    
    if($db->numRows($resultTarifa) > 0){
        while ($t = $db->datos($resultTarifa)) {      
            if($t['Foto4'] == ""){
                $points = '
                <li data-target="#'.substr($t['Titulo'], 0, 4).'" data-slide-to="0" class="active"></li>
                <li data-target="#'.substr($t['Titulo'], 0, 4).'" data-slide-to="1"></li>
                <li data-target="#'.substr($t['Titulo'], 0, 4).'" data-slide-to="2"></li>
                ';

                $items = '

                <div class="item active">
                    <img src="../backend/datos/'.$t['Foto1'].'" alt="'.$t['Titulo'].'" class="espacios-Img">
                </div>
                <div class="item">
                    <img src="../backend/datos/'.$t['Foto2'].'" alt="'.$t['Titulo'].'" class="espacios-Img">
                </div>
                <div class="item ">
                    <img src="../backend/datos/'.$t['Foto3'].'" alt="'.$t['Titulo'].'" class="espacios-Img">
                </div>
    
                        
                
                ';

            }elseif($t['Foto4'] != "" AND  $t['Foto5'] == ""){

                $points = '
                <li data-target="#'.substr($t['Titulo'], 0, 4).'" data-slide-to="0" class="active"></li>
                <li data-target="#'.substr($t['Titulo'], 0, 4).'" data-slide-to="1"></li>
                <li data-target="#'.substr($t['Titulo'], 0, 4).'" data-slide-to="2"></li>
                <li data-target="#'.substr($t['Titulo'], 0, 4).'" data-slide-to="3"></li>
                ';

                $items = '

                <div class="item active">
                    <img src="../backend/datos/'.$t['Foto1'].'" alt="'.$t['Titulo'].'" class="espacios-Img">
                </div>
                <div class="item">
                    <img src="../backend/datos/'.$t['Foto2'].'" alt="'.$t['Titulo'].'" class="espacios-Img">
                </div>
                <div class="item ">
                    <img src="../backend/datos/'.$t['Foto3'].'" alt="'.$t['Titulo'].'" class="espacios-Img">
                </div>
                <div class="item ">
                    <img src="../backend/datos/'.$t['Foto4'].'" alt="'.$t['Titulo'].'" class="espacios-Img">
                </div>
    
                        
                
                ';
            }else{

                $points = '
                <li data-target="#'.substr($t['Titulo'], 0, 4).'" data-slide-to="0" class="active"></li>
                <li data-target="#'.substr($t['Titulo'], 0, 4).'" data-slide-to="1"></li>
                <li data-target="#'.substr($t['Titulo'], 0, 4).'" data-slide-to="2"></li>
                <li data-target="#'.substr($t['Titulo'], 0, 4).'" data-slide-to="3"></li>
                <li data-target="#'.substr($t['Titulo'], 0, 4).'" data-slide-to="4"></li>
                ';

                $items = '

                <div class="item active">
                    <img src="../backend/datos/'.$t['Foto1'].'" alt="'.$t['Titulo'].'" class="espacios-Img">
                </div>
                <div class="item">
                    <img src="../backend/datos/'.$t['Foto2'].'" alt="'.$t['Titulo'].'" class="espacios-Img">
                </div>
                <div class="item ">
                    <img src="../backend/datos/'.$t['Foto3'].'" alt="'.$t['Titulo'].'" class="espacios-Img">
                </div>
                <div class="item ">
                    <img src="../backend/datos/'.$t['Foto4'].'" alt="'.$t['Titulo'].'" class="espacios-Img">
                </div>
                <div class="item ">
                <img src="../backend/datos/'.$t['Foto5'].'" alt="'.$t['Titulo'].'" class="espacios-Img">
                </div>
    
                        
                
                ';

            }
           
            $tarifa = '
            
            <div class="row puesto">
            <div class="col-xs-12 col-sm-6 col-md-6 cont-p pb-e cajaEspacio">
                <div class="row text-center">
                    <h1 class="title-main p-5">'.$t['Titulo'].'</h1>
                </div>
                <div class="row text-center">
                    '.$t['Descripcion'].'
                </div>                                
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6 pr">
                <div id="'.substr($t['Titulo'], 0, 4).'" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        '.$points.'
                       
                    </ol>
    
                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                        '.$items.'                
                    </div>
    
                    <!-- Left and right controls -->
                    <a class="left carousel-control" href="#'.substr($t['Titulo'], 0, 4).'" data-slide="prev">                    
                        <i class="fa fa-arrow-left glyphicon-chevron-left" aria-hidden="true"></i>
                    </a>
                    <a class="right carousel-control" href="#'.substr($t['Titulo'], 0, 4).'" data-slide="next">
                    <i class="fa fa-arrow-right glyphicon-chevron-right" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
        </div>                                    
            ';
        echo $tarifa;
        }
    }
                     
    ?> 
    <div class="row pt-4">
        <div class="col-xs-12 col-sm-6 col-md-5 caja-form">
            <div class="row">
                <h2><?php echo $arrayTexto[0]; ?></h2>
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
                        <label class="form-check-label lb" for="exampleCheck1"><?php echo $arrayTexto[1]; ?></label>
                        <input type="hidden" name="txtId" id="txtId" value="0">
                        <input type="hidden" name="txtTab" id="txtTab" value="1">
                        <input type="hidden" name="accion" id="accion1" value="ins">
                    </div>
                    <button type="submit" class="btn btn-primary send"><?php echo $arrayTexto[2]; ?></button>
                  </form> 
            </div>                                   
        </div>
        <div class="col-xs-12 col-sm-6 col-md-7 cajaInfo pt-4"> <br><br>
        <?php echo $arrayTexto[3]; ?>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <h1 class="title-main text-center p-5" id="title-contact"><?php echo $arrayTexto2[0]; ?></h1>       
        </div>
        <div class="row serv">
            <div class="col-xs-12 col-sm-4 col-md-4 text-center s">
            <?php echo $arrayTexto2[1]; ?>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4 text-center s">
            <?php echo $arrayTexto2[2]; ?>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4 text-center s">
            <?php echo $arrayTexto2[3]; ?>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4 text-center s">
            <?php echo $arrayTexto2[4]; ?>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4 text-center s">
            <?php echo $arrayTexto2[5]; ?>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4 text-center s">
            <?php echo $arrayTexto2[6]; ?>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4 text-center s">
            <?php echo $arrayTexto2[7]; ?>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4 text-center s">
            <?php echo $arrayTexto2[8]; ?>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4 text-center s">
            <?php echo $arrayTexto2[9]; ?>
            </div>
        </div>
    </div>
    
    <div class="container text-center answer pb-5 ">
        <div class="row">
            <h3>
                 <?php echo $arraySub3[0];?> 
            </h3>
            <p>
            <?php echo $arrayTexto3[0];?> 
            </p>
        </div>
        <div class="row">
            <h3>
            <?php echo $arraySub3[1];?> 
            </h3>
            <p>
            <?php echo $arrayTexto3[1];?> 
            </p>
        </div>
        <div class="row">
            <h3>
            <?php echo $arraySub3[2];?> 
            </h3>
            <p>
            <?php echo $arrayTexto3[2];?> 
            </p>
        </div>
        <div class="row">
            <h2> <?php echo $arrayTexto3[3];?> </h2>
        </div>
        <div class="row">
            <button class="btn send" id="bntContact"> <?php echo $arraySub3[3];?> </button>
        </div>
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
