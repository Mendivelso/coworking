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

                       /* Objeto Textos  */
       $ObjTexto = new texto($db);
       $whereTexto = " WHERE Id > 0 AND Pagina = 'Menu' AND Status = 1 ORDER BY Id ASC ";
       $resultTexto = $ObjTexto->selectOne($whereTexto);
       $arrayTexto = array();
       $arraySub = array();
       if($db->numRows($resultTexto) > 0){
           while ($t = $db->datos($resultTexto)) {      
           $texto = $t['Texto'];
           $sub = $t['Sub'];
           $arrayTexto[] = $texto;
           $arraySub[] = $sub;
           }
       }    
       $menu1 = explode(",",  $arrayTexto[0]);

       
       
        /* CONSULTAMOS EL LOGO  */
        $ObjImagen = new Imagen($db);
        $whereLogo2 = " WHERE Id > 0 AND Tipo = 'Logo ' AND Status = 1 ORDER BY Id ASC ";
        $rLog2 = $ObjImagen->selectOne($whereLogo2);
        if($db->numRows($rLog2) > 0){
            if($l2 = $db->datos($rLog2)) {
            $LogoColor2 = $l2['Imagen'];
            $LogoColor3 = $l2['Imagen'];
            $TituloColor2 = $l2['Titulo'];
            $LogoColor = '<img src="backend/datos/'.$LogoColor2.'" alt="Logo El Taller" class="logo">';
            $LogoColor2 = '<img src="../backend/datos/'.$LogoColor2.'" alt="Macare" class="logo">';
    
            }
        }




        $menu = '';

        if ($Id == 1) {
            $menu = '
                <div class="container-fluid navbar-fixed-top" id="noPadd"> 
                    <section class="" id="Info">
                        <div class="container">
                            <div class="row">
                                <p>
                                '.$arrayTexto[3].'
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
                        <a class="navbar-brand" href="#">'. $LogoColor.'</a>
                        </div>
                        <div class="collapse navbar-collapse" id="myNavbar">
                        <ul class="nav navbar-nav navbar-right">
                            <li class="act active"><a href="#" onclick="NavActive(1)">'.$menu1[0].'</a></li>
                            <li><a href="servicios/" onclick="NavActive(3)">'.$menu1[1].'</a></li>
                            <li><a href="tarifas/" onclick="NavActive(2)">'.$menu1[2].'</a></li>                            
                            <li><a href="eventos/" onclick="NavActive(4)">'.$menu1[3].'</a></li>
                            <li class="active">
                                '.$arrayTexto[1].'
                                '.$arrayTexto[2].' 
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
                                '.$arrayTexto[3].'
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
                        <a class="navbar-brand" href="../">'. $LogoColor2.'</a>
                        </div>
                        <div class="collapse navbar-collapse" id="myNavbar">
                        <ul class="nav navbar-nav navbar-right">
                            <li class="act" id="espacio"><a href="../" onclick="NavActive(1)">'.$menu1[0].'</a></li>
                            <li class="" id="oferta"><a href="../servicios/">'.$menu1[1].'</a></li>
                            <li class="" id="tarifa"><a href="../tarifas/" onclick="NavActive(1)">'.$menu1[2].'</a></li>                            
                            <li class="" id="evento"><a href="../eventos/">'.$menu1[3].'</a></li>
                            <li class="active" id="bl">
                            '.$arrayTexto[1].'
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