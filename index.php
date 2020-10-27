<?php

  include_once('includes/nav.php');
  include_once('includes/footer.php');


  ?>


<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>El Taller CoWorking</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="front/css/bootstrap.min.css">
  <link rel="shortcut icon" href="front/images/logo-menu2.png" type="image/x-icon">


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
    <?php menu(1)?> 




 


  <section class="container-fluid b-w" id="sectionPrincipal">
    <div class="row frase">
      <div class="col-xs-12 col-sm-6 col-md-6 frase2">
        <div class="row caja-title text-center">
          <h3 class="title-h3">
          Bienvenidos a El Taller Coworking, un lugar innovador <br> donde vivirás experiencias inolvidables.
          </h3>
          <button class="btn contactanos">CONTÁCTANOS</button>
        </div>        
      </div>
      <div class="col-xs-12 col-sm-6 col-md-6 npdd fondo-recepcion" id="fd1">
        
      </div>
    </div>
    
    <!-- Texto -->

    <div class="container">
      <div class="row text-center">
        <h1 class="title-main p-5">El Taller <span>Coworking</span></h1>
      </div>
      <div class="row text-justify">
        <p class=" description">
          Es una nueva propuesta que te brinda la posibilidad de trabajar en un lugar diferente. Estamos seguros de que nuestros espacios temáticos te sorprenderán. 
          Queremos que tu lugar de trabajo sea todo un viaje de aventura y velocidad. <br> <br>


          Tenemos claro que el ambiente es vital para el trabajo, por esto llevamos nuestra propuesta más allá. Sabemos que buscas algo más que un espacio rígido, estamos seguros de que aquí podrás explotar tu potencial máximo. <br>

          

          
        </p>
      </div>
      <div class="row text-center pt-4 pb-4">
        <button class="btn contact">CONTÁCTANOS</button>
      </div>
    </div>

    <!-- ACORDEONNN  -->
    <div class="container pt-5">
      <div class="panel-group" id="accordion">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title">
              <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                Tarifas que se adaptan para ti  <i class="fa fa-plus fa-1x fs" aria-hidden="true"></i>&nbsp;   </a>
            </h4>
          </div>
          <div id="collapse1" class="panel-collapse collapse in">
            <div class="panel-body">
            
                En el Taller Coworking sabemos que no todos tienen las mismas necesidades en cuanto a tiempo y espacio por esto te ofrecemos variedad de tarifas para todas las personas.  <br>
                Con nuestros diferentes planes podrás tener la libertad total a la hora de trabajar y la posibilidad de asistir todos los días del año, en jornada laboral e incluso solo durante algunas horas. 

            </div>
          </div>
        </div>
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title">
              <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
              Comunidad, actividades y eventos Coworking <i class="fa fa-plus fa-1x fs" aria-hidden="true"></i>&nbsp;</a>
            </h4>
          </div>
          <div id="collapse2" class="panel-collapse collapse">
            <div class="panel-body">
            En nuestras instalaciones lograrás encontrar diferentes salas y podrás escoger la que mejor se adapte en función a la actividad que desarrollas, podrás encontrar puestos flexibles, oficinas compartidas, salas de reuniones, espacios para conferencias, mini cinema, café y salón de juegos. <br>
              

            </div>
          </div>
        </div>
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title">
              <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">
              Ubicación del Coworking en Bogotá <i class="fa fa-plus fa-1x fs" aria-hidden="true"></i>&nbsp; </a>
            </h4>
          </div>
          <div id="collapse3" class="panel-collapse collapse">
            <div class="panel-body">
            Estamos ubicados en Bogotá en el barrio Santa Bárbara, el sector que te brinda esparcimiento, gastronomía del más alto nivel, con facilidades de movilidad, restaurantes, clínicas, centros comerciales y vías principales.

            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="row pt-4">
        <div class="col-xs-12 col-sm-6 col-md-5 caja-form">
            <div class="row">
                <h2>Usa este formulario para contactar con nosotros</h2>
            </div>
            <div class="row">
                <form id="form-contact">
                    <div class="form-group">
                        <input type="text" class="form-control" id="email" placeholder="Nombre">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="pwd" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="pwd" placeholder="Teléfono">
                    </div>
                    <div class="form-group">
                        <select name="" id="" class="form-control">
                        <option>Salas Coworking</option>
                        <option>Puestos flexibles </option>
                        <option>Puestos flexibles </option>
                        <option>Oficinas de 3, 4 y 5 puestos </option>
                        <option>Espacios para conferencias</option>
                        <option>Sala de cine</option>
                        
                        </select>
                    </div>
                    <div class="form-group">
                        <textarea name="" id="" cols="" rows="4" class="form-control" placeholder="Comentarios"></textarea>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox">Acepto la Política de Privacidad</label>
                    </div>
                    <button type="submit" class="btn btn-default send">Enviar</button>
                </form> 
            </div>                                   
        </div>
        <div class="col-xs-12 col-sm-6 col-md-7 cajaInfo">
            <div class="row">
                <h2>Espacios flexibles a tu medida en nuestro coworking</h2>                
            </div>
            <div class="row">
                <h3>PLANES:</h3>        
                <ul>
                  <li>Puestos flexibles </li>
                  <li>Oficinas de 3, 4 y 5 puestos</li>
                  <li>Espacios para conferencias</li>
                  <li>Sala de cine</li>
                </ul>
                
            </div>
            <div class="row">
               
                <ul>
                    <li>Participa en <span>eventos y actividades.</span></li>
                    <li>Disfruta de las <span>zonas comunes con otros coworkers.</span></li>
                    <li>Lunes a Viernes de 7:00am a 10:00pm
                      Sábados de 8:00am a 4:00pm
                    </span></li>
                </ul>
            </div>
        </div>
    </div>


    <div class="container">
        <div class="row">
            <h1 class="title-main text-center p-5" id="">Servicios incluidos en nuestro <br><span>espacio coworking</span></h1>       
        </div>
        <div class="row serv">
            <div class="col-xs-12 col-sm-4 col-md-4 text-center s">
                <i class="fa fa-window-maximize fa-5x" aria-hidden="true"></i>
                
                <p>
                    Servicio de Recepcion
                </p>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4 text-center s">
                <i class="fa fa-wifi fa-5x" aria-hidden="true"></i>
                <p>
                    Acceso a la red wifi
                </p>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4 text-center s">
            <i class="fa fa-users fa-5x" aria-hidden="true"></i>
                <p>
                Sala de juntas
                </p>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4 text-center s">
                <i class="fa fa-street-view fa-5x" aria-hidden="true"></i>
                <p>
                Control de acceso
                </p>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4 text-center s">
                <i class="fa fa-video-camera fa-5x" aria-hidden="true"></i>
                <p>
                Mini cine 
                </p>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4 text-center s">
                <i class="fa fa-coffee fa-5x" aria-hidden="true"></i>
                <p>
                Cafetería
                </p>
            </div>

            <div class="col-xs-12 col-sm-4 col-md-4 text-center s">
                <i class="fa fa-scissors fa-5x" aria-hidden="true"></i>
                <p>
                Peluquería 
                </p>
            </div>

            <div class="col-xs-12 col-sm-4 col-md-4 text-center s">
                <i class="fa fa-gamepad fa-5x" aria-hidden="true"></i>
                <p>
                Salón de juegos 
                </p>
            </div>

            <div class="col-xs-12 col-sm-4 col-md-4 text-center s">
                <i class="fa fa-bicycle fa-5x" aria-hidden="true"></i>
                <p>
                Parqueadero para motos, patinetas, bicicletas
                </p>
            </div>
        </div>
    </div>




    <div class="container">
      <div class="row">
        <div class="row text-center">
          <h1 class="title-main p-5">Centro de <span>Coworking</span> en Bogotá</h1>
        </div>
      </div>
    </div>


    <div class="row">
        <div id="slider1">
          <a class="buttons prev" href="#"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
          <div class="viewport">
            <ul class="overview">
              <li>
                <a href="#" title="">
                <img src="front/images/working/oficina.jpeg" class="img-responsive" title=""/>
                <p>
                  Saja de Juntas
                </p>
                </a>
              </li>

              <li>
                <a href="#" title="">
                <img src="front/images/working/oficina.jpeg" class="img-responsive" title=""/>
                <p>
                  Recepción 
                </p>
                </a>
              </li>
              <li>
                <a href="#" title="">
                <img src="front/images/working/oficina.jpeg" class="img-responsive" title=""/>
                <p>
                    Puestos Individuales
                </p>
                </a>
              </li>
              <li>
                <a href="#" title="">
                <img src="front/images/working/oficina.jpeg" class="img-responsive" title=""/>
                <p>
                  Café
                </p>
                </a>
              </li>
              <li>
                <a href="#" title="">
                <img src="front/images/working/oficina.jpeg" class="img-responsive" title=""/>
                <p>
                  Mini Cine
                </p>
                </a>
              </li>
              <li>
                <a href="#" title="">
                <img src="front/images/working/oficina.jpeg" class="img-responsive" title=""/>
                <p>
                  Salón de Juegos
                </p>
                </a>
              </li>
              <li>
                <a href="#" title="">
                <img src="front/images/working/oficina.jpeg" class="img-responsive" title=""/>
                <p>
                  Café
                </p>
                </a>
              </li>
              <li>
                <a href="#" title="">
                <img src="front/images/working/oficina.jpeg" class="img-responsive" title=""/>
                <p>
                  Mini Cine
                </p>
                </a>
              </li>
              
            </ul>
          </div>
          <a class="buttons next" href="#"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
        </div>

    </div>


    <div class="container text-center answer pb-5 ">
        <div class="row">
            <h1 class="title-main color p-5" id="ubicacion">
                Oficina coworking El Taller <br>
                se adapta a tus necesidades
            </h1>    
        </div>


        <div class="row">
            <div class="col-md-6">
                <h2 class="color semi">ECONÓMICO</h2>
                <p class="regular p">
                    No pagues toda la oficina, ni todas las salas, <br> solo lo que uses, pero con la posibilidad de tenerlo todo.
                </p>
            </div>
            <div class="col-md-6">
                <h2 class="color semi">FLEXIBLE</h2>
                <p class="regular p">
                     El espacio deja de ser un problema, <br> disfruta de una oficina moderna sin la carga de gestión.
                </p>
            </div>
              
        </div>

        <div class="row" >
            <h1 class="title-main color p-5">
               EL TALLER COWORKING EN BOGOTÁ 
            </h1>    
        </div>

    </div>


    <!-- map -->
    <div class="row">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3976.409350983703!2d-74.04966338474935!3d4.69872984298177!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e3f9ab12b74a291%3A0x83716c8a1058576e!2sOptima%20TM!5e0!3m2!1ses!2sco!4v1602691322871!5m2!1ses!2sco" width="100%" height="500" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>              
    </div>



    <!-- <div class="row text-center">
      <h1 class="title-main p-5">Blog Coworking <span>Bogotá</span></h1>
    </div>

    <div class="container pb-5">
      <div class="row">
        <div class="col-md-4">
          <div class="blog shadow">
            <div class="blog-img">
              <img src="front/images/blog/3.jpeg" alt="imagen blog" class="img-b">
            </div>
            <div class="blog-title">
              <h3>Como elegir tu espacio Coworking </h3>
            </div>
            <div class="blog-description">
              <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti, vero. Voluptatem amet nostrum rem beatae vitae quisquam.
              </p>
            </div>
            <div class="blog-btn">
              <a href="#" class="btn enlace ">VER MÁS</a>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="blog shadow">
            <div class="blog-img">
              <img src="front/images/blog/3.jpeg" alt="imagen blog" class="img-b">
            </div>
            <div class="blog-title">
              <h3>Como elegir tu espacio Coworking </h3>
            </div>
            <div class="blog-description">
              <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti, vero. Voluptatem amet nostrum rem beatae vitae quisquam.
              </p>
            </div>
            <div class="blog-btn">
              <a href="#" class="btn enlace ">VER MÁS</a>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="blog shadow">
            <div class="blog-img">
              <img src="front/images/blog/3.jpeg" alt="imagen blog" class="img-b">
            </div>
            <div class="blog-title">
              <h3>Como elegir tu espacio Coworking </h3>
            </div>
            <div class="blog-description">
              <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti, vero. Voluptatem amet nostrum rem beatae vitae quisquam.
              </p>
            </div>
            <div class="blog-btn">
              <a href="#" class="btn enlace ">VER MÁS</a>
            </div>
          </div>
        </div>
      </div>      
    </div> -->


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
              TARIFAS QUE SE ADAPTAN PARA TI.
                En el Taller Coworking sabemos que no todos tienen las mismas necesidades en cuanto a tiempo y espacio por esto te ofrecemos variedad de tarifas para todas las personas.  <br>
                Con nuestros diferentes planes podrás tener la libertad total a la hora de trabajar y la posibilidad de asistir todos los días del año, en jornada laboral e incluso solo durante algunas horas. 
              </p>
            </div>

            <div class="item item2">
              <p>
              En nuestras instalaciones lograrás encontrar diferentes salas y podrás escoger la que mejor se adapte en función a la actividad que desarrollas, podrás encontrar  <br> puestos flexibles, oficinas compartidas, salas de reuniones, espacios para conferencias, mini cinema, café y salón de juegos.
              </p>
            </div>

            <div class="item item3">
              <p>
              Estamos ubicados en Bogotá en el barrio Santa Bárbara, el sector que te brinda esparcimiento, gastronomía del más alto nivel, <br> con facilidades de movilidad, restaurantes, clínicas, centros comerciales y vías principales.
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
      <?php footer(1); ?>


  </section>




<!-- jQuery 3 -->
<script src="front/js/jquery.min2.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="front/js/bootstrap.min.js"></script>
<script src="front/js/jquery.tinycarousel.js"></script>

<script src="front/js/jquery.magnific-popup.min.js"></script>

<script src="front/js/highlight.pack.js"></script>
<script src="front/js/funciones.js"></script>
<!-- <script src="front/js/vegas.min.js"></script> -->



    <script type="text/javascript">

        $(document).ready(function()
        {

          $('#slider1').tinycarousel({ interval: true });
          interval = 10000;

          
			function RotarImagen() {
        var aleatorio = Math.round(Math.random()*3);
					$('.fondo-recepcion').css("background-image", "url(front/images/inicio/img"+aleatorio+".jpeg)");         
			}
			setInterval(RotarImagen, 5000);  
        });
    </script>
</body>
</body>
</html>
