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
                            <li class="act"><a href="espacios/">Espacios</a></li>
                            <li><a href="tarifas/">Tarifas</a></li>
                            <li><a href="ofertas/">Ofertas</a></li>
                            <li><a href="eventos/">Eventos</a></li>
                            <li><a href="blog/">Blog</a></li>
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
                            <li class="act"><a href="../espacios/">Espacios</a></li>
                            <li><a href="../tarifas/">Tarifas</a></li>
                            <li><a href="../ofertas/">Ofertas</a></li>
                            <li><a href="../eventos/">Eventos</a></li>
                            <li><a href="../blog/">Blog</a></li>
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