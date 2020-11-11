<?php
    /** incluye todos los recursos */
    include_once("../AnsTek_libs/integracion.inc.php");
    include_once("../model/contactos.class.php");
    /** Instancia la clase experiencia*/
    $contacto = new contacto($db);
    $user = 0;
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
      $result = $contacto->selectAll($where);
      if($db->numRows($result) > 0)
      {
        $r = $db->datos($result);
        $jsondata['Id'] = $r["Id"];
        $jsondata['Nombre'] = $r["Nombre"];
        $jsondata['Telefono'] = $r["Telefono"];
        $jsondata['Email'] = $r["Email"];
        $jsondata['Mensaje'] = $r["Mensaje"];
        $jsondata['Created_at'] = $r["Created_at"];
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
        $data = array("Nombre"=>$_REQUEST['txtName'], "Telefono"=>$_REQUEST['txtTel'], "Email"=>$_REQUEST['txtEmail'], "Servicio"=>$_REQUEST['txtSer'],
        "Comentario"=>$_REQUEST['txtMsj'],
                    "Status"=>1,  "Created_date"=>date("Y-m-d H:i:s")
        );
      if($contacto->insertData($data))
     {

        $jsondata['success'] = true;
        $jsondata['message'] = ' Gracias por registrarte '. $_REQUEST['txtName'] . ' Pronto Nos Comunicaremos';
      }
      else
      {
        $jsondata['success'] = false;
        $jsondata['message'] = "Falla al realizar el registro";
      }
      header('Content-type: application/json; charset=utf-8');
      echo json_encode($jsondata);
   break;

    /*crea update de Registros */
    case "upd":
      $jsondata = array();
        /*si tipo file esta vacio*/
        $data = array("Nombre_completo"=>$_REQUEST['txtNameup'],
                "Celular"=>$_REQUEST['txtTelup'], "Email"=>$_REQUEST['txtEmlup'],
                "Programa"=>$_REQUEST['txtProgramaup'], "Mensaje"=>$_REQUEST['txtComentup'], "Status"=>$_REQUEST['txtStatusup'],
                "Origen_Campana"=>$_REQUEST['txtOrigenup'], "Updated_by"=>$vname,  "Updated_date"=>date('Y-m-d H:i:s')
              );
        $where = "Id = " . $_REQUEST['txtIdup'];
        if($contacto->updateData($data, $where))
         {
           $jsondata['success'] = true;
           $jsondata['message'] = "Actualizado correctamente";
         }else {
          $jsondata['success'] = false;
          $jsondata['message'] = "No fue posible Actualizar sus Datos";
        }




      header('Content-type: application/json; charset=utf-8');
      echo json_encode($jsondata);
    break;

    /* CASE PARA ELIMINAR UN REGISTRO*/
    case "del":
      $Id =  $_REQUEST['pId'];
      $jsondata = array();
      if($contacto->delData($Id))
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
        if($contacto->delData($id))
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


          // Carga contactos desde EXCEL
            case "car":
            include_once("../Classes/PHPExcel/IOFactory.php");
            set_time_limit(30000);


            $dir_subida = '../public/registros/';

            if (!file_exists($dir_subida)) {
                mkdir($dir_subida, 0777, true);
            }

            //DATOS DEL ARCHIVO
            $nombre_archivo = $_FILES['uploadImage']['name'];
            $destino_archivo = "../public/registros/".$nombre_archivo;
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






                        echo '<h3>número de registros cargados : '. ($cuenta -1). ' </h3>';
                        echo '
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
                        error_reporting(0);

                    for ($i=2; $i <= $numRows; $i++) {
                      //Recojemos el valor de cada columna
                      $Cedula = $objPHPExcel->getActiveSheet()->getCell('A'.$i)->getCalculatedValue();
                      $nombre = $objPHPExcel->getActiveSheet()->getCell('B'.$i)->getCalculatedValue();
                      $celular = $objPHPExcel->getActiveSheet()->getCell('C'.$i)->getCalculatedValue();
                      $email = $objPHPExcel->getActiveSheet()->getCell('D'.$i)->getCalculatedValue();
                      $Programa = $objPHPExcel->getActiveSheet()->getCell('E'.$i)->getCalculatedValue();
                      $Mensaje = $objPHPExcel->getActiveSheet()->getCell('F'.$i)->getCalculatedValue();
                      $CampanaId = $objPHPExcel->getActiveSheet()->getCell('G'.$i)->getCalculatedValue();
                      $Origen = $objPHPExcel->getActiveSheet()->getCell('H'.$i)->getCalculatedValue();



                      echo '<tr>';
                      echo '<td>'.$Cedula.'</td>';
                      echo '<td>'.$nombre.'</td>';
                      echo '</body> </html>';

                      $data_User = array("Cedula"=>$Cedula, "Nombre_completo"=>$nombre, "Celular"=>$celular,
                          "Email"=>$email, "Programa"=>$Programa, "Mensaje"=>$Mensaje, "Campana_Id"=>$CampanaId, "Origen_Campana"=>$Origen,  "Created_date"=>date('Y-m-d H:i:s'), "Status"=>3);
                      if($contacto->insertData($data_User)){


                                    /* REALIZAMOS ASGINACION AL ID DISPONIBLE */


                          $jsondata['success'] = true;
                          $jsondata['message'] = "Registros cargados correctamente";
                          $jsondata['info'] = $Cedula1;



                      }else{
                        $jsondata['success'] = false;
                        $jsondata['message'] = "Algo no va bien ! Revisa tu conexión";
                      }
                    }

            } else {
                echo "¡Posible ataque de subida de ficheros!\n";
            }
            break;




    }
?>
