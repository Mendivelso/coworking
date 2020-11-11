<?php
    /** incluye todos los recursos */
    include_once("../AnsTek_libs/integracion.inc.php");
    include_once("../model/imagenes.class.php");
    /** Instancia la clase experiencia*/
    $event = new imagen($db);
    $user =Session::get('Id');
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
      $result = $event->selectAll($where);
      if($db->numRows($result) > 0)
      {
        $r = $db->datos($result);
        $jsondata['Id'] = $r["Id"];
        $jsondata['Titulo'] = $r["Titulo"];
        $jsondata['Tipo'] = $r["Tipo"];
        $jsondata['Imagen'] = $r["Imagen"];
        $jsondata['ImagenG'] = $r["ImagenG"];
        $jsondata['Created_date'] = $r["Created_date"];
        $jsondata['Created_by'] = $r["Created_by"];
        $jsondata['Updated_by'] = $r["Updated_by"];
        $jsondata['Updated_date'] = $r["Updated_date"];

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
      $Imagen1 = $_FILES['txtImg']['name'];
      $Imagen1 = str_replace(' ', '-', $Imagen1);
      $Imagen2 = $_FILES['txtImgS']['name'];
      $Imagen2 = str_replace(' ', '-', $Imagen2);



      if($Imagen2 != ""){


          // Datos necesarios para el registro
        $data = array("Titulo"=>$_REQUEST['txtTitle'], "Tipo"=>$_REQUEST['txtTipo'],
        "Status"=>$_REQUEST['txtStatus'], "Created_date"=>date('Y-m-d H:i:s'), "Created_by"=>$user);

        /* FOTO 1 */

        $Formato1 = substr($_FILES['txtImg']['name'], strlen($_FILES['txtImg']['name'])-3, strlen($_FILES['txtImg']['name']));
         // validamos el formato de la imagen 'png' o 'jpg'
       if(($Formato1== "png") or ($Formato1== "jpg")  or ($Formato1== "JPG")  or ($Formato1== "PNG") or ($Formato1== "JPEG" ) ){
          //validamos el peso de la imagen
          if($_FILES['txtImg']['size'] > 2000000){
            $jsondata['success'] = false;
            $jsondata['message'] = "La imagen de portada Tiene un peso superior a 2MB";
          }else{
          //validamos las dimensiones de la imagen
            $infoImagen = getimagesize($_FILES['txtImg']['tmp_name']);
            if ($infoImagen[0] <= 2000 || $infoImagen[1] <= 2000) {



              /* FOTO 2 */

              $Formato2 = substr($_FILES['txtImgS']['name'], strlen($_FILES['txtImgS']['name'])-3, strlen($_FILES['txtImgS']['name']));
                // validamos el formato de la imagen 'png' o 'jpg'
              if(($Formato2== "png") or ($Formato2== "jpg")  or ($Formato2== "JPG")  or ($Formato2== "PNG") or ($Formato2== "JPEG" ) ){
                //validamos el peso de la imagen
                if($_FILES['txtImgS']['size'] > 2000000){
                  $jsondata['success'] = false;
                  $jsondata['message'] = "La imagen de portada Tiene un peso superior a 2MB";
                }else{
                //validamos las dimensiones de la imagen
                  $infoImagen = getimagesize($_FILES['txtImgS']['tmp_name']);
                  if ($infoImagen[0] <= 2000 || $infoImagen[1] <= 2000) {


                    if($event->insertData($data)){
                        /* Tomamos el Id del ultimo registro*/
                      $vId = $db->lastInsert();

                      
                        // creamos la carpeta
                        $carpeta = "../public/Imagenes/".$vId;
                        if (!file_exists($carpeta)) {
                            mkdir($carpeta, 0777, true);
                        }

                        // datos de la imagen 1 necesarios para el registro                                              
                        $destino = "../public/Imagenes/".$vId."/". $Imagen1;
                        $dest = "public/Imagenes/".$vId. "/". $Imagen1 . " ";
                        $ruta = $_FILES['txtImg']['tmp_name'];


                         // datos de la imagen 2 necesarios para el registro                                              
                         $destino2 = "../public/Imagenes/".$vId."/". $Imagen2;
                         $dest2 = "public/Imagenes/".$vId. "/". $Imagen2 . " ";
                         $ruta2 = $_FILES['txtImgS']['tmp_name'];


                          // se mueve el archivo en la carpeta indicada
                          if(copy($ruta,$destino)  AND copy($ruta2,$destino2) ){
                            $data = array("Imagen"=>$dest, "ImagenG"=>$dest2 );
                            $where = " Id = " . $vId;
                            // actualizamos el ultimo regsitro
                            if($event->updateData($data, $where)){
                              $jsondata['success'] = true;
                              $jsondata['message'] = ' Imagen Registrada Correctamente';
                            }else {
                              $jsondata['success'] = false;
                              $jsondata['message'] = "No fue posible Registrar sus datos";
                            }

                          }else {
                            $jsondata['success'] = false;
                            $jsondata['message'] = "No fue posible subir su Imagen";
                          }
                      }





                      /*INFORMACION IMAGENES  */
                  }
                }
              }else{
                $jsondata['success'] = false;
                $jsondata['message'] = "La imagen debe ser PNG o JPG";

              }

              /*FIN FOTO 2 */

                











            }
          }
        }else{
          $jsondata['success'] = false;
          $jsondata['message'] = "La imagen debe ser PNG o JPG";

        }

        /*FIN FOTO 1 */


      }else{

        

          // Datos necesarios para el registro
          $data = array("Titulo"=>$_REQUEST['txtTitle'], "Tipo"=>$_REQUEST['txtTipo'],
          "Status"=>$_REQUEST['txtStatus'], "Created_date"=>date('Y-m-d H:i:s'), "Created_by"=>$user);


        /* FOTO 1 */

        $Formato1 = substr($_FILES['txtImg']['name'], strlen($_FILES['txtImg']['name'])-3, strlen($_FILES['txtImg']['name']));
         // validamos el formato de la imagen 'png' o 'jpg'
       if(($Formato1== "png") or ($Formato1== "jpg")  or ($Formato1== "JPG")  or ($Formato1== "PNG") or ($Formato1== "JPEG" ) ){
          //validamos el peso de la imagen
          if($_FILES['txtImg']['size'] > 2000000){
            $jsondata['success'] = false;
            $jsondata['message'] = "La imagen de portada Tiene un peso superior a 2MB";
          }else{
          //validamos las dimensiones de la imagen
            $infoImagen = getimagesize($_FILES['txtImg']['tmp_name']);
            if ($infoImagen[0] <= 2000 || $infoImagen[1] <= 2000) {


              if($event->insertData($data)){
                                  /* Tomamos el Id del ultimo registro*/
              $vId = $db->lastInsert();

              // creamos la carpeta
              $carpeta = "../public/Imagenes/".$vId;
              if (!file_exists($carpeta)) {
                  mkdir($carpeta, 0777, true);
              }

              // datos de la imagen 1 necesarios para el registro                                              
              $destino = "../public/Imagenes/".$vId."/". $Imagen1;
              $dest = "public/Imagenes/".$vId. "/". $Imagen1 . "' ";
              $ruta = $_FILES['txtImg']['tmp_name'];

              
              // se mueve el archivo en la carpeta indicada
              if(copy($ruta,$destino) ){
                $data = array("Imagen"=>$dest );
                $where = " Id = " . $vId;
                // actualizamos el ultimo regsitro
                if($event->updateData($data, $where)){
                  $jsondata['success'] = true;
                  $jsondata['message'] = ' Imagen Registrada Correctamente';
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


        }else {
          $jsondata['success'] = false;
          $jsondata['message'] = "Formato de imagen Incorrecto";
        }










      }


      header('Content-type: application/json; charset=utf-8');
      echo json_encode($jsondata);
   break;

    /*crea update de Expereincias */

    case "upd":
      $jsondata = array();
      $vId = $_REQUEST['txtIdup'];

      $Imagen1 = $_FILES['txtImgup']['name'];
      $Imagen1 = str_replace(' ', '-', $Imagen1);
      $Imagen2 = $_FILES['txtImgSup']['name'];
      $Imagen2 = str_replace(' ', '-', $Imagen2);



      if($Imagen2 != ""){


          // Datos necesarios para el registro
        $data = array("Titulo"=>$_REQUEST['txtTitleup'], "Tipo"=>$_REQUEST['txtTipoup'],
        "Status"=>$_REQUEST['txtStatusup'], "Updated_date"=>date('Y-m-d H:i:s'), "Updated_by"=>$user);

        /* FOTO 1 */

        $Formato1 = substr($_FILES['txtImgup']['name'], strlen($_FILES['txtImgup']['name'])-3, strlen($_FILES['txtImgup']['name']));
         // validamos el formato de la imagen 'png' o 'jpg'
       if(($Formato1== "png") or ($Formato1== "jpg")  or ($Formato1== "JPG")  or ($Formato1== "PNG") or ($Formato1== "JPEG" ) ){
          //validamos el peso de la imagen
          if($_FILES['txtImgup']['size'] > 2000000){
            $jsondata['success'] = false;
            $jsondata['message'] = "La imagen de portada Tiene un peso superior a 2MB";
          }else{
          //validamos las dimensiones de la imagen
            $infoImagen = getimagesize($_FILES['txtImgup']['tmp_name']);
            if ($infoImagen[0] <= 2000 || $infoImagen[1] <= 2000) {



              /* FOTO 2 */

              $Formato2 = substr($_FILES['txtImgSup']['name'], strlen($_FILES['txtImgSup']['name'])-3, strlen($_FILES['txtImgSup']['name']));
                // validamos el formato de la imagen 'png' o 'jpg'
              if(($Formato2== "png") or ($Formato2== "jpg")  or ($Formato2== "JPG")  or ($Formato2== "PNG") or ($Formato2== "JPEG" ) ){
                //validamos el peso de la imagen
                if($_FILES['txtImgSup']['size'] > 2000000){
                  $jsondata['success'] = false;
                  $jsondata['message'] = "La imagen de portada Tiene un peso superior a 2MB";
                }else{
                //validamos las dimensiones de la imagen
                  $infoImagen = getimagesize($_FILES['txtImgSup']['tmp_name']);
                  if ($infoImagen[0] <= 2000 || $infoImagen[1] <= 2000) {
                    $where1 = " Id = " . $vId;

                    if($event->updateData($data, $where1)){
                        /* Tomamos el Id del ultimo registro*/
                     

                      
                        // creamos la carpeta
                        $carpeta = "../public/Imagenes/".$vId;
                        if (!file_exists($carpeta)) {
                            mkdir($carpeta, 0777, true);
                        }

                        // datos de la imagen 1 necesarios para el registro                                              
                        $destino = "../public/Imagenes/".$vId."/". $Imagen1;
                        $dest = "public/Imagenes/".$vId. "/". $Imagen1 . " ";
                        $ruta = $_FILES['txtImgup']['tmp_name'];


                         // datos de la imagen 2 necesarios para el registro                                              
                         $destino2 = "../public/Imagenes/".$vId."/". $Imagen2;
                         $dest2 = "public/Imagenes/".$vId. "/". $Imagen2 . " ";
                         $ruta2 = $_FILES['txtImgSup']['tmp_name'];


                          // se mueve el archivo en la carpeta indicada
                          if(copy($ruta,$destino)  AND copy($ruta2,$destino2) ){
                            $data = array("Imagen"=>$dest, "ImagenG"=>$dest2 );
                            $where = " Id = " . $vId;
                            // actualizamos el ultimo regsitro
                            if($event->updateData($data, $where)){
                              $jsondata['success'] = true;
                              $jsondata['message'] = ' Imagen Actualizada Correctamente';
                            }else {
                              $jsondata['success'] = false;
                              $jsondata['message'] = "No fue posible Registrar sus datos";
                            }

                          }else {
                            $jsondata['success'] = false;
                            $jsondata['message'] = "No fue posible subir su Imagen";
                          }
                      }





                      /*INFORMACION IMAGENES  */
                  }
                }
              }else{
                $jsondata['success'] = false;
                $jsondata['message'] = "La imagen debe ser PNG o JPG";

              }

              /*FIN FOTO 2 */

                











            }
          }
        }else{
          $jsondata['success'] = false;
          $jsondata['message'] = "La imagen debe ser PNG o JPG";

        }

        /*FIN FOTO 1 */


      }elseif($Imagen1 != "" ){

        

          // Datos necesarios para el registro
          $data = array("Titulo"=>$_REQUEST['txtTitleup'], "Tipo"=>$_REQUEST['txtTipoup'],
          "Status"=>$_REQUEST['txtStatusup'], "Updated_date"=>date('Y-m-d H:i:s'), "Updated_by"=>$user);


        /* FOTO 1 */

        $Formato1 = substr($_FILES['txtImgup']['name'], strlen($_FILES['txtImgup']['name'])-3, strlen($_FILES['txtImgup']['name']));
         // validamos el formato de la imagen 'png' o 'jpg'
       if(($Formato1== "png") or ($Formato1== "jpg")  or ($Formato1== "JPG")  or ($Formato1== "PNG") or ($Formato1== "JPEG" ) ){
          //validamos el peso de la imagen
          if($_FILES['txtImgup']['size'] > 2000000){
            $jsondata['success'] = false;
            $jsondata['message'] = "La imagen de portada Tiene un peso superior a 2MB";
          }else{
          //validamos las dimensiones de la imagen
            $infoImagen = getimagesize($_FILES['txtImgup']['tmp_name']);
            if ($infoImagen[0] <= 2000 || $infoImagen[1] <= 2000) {

              $where2 = " Id = " . $vId;

              if($event->updateData($data, $where2)){


              // creamos la carpeta
              $carpeta = "../public/Imagenes/".$vId;
              if (!file_exists($carpeta)) {
                  mkdir($carpeta, 0777, true);
              }

              // datos de la imagen 1 necesarios para el registro                                              
              $destino = "../public/Imagenes/".$vId."/". $Imagen1;
              $dest = "public/Imagenes/".$vId. "/". $Imagen1 . "' ";
              $ruta = $_FILES['txtImgup']['tmp_name'];

              
              // se mueve el archivo en la carpeta indicada
              if(copy($ruta,$destino) ){
                $data = array("Imagen"=>$dest );
                $where = " Id = " . $vId;
                // actualizamos el ultimo regsitro
                if($event->updateData($data, $where)){
                  $jsondata['success'] = true;
                  $jsondata['message'] = ' Imagen Actualizada Correctamente';
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


        }else {
          $jsondata['success'] = false;
          $jsondata['message'] = "Formato de imagen Incorrecto";
        }










      }elseif($Imagen1 == "" AND $Imagen2 == "" ){

         // Datos necesarios para el registro
         $data = array("Titulo"=>$_REQUEST['txtTitleup'], "Tipo"=>$_REQUEST['txtTipoup'],
         "Status"=>$_REQUEST['txtStatusup'], "Updated_date"=>date('Y-m-d H:i:s'), "Updated_by"=>$user);
         $where = " Id = " . $vId;

         if($event->updateData($data, $where)){
          $jsondata['success'] = true;
          $jsondata['message'] = ' informacion Actualizada Correctamente';

         }else{



         }






      }




      header('Content-type: application/json; charset=utf-8');
      echo json_encode($jsondata);
   break;

   // cambia estado

   case "status":
      $jsondata = array();
      // Realiza Insert
        $data = array("Status"=>$_REQUEST['pStatus'], "Descripcion"=>$_REQUEST['txtDes'], "Enlace"=>$_REQUEST['txtLink'], "Fecha"=>$_REQUEST['txtDate'], "Updated_by"=>$user, "Updated_at"=>date("Y-m-d H:i:s")
                  );
      $where = "Id = " . $_REQUEST['pId'];
     if($eventvicio->updateData($data, $where))
     {
       $jsondata['success'] = true;
       $jsondata['message'] = "Modificado correctamente";
      }
      else
      {
        $jsondata['success'] = false;
        $jsondata['message'] = "Falla al modificar el registro";
      }
      header('Content-type: application/json; charset=utf-8');
      echo json_encode($jsondata);
   break;
   /* Crea delete de usuarios */
   case "del":

     $Id =  $_REQUEST['pId'];
     $jsondata = array();
     if($event->delData($Id))
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


    }
?>