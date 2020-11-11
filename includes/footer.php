<?php 


    function footer($Id="",$db=""){

        $footer = '';

        if ($Id == 1) {
            $footer = '
            <footer class="container b-w ">
                <div class="row">
                <div class="col-xs-12 col-sm-3 col-md-3 text-center">
                    <img src="front/images/logo-menu2.png" alt="Logo principal " class="logo-footer"> <br><br>
                    <p>
                         Ponte en contacto con nosotros.
                    </p>
                    <p>
                    Alejandro Osorio Bernal 
                    eltallercoworking1@gmail.com
                    
                    <strong>Detalles de contacto </strong>   <br>
                    Carrera 18 No. 118 -04 <br>
                    Santa Bárbara- Bogotá

                    </p>
                </div>
                <div class="col-xs-12 col-sm-3 col-md-3 text-center">
                    <h3>Espacios</h3>
                    <ul class="footer-li">
                    <li><a href="#">Salas Coworking</a></li>
                    <li><a href="">Salas puestos fijos</a> </li>
                    <li><a href="">Despachos</a></li>
                    <li><a href="">Zonas compartidas</a></li>
                    </ul>
                </div>
                <div class="col-xs-12 col-sm-3 col-md-3 text-center">
                    <h3>Otros</h3>
                    <ul class="footer-li">
                    <li><a href="">Espacios</a></li>
                    <li><a href="">Tarifas</a> </li>
                    <li><a href="">Ofertas</a></li>
                    <li><a href="">Eventos</a></li>
                    </ul>
                </div>
                <div class="col-xs-12 col-sm-3 col-md-3">
                    <p>
                    Usa este formulario para contactar con nosotros
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
                        <label class="form-check-label lb" for="exampleCheck1">Acepto Terminos y Condiciones </label>
                        <input type="hidden" name="txtId" id="txtId" value="0">
                        <input type="hidden" name="txtTab" id="txtTab" value="0">
                        <input type="hidden" name="accion" id="accion1" value="ins">
                    </div>
                    <button type="submit" class="btn btn-primary send">Enviar</button>
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
                    <img src="../front/images/logo-menu2.png" alt="Logo principal " class="logo-footer"><br><br>
                    <p>
                         Ponte en contacto con nosotros.
                    </p>
                    <p>
                    Alejandro Osorio Bernal 
                    eltallercoworking1@gmail.com
                    
                    <strong>Detalles de contacto </strong>   <br>
                    Carrera 18 No. 118 -04 <br>
                    Santa Bárbara- Bogotá

                    </p>    
                </div>
                <div class="col-xs-12 col-sm-3 col-md-3 text-center">
                    <h3>Espacios</h3>
                    <ul class="footer-li">
                    <li><a href="#">Salas Coworking</a></li>
                    <li><a href="">Salas puestos fijos</a> </li>
                    <li><a href="">Despachos</a></li>
                    <li><a href="">Zonas compartidas</a></li>
                    </ul>
                </div>
                <div class="col-xs-12 col-sm-3 col-md-3 text-center">
                    <h3>Otros</h3>
                    <ul class="footer-li">
                    <li><a href="">Espacios</a></li>
                    <li><a href="">Tarifas</a> </li>
                    <li><a href="">Ofertas</a></li>
                    <li><a href="">Eventos</a></li>
                    </ul>
                </div>
                <div class="col-xs-12 col-sm-3 col-md-3">
                    <p>
                    Usa este formulario para contactar con nosotros
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
                        <label class="form-check-label lb" for="exampleCheck1">Acepto Terminos y Condiciones </label>
                        <input type="hidden" name="txtId" id="txtId" value="0">
                        <input type="hidden" name="txtTab" id="txtTab" value="1">
                        <input type="hidden" name="accion" id="accion1" value="ins">
                    </div>
                    <button type="submit" class="btn btn-primary send">Enviar</button>
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