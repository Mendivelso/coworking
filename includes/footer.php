<?php 


    function footer($Id="",$db=""){

        $footer = '';

        /* CONSULTAMOS EL LOGO  */
        $ObjImagen = new Imagen($db);
        $whereLogo2 = " WHERE Id > 0 AND Tipo = 'Logo ' AND Status = 1 ORDER BY Id ASC ";
        $rLog2 = $ObjImagen->selectOne($whereLogo2);
        if($db->numRows($rLog2) > 0){
            if($l2 = $db->datos($rLog2)) {
            $LogoColor2 = $l2['Imagen'];
            $LogoColor3 = $l2['Imagen'];
            $TituloColor2 = $l2['Titulo'];
            $LogoColor = '<img src="backend/datos/'.$LogoColor2.'" alt="Logo El Taller" class="logo-footer">';
            $LogoColor2 = '<img src="../backend/datos/'.$LogoColor2.'" alt="Macare" class="logo-footer">';
    
            }
        } 



        /* Objeto Textos  */
    $ObjTexto = new texto($db);
    $whereTexto = " WHERE Id > 0 AND Pagina = 'Footer' AND Status = 1 ORDER BY Id ASC ";
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
    $menu = explode(",",  $arrayTexto[1]);




        if ($Id == 1) {
            $footer = '
            <footer class="container b-w ">
                <div class="row">
                <div class="col-xs-12 col-sm-3 col-md-3 text-center">
                    '.$LogoColor.' <br><br>
                   '.$arrayTexto[0].'
                </div>
                <div class="col-xs-12 col-sm-3 col-md-3 text-center">
                '.$arrayTexto[1].'
                </div>
                <div class="col-xs-12 col-sm-3 col-md-3 text-center">
                '.$arrayTexto[2].'
                </div>
                <div class="col-xs-12 col-sm-3 col-md-3">
                    <p>
                    '.$arrayTexto[3].'
                    </p>
                    <form id="contact-form-footer"  role="form" data-parsley-validate="" novalidate="novalidate" enctype="multipart/form-data">
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
                        <label class="form-check-label lb" for="exampleCheck1">'.$arrayTexto[4].'</label>
                        <input type="hidden" name="txtId" id="txtId" value="0">
                        <input type="hidden" name="txtTab" id="txtTab" value="0">
                        <input type="hidden" name="accion" id="accion1" value="ins">
                    </div>
                    <button type="submit" class="btn btn-primary send">'.$arraySub[4].'</button>
                  </form> 
                </div>
                </div>
            </footer>                      
            ';
        } elseif($Id == 2) {
            $footer = '
            <footer class="container b-w " id="visita">
                <div class="row">
                <div class="col-xs-12 col-sm-3 col-md-3 text-center">
                '.$LogoColor2.' <br><br>
                '.$arrayTexto[0].'   
                </div>
                <div class="col-xs-12 col-sm-3 col-md-3 text-center">
                '.$arrayTexto[1].'
                </div>
                <div class="col-xs-12 col-sm-3 col-md-3 text-center">
                '.$arrayTexto[2].'
                </div>
                <div class="col-xs-12 col-sm-3 col-md-3">
                    <p>
                    '.$arrayTexto[3].'
                    </p>
                    <form id="contact-form-footer"  role="form" data-parsley-validate="" novalidate="novalidate" enctype="multipart/form-data">
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
                        <label class="form-check-label lb" for="exampleCheck1"> '.$arrayTexto[4].'</label>
                        <input type="hidden" name="txtId" id="txtId" value="0">
                        <input type="hidden" name="txtTab" id="txtTab" value="1">
                        <input type="hidden" name="accion" id="accion1" value="ins">
                    </div>
                    <button type="submit" class="btn btn-primary send"> '.$arraySub[4].'</button>
                  </form> 
                </div>
                </div>
            </footer>                      
            ';
        }else{

        }
        

        echo $footer;



    }









?>