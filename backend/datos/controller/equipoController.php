<?php
    /** incluye todos los recursos */
    include_once("../AnsTek_libs/integracion.inc.php");
    include_once("../model/equipo.class.php");
    /** Instancia la clase experiencia*/
    $resultadoObj = new integrante($db);
    $user = Session::get('Id');
    /** captura el tipo de accion a realizar*/
    $accion = $_REQUEST['accion'];
    /** conmutador que determina las acciones a realizar para
     * este modulo
     */
    switch($accion){
    /* Obtiene un solo registro de Experiencias */
      case "single":
      $jsondata = array();
      $where = " Where Id = " . $_REQUEST['pId'];
      $result = $resultadoObj->selectAll($where);
      if($db->numRows($result) > 0)
      {
        $r = $db->datos($result);

        $jsondata['Id'] = $r["Id"];
        $jsondata['Nombre'] = $r["Nombre"];
        $jsondata['Cargo'] = $r["Cargo"];
        $jsondata['Detalle'] = $r["Detalle"];
        $jsondata['Email'] = $r["Email"];
        $jsondata['Foto'] = $r["Foto"];        
        $jsondata['Created_date'] = $r["Created_date"];
        $jsondata['Updated_date'] = $r["Updated_date"];
        $jsondata['Created_by'] = $r["Created_by"];
        $jsondata['Updated_by'] = $r["Updated_by"];
        $jsondata['Status'] = $r["Status"];
        $jsondata['success'] = true;
        $jsondata['message'] = "recuperado correctamente";

      }
     else
      {
          $jsondata['success'] = false;
          $jsondata['message'] = "Fallo al obtener el registro";
      }
      header('Content-type: application/json; charset=utf-8');
      echo json_encode($jsondata);
    break;
    /* insert  de Servicios */
    case "ins":
      $jsondata = array();
      // Realiza Insert
      

      // Datos necesarios para el registro
      $data = array("Nombre"=>$_REQUEST['txtName'], "Cargo"=>$_REQUEST['txtCargo'],
      "Status"=>$_REQUEST['txtStatus'], "Detalle"=>$_REQUEST['txtDetalle'], "Email"=>$_REQUEST['txtEmail'],  "Created_date"=>date('Y-m-d H:i:s'), "Created_by"=>$user);
      // Tomamos el formato de la imagen adjuntada


      $FormatoPortada = substr($_FILES['txtImg']['name'], strlen($_FILES['txtImg']['name'])-3, strlen($_FILES['txtImg']['name']));

       // validamos el formato de la imagen 'png' o 'jpg'
       if(($FormatoPortada == "png") or ($FormatoPortada == "jpg")  or ($FormatoPortada == "JPG")  or ($FormatoPortada == "PNG") or ($FormatoPortada == "JPEG" ) ){
          //validamos el peso de la imagen
          if($_FILES['txtImg']['size'] > 2000000){
            $jsondata['success'] = false;
            $jsondata['message'] = "La imagen de portada Tiene un peso superior a 2MB";
          }else{
          //validamos las dimensiones de la imagen
            $infoImagen = getimagesize($_FILES['txtImg']['tmp_name']);
            if ($infoImagen[0] <= 2000 || $infoImagen[1] <= 2000) {

              if($resultadoObj->insertData($data))
              {

                
                /* Tomamos el Id del ultimo registro*/
                $vId = $db->lastInsert();
                // creamos la carpeta
                $carpeta = "../public/Equipo/".$vId;
                if (!file_exists($carpeta)) {
                    mkdir($carpeta, 0777, true);
                }

                 // datos de la imagen PORTADA  necesarios para el registro
                 $name = $_FILES['txtImg']['name'];
                 $name = str_replace(' ', '-', $name);
                 $destino = "../public/Equipo/".$vId."/". $name;
                 $dest = "public/Equipo/".$vId. "/". $name . "' ";
                 $ruta = $_FILES['txtImg']['tmp_name'];


                  // se mueve el archivo en la carpeta indicada
                  if(copy($ruta,$destino) ){
                    $data = array("Foto"=>$dest);
                    $where = " Id = " . $vId;
                    // actualizamos el ultimo regsitro
                    if($resultadoObj->updateData($data, $where)){
                      $jsondata['success'] = true;
                      $jsondata['message'] = ' Integrante Registrado correctamente';
                    }else {
                      $jsondata['success'] = false;
                      $jsondata['message'] = "No fue posible Registrar sus datos";
                    }

                  }else {
                    $jsondata['success'] = false;
                    $jsondata['message'] = "No fue posible subir su Imagen";
                  }


         
                 
               }
               else
               {
                 $jsondata['success'] = false;
                 $jsondata['message'] = "Falla al realizar el registro";
               }



            }
          }
        }






      header('Content-type: application/json; charset=utf-8');
      echo json_encode($jsondata);
   break;

    /*crea update de Registros */
    case "upd":
      $jsondata = array();
        
      $Foto = trim($_FILES['txtImgup']['name']);
      $Foto = str_replace(' ', '-', $Foto);
      $vId  = $_REQUEST['txtIdup'];
      if ( ($Foto != "") ) {

          /*si tipo file esta vacio*/
        $data = array("Nombre"=>$_REQUEST['txtNameup'],
        "Cargo"=>$_REQUEST['txtCargoup'], "Email"=>$_REQUEST['txtEmailup'],
        "Detalle"=>$_REQUEST['txtDetalleup'], "Status"=>$_REQUEST['txtStatusup'],
        "Updated_by"=>$user,  "Updated_date"=>date('Y-m-d H:i:s')
        );
        $where = "Id = " . $_REQUEST['txtIdup'];
        $resultadoObj->updateData($data, $where);

        $Fotoup = substr($_FILES['txtImgup']['name'], strlen($_FILES['txtImgup']['name'])-3, strlen($_FILES['txtImgup']['name']));

        // validamos el formato de la imagen 'png' o 'jpg'
       if(($Fotoup == "png") or ($Fotoup == "jpg")  or ($Fotoup == "JPG")  or ($Fotoup == "PNG") or ($Fotoup == "JPEG" ) ){
        //validamos el peso de la imagen
        if($_FILES['txtImgup']['size'] > 2000000){
          $jsondata['success'] = false;
          $jsondata['message'] = "La imagen de portada Tiene un peso superior a 2MB";
        }else{
        //validamos las dimensiones de la imagen
          $infoImagen = getimagesize($_FILES['txtImgup']['tmp_name']);
          if ($infoImagen[0] <= 2000 || $infoImagen[1] <= 2000) {


              // creamos la carpeta
              $carpeta = "../public/Equipo/".$vId;
              if (!file_exists($carpeta)) {
                  mkdir($carpeta, 0777, true);
              }

               // datos de la imagen PORTADA  necesarios para el registro
               $name = $_FILES['txtImgup']['name'];
               $name = str_replace(' ', '-', $name);
               $destino = "../public/Equipo/".$vId."/". $name;
               $dest = "public/Equipo/".$vId. "/". $name . "' ";
               $ruta = $_FILES['txtImgup']['tmp_name'];


                // se mueve el archivo en la carpeta indicada
                if(copy($ruta,$destino) ){
                  $data = array("Foto"=>$dest);
                  $where = " Id = " . $vId;
                  // actualizamos el ultimo regsitro
                  if($resultadoObj->updateData($data, $where)){
                    $jsondata['success'] = true;
                    $jsondata['message'] = ' Integrante Actualizado  correctamente';
                  }else {
                    $jsondata['success'] = false;
                    $jsondata['message'] = "No fue posible Registrar sus datos";
                  }

                }else {
                  $jsondata['success'] = false;
                  $jsondata['message'] = "No fue posible subir su Imagen";
                }


       
               
            



          }
        }
      }






      }else{

          
        /*si tipo file esta vacio*/
        $data = array("Nombre"=>$_REQUEST['txtNameup'],
        "Cargo"=>$_REQUEST['txtCargoup'], "Email"=>$_REQUEST['txtEmailup'],
        "Detalle"=>$_REQUEST['txtDetalleup'], "Status"=>$_REQUEST['txtStatusup'],
        "Updated_by"=>$user,  "Updated_date"=>date('Y-m-d H:i:s')
        );
        $where = "Id = " . $_REQUEST['txtIdup'];
        if($resultadoObj->updateData($data, $where))
        {
          $jsondata['success'] = true;
          $jsondata['message'] = "Integrante Actualizado correctamente";
        }else {
          $jsondata['success'] = false;
          $jsondata['message'] = "No fue posible Actualizar sus Datos";
        }


      }








      header('Content-type: application/json; charset=utf-8');
      echo json_encode($jsondata);
    break;

    /* CASE PARA ELIMINAR UN REGISTRO*/
    case "del":
      $Id =  $_REQUEST['pId'];
      $jsondata = array();
      if($resultadoObj->delData($Id))
      {
        $jsondata['success'] = true;
        $jsondata['message'] = "Eliminado correctamente";
      }
      else
      {
       $jsondata['success'] = false;
       $jsondata['message'] = "Falla al Desactivar el registro";
      }
      header('Content-type: application/json; charset=utf-8');
      echo json_encode($jsondata);
    break;

      /* Crea delete de usuarios */
      case "delV":
        $Id =  $_REQUEST['pId'];
        $jsondata = array();
        if(ISSET($_POST['pId'])){
          foreach($_POST['pId'] as $id ){
        if($resultadoObj->delData($id))
        {
          $jsondata['success'] = true;
          $jsondata['message'] = "Eliminados correctamente";
        }
        else
        {
         $jsondata['success'] = false;
         $jsondata['message'] = "Falla al Eliminar los registros";
        }
      }
        }

        header('Content-type: application/json; charset=utf-8');
        echo json_encode($jsondata);
      break;


          // Carga resultadoObjs desde EXCEL
            case "car":
            $jsondata = array();
            include_once("../Classes/PHPExcel/IOFactory.php");
            set_time_limit(30000);


            $dir_subida = '../public/resultados/';

            if (!file_exists($dir_subida)) {
                mkdir($dir_subida, 0777, true);
            }

            //DATOS DEL ARCHIVO
            $nombre_archivo = $_FILES['uploadImage']['name'];
            $destino_archivo = "../public/resultados/".$nombre_archivo;
            $temp_archivo = $_FILES['uploadImage']['tmp_name'];


            // $fichero_subido = $dir_subida . basename($_FILES['uploadImage']['name']);
            // $temp =  $_FILES['uploadImage']['tmp_name'];

            /*echo"temporal: ". $temp_archivo . " " . "ruta de archivo ". $destino_archivo;*/
            $numRows = "";


            if (copy($temp_archivo, $destino_archivo )) {
                /*echo "El fichero es válido y se subió con éxito.\n";*/
                  $nombreArchivo = $destino_archivo;
                    $objPHPExcel = PHPExcel_IOFactory::load($nombreArchivo);
                    $objPHPExcel->setActiveSheetIndex(0);
                    $numRows = $objPHPExcel->setActiveSheetIndex(0)->getHighestRow();


                       $cuenta = $objPHPExcel->setActiveSheetIndex(0)->getHighestRow();






                        //echo '<h3>número de registros cargados : '. ($cuenta -1). ' </h3>';
                        /*echo '
                        <html>
                        <head>
                        <link href="../css/bootstrap.min.css" rel="stylesheet">
                        <script type="text/javascript" src="../js/jquery.js"></script>
                        <script type="text/javascript" src="../js/bootstrap.min.js"></script>
                        </head>
                        <body>
                            <table class="table table-striped table-bordered table-hover" border="1">
                                <thead>
                                <tr>
                                   <th><i class="icon_profile"></i>Cédula</th>
                                   <th><i class="icon_profile"></i>Nombre_completo</th>
                                </tr>
                                </thead>

                          <tbody>

                        ';
                        error_reporting();*/

                    for ($i=2; $i <= $numRows; $i++) {
                      //Recojemos el valor de cada columna
                      $Posicion = $objPHPExcel->getActiveSheet()->getCell('A'.$i)->getCalculatedValue();
                      $Numero =   $objPHPExcel->getActiveSheet()->getCell('B'.$i)->getCalculatedValue();
                      $Nombre =   $objPHPExcel->getActiveSheet()->getCell('C'.$i)->getCalculatedValue();
                      $v1 =       $objPHPExcel->getActiveSheet()->getCell('E'.$i)->getCalculatedValue();
                      $v2 =       $objPHPExcel->getActiveSheet()->getCell('F'.$i)->getCalculatedValue();
                      $v3 =       $objPHPExcel->getActiveSheet()->getCell('G'.$i)->getCalculatedValue();
                      $v4 =       $objPHPExcel->getActiveSheet()->getCell('H'.$i)->getCalculatedValue();
                      $v5 =       $objPHPExcel->getActiveSheet()->getCell('I'.$i)->getCalculatedValue();
                      $v6 =       $objPHPExcel->getActiveSheet()->getCell('J'.$i)->getCalculatedValue();
                      $v7 =       $objPHPExcel->getActiveSheet()->getCell('K'.$i)->getCalculatedValue();
                      $v8 =       $objPHPExcel->getActiveSheet()->getCell('L'.$i)->getCalculatedValue();
                      $v9 =       $objPHPExcel->getActiveSheet()->getCell('M'.$i)->getCalculatedValue();
                      $v10 =      $objPHPExcel->getActiveSheet()->getCell('N'.$i)->getCalculatedValue();
                      $v11 =      $objPHPExcel->getActiveSheet()->getCell('O'.$i)->getCalculatedValue();
                      $v12 =      $objPHPExcel->getActiveSheet()->getCell('P'.$i)->getCalculatedValue();
                      $Total =    $objPHPExcel->getActiveSheet()->getCell('Q'.$i)->getCalculatedValue();



                      /*echo '<tr>';
                      echo '<td>'.$Posicion.'</td>';
                      echo '<td>'.$Numero.'</td>';
                      echo '<td>'.$Nombre.'</td>';
                      echo '<td>'.$v1.'</td>';
                      echo '<td>'.$v2.'</td>';
                      echo '<td>'.$v3.'</td>';
                      echo '<td>...</td>';
                      echo '<td>'.$Total.'</td>';
                      echo '</body> </html>';*/



                      // validar el numero de piloto
                      $whereP  = " Where NumeroPiloto = " . $Numero . " AND Categoria = ".$_REQUEST['txtCategoria'] ;
                      $resultP = $resultadoObj->selectAll($whereP);
                       // valida la existencia de un numero de piloto igual
                       if($db->numRows($resultP) > 0){
                        if ($p = $db->datos($resultP)) {
                          //$jsondata['success'] = false;
                          //$jsondata['message'] = "El número de piloto " . $Numero . "  y nombre " . $Nombre .  "  ya existe";

                          $data_u = array("Posicion"=>$Posicion, "NumeroPiloto"=>$Numero, "NombrePiloto"=>$Nombre,
                           "v1"=>$v1, "v2"=>$v2, "v3"=>$v3, "v4"=>$v4, "v5"=>$v5, "v6"=>$v6, "v7"=>$v7, "v8"=>$v8, "v9"=>$v9, "v10"=>$v10, "v11"=>$v11, "v12"=>$v12,
                            "Total"=>$Total, "Updated_at"=>date('Y-m-d H:i:s'), "Updated_by"=>$user, "Categoria"=>$_REQUEST['txtCategoria'], "Status"=>1);

                          $whereU = " NumeroPiloto = ". $Numero . " AND Categoria =  " . "'"  . $_REQUEST['txtCategoria'] . "'";

                          if($resultadoObj->updateData($data_u, $whereU))
                           {
                             $jsondata['success'] = true;
                             $jsondata['message'] = " Registros Actualizados correctamente";
                           }else {
                            $jsondata['success'] = false;
                            $jsondata['message'] = "El registro : " . $Nombre . " Número : ". $Numero . " No fue posible Actualizar vuelva a intentarlo";
                          }






                        }else{

                          //realizamos insert

                          $data_r = array("Posicion"=>$Posicion, "NumeroPiloto"=>$Numero, "NombrePiloto"=>$Nombre,
                           "v1"=>$v1, "v2"=>$v2, "v3"=>$v3, "v4"=>$v4, "v5"=>$v5, "v6"=>$v6, "v7"=>$v7, "v8"=>$v8, "v9"=>$v9, "v10"=>$v10, "v11"=>$v11, "v12"=>$v12,
                            "Total"=>$Total, "Created_at"=>date('Y-m-d H:i:s'), "Created_by"=>$user, "Categoria"=>$_REQUEST['txtCategoria'], "Status"=>1);

                          if($resultadoObj->insertData($data_r)){

                              $jsondata['success'] = true;
                              $jsondata['message'] = "Registros cargados correctamente";

                          }else{
                            $jsondata['success'] = false;
                            $jsondata['message'] = "Algo no va bien ! Revisa tu conexión";
                          }

                        }
                      }else{
                        $jsondata['success'] = false;
                        $jsondata['message'] = "Algo no va bien ! Revisa tu conexión";
                      }
                    } // cierre FOR
            } else {
                echo "¡Posible ataque de subida de ficheros!\n";
            }
            header('Content-type: application/json; charset=utf-8');
            echo json_encode($jsondata);
            break;


    }
?>
