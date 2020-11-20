<?php
  include_once('../includes/nav.php');
  include_once('../includes/footer.php');  
  include_once("../backend/datos/AnsTek_libs/integracion.inc.php");
  include_once('../backend/datos/model/textos.class.php');
  include_once('../backend/datos/model/imagenes.class.php');
  include_once('../backend/datos/model/lugares.class.php');
    /* Objeto Textos  */
    $ObjTexto = new texto($db);
    $whereTexto = " WHERE Pagina = 'Eventos' AND Status = 1 ORDER BY Id ASC ";
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
  ?>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>El Taller CoWorking - Eventos </title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <meta name="description" content="En el Taller Coworking vive una vida a toda máquina, moderna y veloz con un puesto flexible especialmente para ti, y claro con las mejores tarifas."/>
  <meta name="keywords" content="puestos flexibles, oficinas en bogotá, coworking bogotá, minicine, puestos individulaes, Oficinas baratas bogota, peluquería"/>
  <meta name="copyright" content="El taller Coworking "/>
  <meta name="robots" content="index, follow"/>
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../front/css/bootstrap.min.css">
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
  <?php faIcon(2); ?>
</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
  <!-- Agregamos menu de navegacion  -->
    <?php menu(2, $db)?> 
  <section class="container-fluid b-w" id="sectionPrincipalOfertas">
    <div class="row oferta">
        <div class="container">

            <div class="row text-center">
                <h1 class="title-main p-5"><?php echo $arrayTexto[0];?></h1>
                <hr>
            </div>
            <div class="row jus">               
                <p>
                <?php echo $arrayTexto[1];?>
                </p>                
            </div>
            <div class="row text-center">
              <a href="#visita" class="" id="bntContact2"><?php echo $arrayTexto[2];?></a>
            </div>                        
        </div>        
    </div>
    <div class="container">
        <div class="row">
            <h1 class="title-main text-center p-5" id="title-contact"><?php echo $arrayTexto[3];?></h1>       
        </div>
    </div>
    <div class="container pb-5">
      <div class="row">
        <div class="col-xs-12 col-sm-4 col-md-4">
          <div class="blog shadow">
            <div class="blog-img">
              <img src="../front/images/blog/3.jpeg" alt="imagen blog" class="img-b">
            </div>
            <div class="blog-title">
              <h3>Como elegir tu espacio Coworking </h3>
            </div>
            <div class="blog-description">
              <p class=""> 
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti, vero. Voluptatem amet nostrum rem beatae vitae quisquam.
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti, vero. Voluptatem amet nostrum rem beatae vitae quisquam.
              </p>
              <p><strong>Fecha Evento : 10-10-2020</strong></p>
            </div>
            <div class="blog-btn">
              <a href="#" class="btn enlace ">VER MÁS</a>
            </div>
          </div>
        </div>
        <div class="col-xs-12 col-sm-4 col-md-4">
          <div class="blog shadow">
            <div class="blog-img">
              <img src="../front/images/blog/3.jpeg" alt="imagen blog" class="img-b">
            </div>
            <div class="blog-title">
              <h3>Como elegir tu espacio Coworking </h3>
            </div>
            <div class="blog-description">
              <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti, vero. Voluptatem amet nostrum rem beatae vitae quisquam.
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti, vero. Voluptatem amet nostrum rem beatae vitae quisquam.
              </p>
              <p><strong>Fecha Evento : 10-10-2020</strong></p>
            </div>
            <div class="blog-btn">
              <a href="#" class="btn enlace ">VER MÁS</a>
            </div>
          </div>
        </div>
        <div class="col-xs-12 col-sm-4 col-md-4">
          <div class="blog shadow">
            <div class="blog-img">
              <img src="../front/images/blog/3.jpeg" alt="imagen blog" class="img-b">
            </div>
            <div class="blog-title">
              <h3>Como elegir tu espacio Coworking </h3>
            </div>
            <div class="blog-description">
              <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti, vero. Voluptatem amet nostrum rem beatae vitae quisquam.
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti, vero. Voluptatem amet nostrum rem beatae vitae quisquam.
              </p>
              <p><strong>Fecha Evento : 10-10-2020</strong></p>
            </div>
            <div class="blog-btn">
              <a href="#" class="btn enlace ">VER MÁS</a>
            </div>
          </div>
        </div>
      </div>      
    </div>
    <div class="container text-center answer pb-5 ">
        <div class="row">
            <h1 class="title p-5">
            <?php echo $arrayTexto[4];?>
            </h1>
            <p class="p jus">
            <?php echo $arrayTexto[5];?>
            </p>
        </div> 
    </div>            
    <div class="row franja text-center">
            <h1 class="title p-5 color2">
            <?php echo $arrayTexto[6];?>
            </h1>
    </div>         
    
    <div class="container text-center answer pb-5 ">

        <div class="row evento">
            <di class="col-xs-12 col-sm-4 col-md-4 npdd">
                <img src="../front/images/blog/sala-carro.png" alt="" width="100%">
            </di>
            <di class="col-xs-12 col-sm-5 col-md-5 info">
                <h3 class="color">Mindfull Living lorem ipsum </h3>
                <p class="p jus">
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Modi facilis adipisci facere eaque pariatur vero, quasi ad ut doloremque sed nesciunt repellendus 
                </p>
                <a href=""> Más información</a>
            </di>
            <di class="col-xs-12 col-sm-3 col-md-3 date">
                <h3 class="color">
                    23 - Enero - 2020
                </h3>
            </di>   
        </div>

        <div class="row evento">
            <di class="col-xs-12 col-sm-4 col-md-4 npdd">
                <img src="../front/images/blog/sala-carro.png" alt="" width="100%">
            </di>
            <di class="col-xs-12 col-sm-5 col-md-5 info">
                <h3 class="color">Mindfull Living lorem ipsum </h3>
                <p class="p jus">
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Modi facilis adipisci facere eaque pariatur vero, quasi ad ut doloremque sed nesciunt repellendus 
                </p>
                <a href=""> Más información</a>
            </di>
            <di class="col-xs-12 col-sm-3 col-md-3 date">
                <h3 class="color">
                    23 - Enero - 2020
                </h3>
            </di>   
        </div>

        <div class="row evento">
            <di class="col-xs-12 col-sm-4 col-md-4 npdd">
                <img src="../front/images/blog/sala-carro.png" alt="" width="100%">
            </di>
            <di class="col-xs-12 col-sm-5 col-md-5 info">
                <h3 class="color">Mindfull Living lorem ipsum </h3>
                <p class="p jus">
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Modi facilis adipisci facere eaque pariatur vero, quasi ad ut doloremque sed nesciunt repellendus 
                </p>
                <a href=""> Más información</a>
            </di>
            <di class="col-xs-12 col-sm-3 col-md-3 date">
                <h3 class="color">
                    23 - Enero - 2020
                </h3>
            </di>   
        </div>      
    </div>

    <div class="row franja text-center">
        <h3>
        <?php echo $arrayTexto[7];?>
        </h3>
       
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
