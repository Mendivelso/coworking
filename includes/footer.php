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
                    <form id="">
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
            </footer>                      
            ';
        } elseif($Id == 2) {
            $footer = '
            <footer class="container b-w ">
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
                    <form id="">
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
            </footer>                      
            ';
        }else{

        }
        

        echo $footer;



    }









?>