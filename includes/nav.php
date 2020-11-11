<?php 
    // FA-ICON
    function faIcon($Id=""){
        $logo = "";
        if($Id == 1){
            $logo = '<link rel="shortcut icon" href="front/images/logo-menu2.png" type="image/x-icon">';
        }else{
            $logo = '<link rel="shortcut icon" href="../front/images/logo-menu2.png" type="image/x-icon">';
        }
        echo $logo;
    }


    // MENU DE NAVEGACION 

    function menu($Id="",$db=""){

        $menu = '';

        if ($Id == 1) {
            $menu = '
                <div class="container-fluid navbar-fixed-top" id="noPadd"> 
                    <section class="" id="Info">
                        <div class="container">
                            <div class="row">
                                <p>
                                    Tel: 315 337 6866 - info@eltaller.com.co
                                </p>
                            </div>                            
                        </div>
                    </section>
                
                    <nav class="navbar navbar-default b-w">
                    <div class="container">
                        <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#"><img src="front/images/logo-menu2.png" class="logo"></a>
                        </div>
                        <div class="collapse navbar-collapse" id="myNavbar">
                        <ul class="nav navbar-nav navbar-right">
                            <li class="act active"><a href="#" onclick="NavActive(1)">Inicio</a></li>
                            <li><a href="servicios/" onclick="NavActive(3)">Servicios</a></li>
                            <li><a href="tarifas/" onclick="NavActive(2)">Tarifas</a></li>                            
                            <li><a href="eventos/" onclick="NavActive(4)">Eventos</a></li>
                            <li class="active">
                                <a href="https://www.instagram.com/eltaller.coworking/?hl=es-la" target="black" class="icons"><i class="fa fa-instagram fa-1x" aria-hidden="true"></i></a>
                                <a href="index.php#ubicacion" class="icons"><i class="fa fa-map-marker fa-1x" aria-hidden="true"></i></a> 
                            </li>
                        </ul>
                        </div>
                    </div>
                    </nav>
                </div>                        
            ';
        }elseif($Id == 2) {
            $menu = '
            <div class="container-fluid navbar-fixed-top" id="noPadd"> 
                    <section class="" id="Info">
                        <div class="container">
                            <div class="row">
                                <p>
                                    Tel: 315 337 6866 - info@eltaller.com.co
                                </p>
                            </div>                            
                        </div>
                    </section>
                
                    <nav class="navbar navbar-default b-w">
                    <div class="container">
                        <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="../"><img src="../front/images/logo-menu2.png" class="logo"></a>
                        </div>
                        <div class="collapse navbar-collapse" id="myNavbar">
                        <ul class="nav navbar-nav navbar-right">
                            <li class="act" id="espacio"><a href="../" onclick="NavActive(1)">Inicio</a></li>
                            <li class="" id="oferta"><a href="../servicios/">Servicios</a></li>
                            <li class="" id="tarifa"><a href="../tarifas/" onclick="NavActive(1)">Tarifas</a></li>                            
                            <li class="" id="evento"><a href="../eventos/">Eventos</a></li>
                            <li class="active" id="bl">
                            <a href="https://www.instagram.com/eltaller.coworking/?hl=es-la" target="black" class="icons"><i class="fa fa-instagram fa-1x" aria-hidden="true"></i></a>
                            <a href="../index.php#ubicacion" class="icons"><i class="fa fa-map-marker fa-1x" aria-hidden="true"></i></a>                            
                            </li>
                        </ul>
                        </div>
                    </div>
                    </nav>
                </div>                        
            ';
        }else{

        }
        

        echo $menu;



    }









?>