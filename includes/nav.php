<?php 


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
                        <a class="navbar-brand" href="#"><img src="front/images/logo-menu.png" class="logo"></a>
                        </div>
                        <div class="collapse navbar-collapse" id="myNavbar">
                        <ul class="nav navbar-nav navbar-right">
                            <li class="act active"><a href="#" onclick="NavActive(1)">Inicio</a></li>
                            <li><a href="tarifas/" onclick="NavActive(2)">Tarifas</a></li>
                            <li><a href="ofertas/" onclick="NavActive(3)">Ofertas</a></li>
                            <li><a href="eventos/" onclick="NavActive(4)">Noticias</a></li>
                            <li class="active">
                                <a href="#" class="icons"><i class="fa fa-instagram fa-1x" aria-hidden="true"></i></a>
                                <a href="index2.php#ubicacion" class="icons"><i class="fa fa-map-marker fa-1x" aria-hidden="true"></i></a> 
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
                        <a class="navbar-brand" href="../"><img src="../front/images/logo-menu.png" class="logo"></a>
                        </div>
                        <div class="collapse navbar-collapse" id="myNavbar">
                        <ul class="nav navbar-nav navbar-right">
                            <li class="act" id="espacio"><a href="../" onclick="NavActive(1)">Inicio</a></li>
                            <li class="" id="tarifa"><a href="../tarifas/" onclick="NavActive(1)">Tarifas</a></li>
                            <li class="" id="oferta"><a href="../ofertas/">Ofertas</a></li>
                            <li class="" id="evento"><a href="../eventos/">Noticias</a></li>
                            <li class="active" id="bl">
                            <a href="#" class="icons"><i class="fa fa-instagram fa-1x" aria-hidden="true"></i></a>
                            <a href="../index2.php#ubicacion" class="icons"><i class="fa fa-map-marker fa-1x" aria-hidden="true"></i></a>                            
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