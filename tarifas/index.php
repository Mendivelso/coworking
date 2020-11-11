<?php

  include_once('../includes/nav.php');
  include_once('../includes/footer.php');


  ?>


<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>El taller CoWorking</title>
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
    <?php menu(2)?> 




 


  <section class="container-fluid b-w" id="sectionPrincipalEspacios">

    


    <div class="row puesto">
        <div class="col-xs-12 col-sm-6 col-md-6 cont-p pb-e cajaEspacio">
            <div class="row text-center">
                <h1 class="title-main p-5">Puestos
                    <br> <span>FLEXIBLES</span></h1>
            </div>
            <div class="row text-center">
                <p>
                En el Taller Coworking vive una vida a toda máquina, moderna y veloz con un puesto flexible especialmente para ti. Te ofrecemos espacios según tu necesidad con el fin de ampliar las  posibilidades de tu negocio. <br>
                </p>
                <ul class="generalT">
                        <li>30% de descuento en reserva de salas de reuniones</li>
                        <li>Café, vino de verano y palomitas ilimitados.</li>

                    </ul>        
                    <h3 class="color semi">Tarifas</h3>

                    <ul class="generalT">
                        <li> Mes: $300.000</li>
                        <li>15 días: $200.000 </li>
                        <li>7 días: $130.000</li>
                    </ul>
                <p><strong>*Valido hasta 30 de marzo del 2021 </strong></p>
            </div>
            
            
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6 pr">
            <div id="puestosflex" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#puestosflex" data-slide-to="0" class="active"></li>
                    <li data-target="#puestosflex" data-slide-to="1"></li>
                   
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    <div class="item active">
                    <img src="../front/images/espacios/sala-moto.jpeg" alt="salas coworking" class="espacios-Img">
                    </div>

                    <div class="item">
                    <img src="../front/images/espacios/sala-moto.jpeg" alt="salas coworking" class="espacios-Img">
                    </div>

                </div>

                <!-- Left and right controls -->
                <a class="left carousel-control" href="#puestosflex" data-slide="prev">                    
                    <i class="fa fa-arrow-left glyphicon-chevron-left" aria-hidden="true"></i>
                </a>
                <a class="right carousel-control" href="#puestosflex" data-slide="next">
                <i class="fa fa-arrow-right glyphicon-chevron-right" aria-hidden="true"></i>
                </a>
            </div>




        </div>
    </div>


    <div class="row puesto ">
        <div class="col-xs-12 col-sm-6 col-md-6 cont-p pb-e">
            <div class="row text-center">
                <h1 class="title-main p-5">OFICINAS</h1>
            </div>
            <div class="row text-center">
                <p>
                En el Taller Coworking te brindamos la posibilidad de utilizar oficinas compartidas donde no solo estarás rodeado de un grupo de personas conocidas explotando al máximo la creatividad y el potencial de tu negocio, sino que también podrán repartirse los gastos.
                </p>


                <ul class="generalT">
                    <li>Oficina Tesla (5 Puestos) $1.500.000</li>
                    <li>Oficina Ferrari con baño $1.300.000 </li>
                    <li>Oficina Lamborgini (5 Puestos) $1.100.000</li>
                    <li>Oficina Porshe (1 Puesto) $1.250.000</li>
                    <li>Oficina Min (3 Puestos) $950.000</li>
                </ul>

                <p><strong>*Valido hasta 30 de marzo del 2021 </strong></p>

                
            </div>
            
            
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6 pr">

            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                    <li data-target="#myCarousel" data-slide-to="3"></li>
                    <li data-target="#myCarousel" data-slide-to="4"></li>
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    <div class="item active">
                        <img src="../front/images/espacios/sala-carro.jpeg" alt="salas coworking" class="espacios-Img">
                    </div>

                    <div class="item">
                        <img src="../front/images/espacios/sala-ferrari.jpeg" alt="salas coworking" class="espacios-Img">
                    </div>

                    <div class="item">
                        <img src="../front/images/espacios/sala-porche.jpeg" alt="salas coworking" class="espacios-Img">
                    </div>

                    <div class="item">
                        <img src="../front/images/espacios/sala-moto.jpeg" alt="salas coworking" class="espacios-Img">
                    </div>
                    <div class="item">
                        <img src="../front/images/espacios/individual.jpeg" alt="salas coworking" class="espacios-Img">
                    </div>
                </div>

                <!-- Left and right controls -->
                <a class="left carousel-control" href="#myCarousel" data-slide="prev">                    
                    <i class="fa fa-arrow-left glyphicon-chevron-left" aria-hidden="true"></i>
                </a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next">
                <i class="fa fa-arrow-right glyphicon-chevron-right" aria-hidden="true"></i>
                </a>
            </div>

            
        </div>
    </div>

    <div class="row puesto ">
        <div class="col-xs-12 col-sm-6 col-md-6 cont-p pb-e">
            <div class="row text-center">
                <h1 class="title-main p-5">SALAS DE JUNTAS y RECEPCIÓN (Capacidad 8 personas) $60.000</h1>
            </div>
            <div class="row text-center">
                <p>
                El Taller Coworking piensa en ti y en como brindarte nuevas maneras de trabajar, sabemos que te encanta volar por esta razón te brindamos el alquiler de salas de reuniones, porque sabemos lo importante que es para ti tener la posibilidad de ampliar tu negocio.
                </p>
                <ul class="generalT">
                    <li>Puesto fijo con control de acceso</li>
                    <li>Internet de alta velocidad. </li>
                </ul>
                <p><strong>*Valido hasta 30 de marzo del 2021 </strong></p>
                
            </div>
            
            
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6 pr">
            
            <div id="puestosJunta" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#puestosJunta" data-slide-to="0" class="active"></li>
                    <li data-target="#puestosJunta" data-slide-to="1"></li>
                   
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    <div class="item active">
                    <img src="../front/images/espacios/sala-puestos.jpeg" alt="salas coworking" class="espacios-Img">
                    </div>

                    <div class="item">
                    <img src="../front/images/espacios/sala-puestos.jpeg" alt="salas coworking" class="espacios-Img">
                    </div>

                </div>

                <!-- Left and right controls -->
                <a class="left carousel-control" href="#puestosJunta" data-slide="prev">                    
                    <i class="fa fa-arrow-left glyphicon-chevron-left" aria-hidden="true"></i>
                </a>
                <a class="right carousel-control" href="#puestosJunta" data-slide="next">
                <i class="fa fa-arrow-right glyphicon-chevron-right" aria-hidden="true"></i>
                </a>
            </div>
        </div>
    </div>

   
    


    <div class="row puesto ">
        <div class="col-xs-12 col-sm-6 col-md-6 cont-p pb-e">
            <div class="row text-center">
                <h1 class="title-main p-5"> MINI CINE (capacidad 8 personas ) $80.000</h1>

            </div>
            <div class="row text-center">
                <p>
                El taller coworking te da la posibilidad de realizar pequeños eventos, charlas o conferencias que promueven compartir tu conocimiento y el crecimiento de tu negocio. Tendrás a tu entera disposición los espacios de conferencias modernas.
                </p>

                
                <ul class="generalT">
                    <li>Café y agua ilimitada </li>
                    <li>Televisor </li>
                    <li>Tablero</li>
                    <li>Sonido</li>
                    </ul>
                <p><strong>*Valido hasta 30 de marzo del 2021 </strong></p>
                
            </div>
            
            
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6 pr">
            <div id="puestosCine" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#puestosCine" data-slide-to="0" class="active"></li>
                        <li data-target="#puestosCine" data-slide-to="1"></li>
                    
                    </ol>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                        <div class="item active">
                        <img src="../front/images/espacios/sala.jpeg" alt="salas coworking" class="espacios-Img">
                        </div>

                        <div class="item">
                        <img src="../front/images/espacios/sala-invitados.jpeg" alt="salas coworking" class="espacios-Img">
                        </div>

                    </div>

                    <!-- Left and right controls -->
                    <a class="left carousel-control" href="#puestosCine" data-slide="prev">                    
                        <i class="fa fa-arrow-left glyphicon-chevron-left" aria-hidden="true"></i>
                    </a>
                    <a class="right carousel-control" href="#puestosCine" data-slide="next">
                    <i class="fa fa-arrow-right glyphicon-chevron-right" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
    </div>


    <div class="row puesto">
        <div class="col-xs-12 col-sm-6 col-md-6 cont-p pb-e">
        <h2 class="color semi">EVENTOS (Capacidad 15 personas )</h2>
            <p>
            En el Taller Coworking sabemos lo importante que es contar con un buen servicio de recepción de calidad, por lo que contamos con el mejor personal formados para atender a nuestros y tus clientes logrando causar la mejor impresión. Ellos se encargarán de hacerlos sentir bienvenidos y que disfruten su estadía.
            </p>
            <p><strong>*Valido hasta 30 de marzo del 2021 </strong></p>
          
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6 ">
        
        <div id="puestosEvento" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#puestosEvento" data-slide-to="0" class="active"></li>
                        <li data-target="#puestosEvento" data-slide-to="1"></li>
                    
                    </ol>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                        <div class="item active">
                        <img src="../front/images/espacios/recepcion.jpeg" alt="salas coworking" class="espacios-Img">
                        </div>

                        <div class="item">
                        <img src="../front/images/espacios/sala.jpeg" alt="salas coworking" class="espacios-Img">
                        </div>

                    </div>

                    <!-- Left and right controls -->
                    <a class="left carousel-control" href="#puestosEvento" data-slide="prev">                    
                        <i class="fa fa-arrow-left glyphicon-chevron-left" aria-hidden="true"></i>
                    </a>
                    <a class="right carousel-control" href="#puestosEvento" data-slide="next">
                    <i class="fa fa-arrow-right glyphicon-chevron-right" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
        </div>
       
    </div>



    <div class="row puesto">
        <div class="col-xs-12 col-sm-6 col-md-6 cont-p pb-e">
            <h2 class="color semi">PELUQIERÍA Y BARBERÍA - (Cita Previa) </h2>
            <p>
            Sin salir de tu lugar de trabajo puedes pasar a latonería pintura y embellecimiento, sin desplazarte tendrás un momento de relajación y confort. <br>
            <strong>Cita previa con Álvaro pachón – Teléfono 310 819 7951     </strong>
            </p>
            <p><strong>*Valido hasta 30 de marzo del 2021 </strong></p>
          
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6 pr">
          

            <div id="puestosPelu" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#puestosPelu" data-slide-to="0" class="active"></li>
                        <li data-target="#puestosPelu" data-slide-to="1"></li>
                        <li data-target="#puestosPelu" data-slide-to="2"></li>
                    
                    </ol>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                        <div class="item active">
                        <img src="../front/images/espacios/puestos.jpeg" alt="salas coworking" class="espacios-Img">
                        </div>

                        <div class="item">
                            <img src="../front/images/espacios/pelu1.jpeg" alt="salas coworking" class="espacios-Img">
                        </div>
                        <div class="item">
                            <img src="../front/images/espacios/pelu2.jpeg" alt="salas coworking" class="espacios-Img">
                        </div>

                    </div>

                    <!-- Left and right controls -->
                    <a class="left carousel-control" href="#puestosPelu" data-slide="prev">                    
                        <i class="fa fa-arrow-left glyphicon-chevron-left" aria-hidden="true"></i>
                    </a>
                    <a class="right carousel-control" href="#puestosPelu" data-slide="next">
                    <i class="fa fa-arrow-right glyphicon-chevron-right" aria-hidden="true"></i>
                    </a>
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
                        <label class="form-check-label lb" for="exampleCheck1">Acepto Terminos y Condiciones </label>
                        <input type="hidden" name="txtId" id="txtId" value="0">
                        <input type="hidden" name="txtTab" id="txtTab" value="1">
                        <input type="hidden" name="accion" id="accion1" value="ins">
                    </div>
                    <button type="submit" class="btn btn-primary send">Enviar</button>
                  </form> 
            </div>                                   
        </div>
        <div class="col-xs-12 col-sm-6 col-md-7 cajaInfo pt-4"> <br><br>
            <div class="row">
                <h2>Horarios de atención en nuestro coworking</h2>                
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
            <h1 class="title-main text-center p-5" id="title-contact">Servicios incluidos en nuestro <br><span>espacio coworking</span></h1>       
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

    




    <div class="container text-center answer pb-5 ">
        <div class="row">
            <h3>
                 ¿Quieres saber más sobre nuestros puestos flexibles?
            </h3>
            <p>
                Si aún tienes dudas sobre esta tarifa, aquí te mostramos algunas preguntas que nos suelen hacer nuestros clientes.
            </p>
        </div>
        <div class="row">
            <h3>
                ¿Puedo ir acompañado a mi puesto flexible?
            </h3>
            <p>
                Si piensas acudir al coworking acompañado deberás consultarlo con nosotros y avisarnos con antelación.
            </p>
        </div>
        <div class="row">
            <h3>
                ¿Tengo que pagar por usar zonas comunes como la cocina?
            </h3>
            <p>
                No, el uso de las zonas comunes está incluido en la tarifa y tendrás total acceso a los lugares reservados para el ocio
                y el relax.
            </p>
        </div>
        <div class="row">
            <h2>¿Te ha quedado alguna duda?</h2>
        </div>
        <div class="row">
            <button class="btn send" id="bntContact">Contáctanos</button>
        </div>
    </div>
    

      

    

  <!-- Inlcuimos footer -->
      <?php footer(2); ?>


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
