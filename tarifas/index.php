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

    


    <div class="row tarifa">
        <div class="col-xs-12 col-sm-6 col-md-6 cont-p pb-e">
            <div class="row text-center">
                <h1 class="title-main p-5">Espacios
                    <br> <span>FLEXIBLES</span></h1>
            </div>
            <div class="row text-center">
                <p>
                    Los Espacios flexibles para aquellos que <br>
                    buscan libertad para trabajar.
                </p>
                <a href="#" class="">Más Información</a>
            </div>
            
            
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6 pr">
            <img src="../front/images/espacios/sala-moto.jpeg" alt="salas coworking" class="espacios-Img">
        </div>
    </div>


    <div class="row ">
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
                        <option value="Salas Coworking">Salas Coworking</option>
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
                <p>
                    Nuestra tarifa de puestos flexibles te ofrece la oportunidad de disfrutar de un espacio
                    compartido. Podrás desarrollar tu idea de negocio y trabajar en un ambiente único que te
                    permitirá realizar tus tareas con la máxima efectividad y flexibilidad posible, pudiendo
                    elegir jornada completa, media jornada… Todo según tus necesidades con flexibilidad
                    100%. Con este plan disfrutarás de la experiencia al más puro estilo de un espacio
                    coworking, con total libertad para sentarte donde desees.
                </p>
                <p>
                    Tendrás a tu disposición un lugar en el que encontrarás tanto zonas para el trabajo como
                    para tener tiempo para la relajación y el ocio, en el que poder establecer contactos e iniciar
                    relaciones con otros coworkers. Además, podrás realizar múltiples actividades con las que
                    conseguir un buen desarrollo profesional. Todo ello, a un precio irresistible y con unas de
                    las mejores vistas del centro de Madrid que puedes encontrar.
                </p>
            </div>
            <div class="row">
                <ul>
                    <li>Participa en <span>eventos y actividades.</span></li>
                    <li>Disfruta de las <span>zonas comunes con otros coworkers.</span></li>
                    <li>Horario de L-V de <span>00:00-00:00.</span></li>
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
            <i class="fa fa-envelope-o fa-5x" aria-hidden="true"></i>
                <p>
                    Servicio de correo y paquetería
                </p>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4 text-center s">
                <i class="fa fa-street-view fa-5x" aria-hidden="true"></i>
                <p>
                    Ubicación Prime
                </p>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4 text-center s">
                <i class="fa fa-address-card fa-5x" aria-hidden="true"></i>
                <p>
                    Salas con Proyector
                </p>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4 text-center s">
                <i class="fa fa-coffee fa-5x" aria-hidden="true"></i>
                <p>
                    Zonas comunes cocinas con terraza
                </p>
            </div>
        </div>
    </div>


    <div class="row puesto ">
        <div class="col-xs-12 col-sm-6 col-md-6 cont-p pb-e">
            <div class="row text-center">
                <h1 class="title-main p-5">Actividades y eventos en el Taller Coworking</h1>
            </div>
            <div class="row text-center">
                <p>
                Descubre nuestra agenda de actividades y <br>
                eventos con los que poder seguir formándote y <br>
                estableciendo relaciones en nuestro espacio <br>
                coworking.
                </p>
                <a href="#" class="">Más Información</a>
            </div>
            
            
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6 pr">
            <img src="../front/images/espacios/sala-puestos.jpeg" alt="salas coworking" class="espacios-Img">
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
            <button class="btn send">Contáctanos</button>
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
<!-- <script src="front/js/vegas.min.js"></script> -->



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
