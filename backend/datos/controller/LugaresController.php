<?php
	/** incluye todos los recursos */
  include_once("../AnsTek_libs/integracion.inc.php");
	// Session::valida_sesion("","../../index.php");
  include_once("../model/lugares.class.php");
  $user = Session::get('Id');
  /** Instancia la clase usuarios*/
	$objUser = new lugar($db);
	// $vname = Session::get('Id');
  /** captura el tipo de accion a realizar*/
  $accion = $_REQUEST['accion'];

	/** conmutador que determina las acciones a realizar para
	 * este modulo
	 */
	switch($accion){
    /* Obtiene un solo registro de usuario */
		case "single":
		$jsondata = array();
      $where = " Where Id = " . $_REQUEST['pId'];
      $result = $objUser->selectAll($where);
      if($db->numRows($result) > 0)
      {
        $r = $db->datos($result);

    		$jsondata['Id'] = $r["Id"];
    		$jsondata['Titulo'] = $r["Titulo"];
    		$jsondata['Ubicacion'] = $r["Ubicacion"];
        $jsondata['Descripcion'] = $r["Descripcion"];
        $jsondata['Tipo'] = $r["Tipo"];
        
       
        $jsondata['Foto1'] = $r["Foto1"];
        $jsondata['Foto2'] = $r["Foto2"];
        $jsondata['Foto3'] = $r["Foto3"];
        $jsondata['Foto4'] = $r["Foto4"];
        $jsondata['Foto5'] = $r["Foto5"];

    		$jsondata['Status'] = $r["Status"];
    		$jsondata['Created_date'] = $r["Created_date"];
        $jsondata['Created_by'] = $r["Created_by"];
        $jsondata['Updated_date'] = $r["Updated_date"];
        $jsondata['Updated_by'] = $r["Updated_by"];
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
    /* Crea insert de usuarios */
    case "ins":
    $jsondata = array();

    $Tab = $_REQUEST['txtTipoG'];

    if($Tab == "Video"){

      // Datos necesarios para el registro
      $data = array("Nombre"=>$_REQUEST['txtName'], "Url"=>$_REQUEST['txtUrl'], "Posicion"=>$_REQUEST['txtPos'],
      "Status"=>1, "Created_at"=>date('Y-m-d H:i:s'), "Created_by"=>$user);
      if($objUser->insertData($data)){
        $jsondata['success'] = true;
        $jsondata['message'] = "Registrado correctamente";
      }else{
        $jsondata['success'] = false;
        $jsondata['message'] = "Falla al enviar el registro";
      }



    }else{

      // Datos necesarios para el registro
      $data = array("Titulo"=>$_REQUEST['txtName'], "Ubicacion"=>$_REQUEST['txtUbi'],
      "Status"=>$_REQUEST['txtStatus'], "Tipo"=>$_REQUEST['txtTipoG'], "Descripcion"=>$_REQUEST['txtDescrip'],  "Created_date"=>date('Y-m-d H:i:s'), "Created_by"=>$user);
      // Tomamos el formato de la imagen adjuntada
      
      $FormatoImagen1 = substr($_FILES['txtImg1']['name'], strlen($_FILES['txtImg1']['name'])-3, strlen($_FILES['txtImg1']['name']));
      $FormatoImagen2 = substr($_FILES['txtImg2']['name'], strlen($_FILES['txtImg2']['name'])-3, strlen($_FILES['txtImg2']['name']));
      $FormatoImagen3 = substr($_FILES['txtImg3']['name'], strlen($_FILES['txtImg3']['name'])-3, strlen($_FILES['txtImg3']['name']));
      $FormatoImagen4 = substr($_FILES['txtImg4']['name'], strlen($_FILES['txtImg4']['name'])-3, strlen($_FILES['txtImg4']['name']));
      $FormatoImagen5 = substr($_FILES['txtImg5']['name'], strlen($_FILES['txtImg5']['name'])-3, strlen($_FILES['txtImg5']['name']));


          //validamos las dimensiones de la imagen
         

      if($_FILES['txtImg4']['name'] == ""){
          /* VACIO 4 y 5 */
          /* IMAGEN 1  */
              // validamos el formato de la imagen 'png' o 'jpg'
              if(($FormatoImagen1 == "png") or ($FormatoImagen1 == "jpg")  or ($FormatoImagen1 == "JPG")  or ($FormatoImagen1 == "PNG") or ($FormatoImagen1 == "JPEG" ) or ($FormatoImagen1 == "jpeg") ){
                //validamos el peso de la imagen
                if($_FILES['txtImg1']['size'] > 2000000){
                  $jsondata['success'] = false;
                  $jsondata['message'] = "La imagen #1 Tiene un peso superior a 2MB";
                }else{
                //validamos las dimensiones de la imagen
                  $infoImagen = getimagesize($_FILES['txtImg1']['tmp_name']);
                  if ($infoImagen[0] <= 2000 || $infoImagen[1] <= 2000) {

                      /* IMAGEN 2 */

                      // validamos el formato de la imagen 'png' o 'jpg'
                      if(($FormatoImagen2 == "png") or ($FormatoImagen2 == "jpg")  or ($FormatoImagen2 == "JPG")  or ($FormatoImagen2 == "PNG") or ($FormatoImagen2 == "JPEG" ) or ($FormatoImagen1 == "jpeg") ){
                        //validamos el peso de la imagen
                        if($_FILES['txtImg2']['size'] > 2000000){
                          $jsondata['success'] = false;
                          $jsondata['message'] = "La imagen #2 Tiene un peso superior a 2MB";
                        }else{
                        //validamos las dimensiones de la imagen
                          $infoImagen = getimagesize($_FILES['txtImg2']['tmp_name']);
                          if ($infoImagen[0] <= 2000 || $infoImagen[1] <= 2000) {

                              /* IMAGEN 3 */

                              // validamos el formato de la imagen 'png' o 'jpg'
                              if(($FormatoImagen3 == "png") or ($FormatoImagen3 == "jpg")  or ($FormatoImagen3 == "JPG")  or ($FormatoImagen3 == "PNG") or ($FormatoImagen3 == "JPEG" ) or ($FormatoImagen1 == "jpeg")){
                                //validamos el peso de la imagen
                                if($_FILES['txtImg3']['size'] > 2000000){
                                  $jsondata['success'] = false;
                                  $jsondata['message'] = "La imagen #3 Tiene un peso superior a 2MB";
                                }else{
                                //validamos las dimensiones de la imagen
                                  $infoImagen = getimagesize($_FILES['txtImg3']['tmp_name']);
                                  if ($infoImagen[0] <= 2000 || $infoImagen[1] <= 2000) {

                                               
                                                      /* COPIAMOS IMAGENES */

                                                      /*IAMGEN PORTADA */
                                                      
                                                      if($objUser->insertData($data))
                                                      {
                                                        /* Tomamos el Id del ultimo registro*/
                                                        $vId = $db->lastInsert();
                                                        // creamos la carpeta
                                                        $carpeta = "../public/Lugares/".$vId. "/Portada";
                                                        if (!file_exists($carpeta)) {
                                                            mkdir($carpeta, 0777, true);
                                                        }

                                                        $carpeta = "../public/Lugares/".$vId. "/Galeria";
                                                        if (!file_exists($carpeta)) {
                                                            mkdir($carpeta, 0777, true);
                                                        }

                                                       

                                                         // datos de la imagen 1 necesarios para el registro
                                                         $name1 = $_FILES['txtImg1']['name'];
                                                         $destino1 = "../public/Lugares/".$vId."/"."Galeria/".$name1;
                                                         $dest1 = "public/Lugares/".$vId. "/". "Galeria/".$name1;
                                                         $ruta1 = $_FILES['txtImg1']['tmp_name'];


                                                         // datos de la imagen 2 necesarios para el registro
                                                         $name2 = $_FILES['txtImg2']['name'];
                                                         $destino2 = "../public/Lugares/".$vId."/"."Galeria/".$name2;
                                                         $dest2 = "public/Lugares/".$vId. "/"."Galeria/".$name2;
                                                         $ruta2 = $_FILES['txtImg2']['tmp_name'];


                                                          // datos de la imagen 3 necesarios para el registro
                                                          $name3 = $_FILES['txtImg3']['name'];
                                                          $destino3 = "../public/Lugares/".$vId."/"."Galeria/".$name3;
                                                          $dest3 = "public/Lugares/".$vId. "/"."Galeria/".$name3;
                                                          $ruta3 = $_FILES['txtImg3']['tmp_name'];



                                                        // se mueve el archivo en la carpeta indicada
                                                        if(copy($ruta1,$destino1) and  copy($ruta2,$destino2)  and  copy($ruta3,$destino3) ){
                                                          $data = array("Portada"=>$dest, "Foto1"=>$dest1, "Foto2"=>$dest2, "Foto3"=>$dest3, "Foto4"=>$dest4, "Foto5"=>$dest5 );
                                                          $where = " Id = " . $vId;
                                                          // actualizamos el ultimo regsitro
                                                          if($objUser->updateData($data, $where)){
                                                            $jsondata['success'] = true;
                                                            $jsondata['message'] = "El Sitio fue registrado correctamente.";
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
                                                          $jsondata['message'] = "Falla al enviar el registro";
                                                      }

                                                
                                              

                                        
                                      


                                      







                                      /* IMAGEN 4 */
                                                                                                                      
                                  }else{
                                      $jsondata['success'] = false;
                                      $jsondata['message'] = "La imagen 3 no cumple las medidas solicitadas ";
                                  }
                                }
                              }else{
                                $jsondata['success'] = false;
                                $jsondata['message'] = "Formato de imagen 3 Incorrecto, Debe ser png o jpg";
                              }

                              







                              /* IMAGEN 3 */
                                                                                                              
                          }else{
                              $jsondata['success'] = false;
                              $jsondata['message'] = "La imagen 2 no cumple las medidas solicitadas ";
                          }
                        }
                      }else{
                        $jsondata['success'] = false;
                        $jsondata['message'] = "Formato de imagen 2 Incorrecto, Debe ser png o jpg";
                      }








                      /* IMAGEN 2 */
                                                                                                      
                  }else{
                      $jsondata['success'] = false;
                      $jsondata['message'] = "La imagen  1 no cumple las medidas solicitadas ";
                  }
                }
              }else{
                $jsondata['success'] = false;
                $jsondata['message'] = "Formato de imagen 1 Incorrecto, Debe ser png o jpg";
              }

              /* FIN IMAGEN 1  */

          /* VACIO 4 y 5 FIN */
        

      }elseif($_FILES['txtImg5']['name'] == ""){

        /* Campo 5 vacio  */
          /* IMAGEN 1  */
              // validamos el formato de la imagen 'png' o 'jpg'
              if(($FormatoImagen1 == "png") or ($FormatoImagen1 == "jpg")  or ($FormatoImagen1 == "JPG")  or ($FormatoImagen1 == "PNG") or ($FormatoImagen1 == "JPEG" ) or ($FormatoImagen1 == "jpeg") ){
                //validamos el peso de la imagen
                if($_FILES['txtImg1']['size'] > 2000000){
                  $jsondata['success'] = false;
                  $jsondata['message'] = "La imagen #1 Tiene un peso superior a 2MB";
                }else{
                //validamos las dimensiones de la imagen
                  $infoImagen = getimagesize($_FILES['txtImg1']['tmp_name']);
                  if ($infoImagen[0] <= 2000 || $infoImagen[1] <= 2000) {

                      /* IMAGEN 2 */

                      // validamos el formato de la imagen 'png' o 'jpg'
                      if(($FormatoImagen2 == "png") or ($FormatoImagen2 == "jpg")  or ($FormatoImagen2 == "JPG")  or ($FormatoImagen2 == "PNG") or ($FormatoImagen2 == "JPEG" ) or ($FormatoImagen1 == "jpeg") ){
                        //validamos el peso de la imagen
                        if($_FILES['txtImg2']['size'] > 2000000){
                          $jsondata['success'] = false;
                          $jsondata['message'] = "La imagen #2 Tiene un peso superior a 2MB";
                        }else{
                        //validamos las dimensiones de la imagen
                          $infoImagen = getimagesize($_FILES['txtImg2']['tmp_name']);
                          if ($infoImagen[0] <= 2000 || $infoImagen[1] <= 2000) {

                              /* IMAGEN 3 */

                              // validamos el formato de la imagen 'png' o 'jpg'
                              if(($FormatoImagen3 == "png") or ($FormatoImagen3 == "jpg")  or ($FormatoImagen3 == "JPG")  or ($FormatoImagen3 == "PNG") or ($FormatoImagen3 == "JPEG" ) or ($FormatoImagen1 == "jpeg")){
                                //validamos el peso de la imagen
                                if($_FILES['txtImg3']['size'] > 2000000){
                                  $jsondata['success'] = false;
                                  $jsondata['message'] = "La imagen #3 Tiene un peso superior a 2MB";
                                }else{
                                //validamos las dimensiones de la imagen
                                  $infoImagen = getimagesize($_FILES['txtImg3']['tmp_name']);
                                  if ($infoImagen[0] <= 2000 || $infoImagen[1] <= 2000) {

                                      /* IMAGEN 4 */

                                      // validamos el formato de la imagen 'png' o 'jpg'
                                      if(($FormatoImagen4 == "png") or ($FormatoImagen4 == "jpg")  or ($FormatoImagen4 == "JPG")  or ($FormatoImagen4 == "PNG") or ($FormatoImagen4 == "JPEG" ) or ($FormatoImagen1 == "jpeg") ){
                                        //validamos el peso de la imagen
                                        if($_FILES['txtImg4']['size'] > 2000000){
                                          $jsondata['success'] = false;
                                          $jsondata['message'] = "La imagen #4 Tiene un peso superior a 2MB";
                                        }else{
                                        //validamos las dimensiones de la imagen
                                          $infoImagen = getimagesize($_FILES['txtImg4']['tmp_name']);
                                          if ($infoImagen[0] <= 2000 || $infoImagen[1] <= 2000) {

                                                      /* COPIAMOS IMAGENES */
                                                      /*IAMGEN PORTADA */
                                                      
                                                      if($objUser->insertData($data))
                                                      {
                                                        /* Tomamos el Id del ultimo registro*/
                                                        $vId = $db->lastInsert();
                                                        // creamos la carpeta
                                                        $carpeta = "../public/Lugares/".$vId. "/Portada";
                                                        if (!file_exists($carpeta)) {
                                                            mkdir($carpeta, 0777, true);
                                                        }

                                                        $carpeta = "../public/Lugares/".$vId. "/Galeria";
                                                        if (!file_exists($carpeta)) {
                                                            mkdir($carpeta, 0777, true);
                                                        }

                                                       

                                                         // datos de la imagen 1 necesarios para el registro
                                                         $name1 = $_FILES['txtImg1']['name'];
                                                         $destino1 = "../public/Lugares/".$vId."/"."Galeria/".$name1;
                                                         $dest1 = "public/Lugares/".$vId. "/". "Galeria/".$name1;
                                                         $ruta1 = $_FILES['txtImg1']['tmp_name'];


                                                         // datos de la imagen 2 necesarios para el registro
                                                         $name2 = $_FILES['txtImg2']['name'];
                                                         $destino2 = "../public/Lugares/".$vId."/"."Galeria/".$name2;
                                                         $dest2 = "public/Lugares/".$vId. "/"."Galeria/".$name2;
                                                         $ruta2 = $_FILES['txtImg2']['tmp_name'];


                                                          // datos de la imagen 3 necesarios para el registro
                                                          $name3 = $_FILES['txtImg3']['name'];
                                                          $destino3 = "../public/Lugares/".$vId."/"."Galeria/".$name3;
                                                          $dest3 = "public/Lugares/".$vId. "/"."Galeria/".$name3;
                                                          $ruta3 = $_FILES['txtImg3']['tmp_name'];


                                                          // datos de la imagen 4 necesarios para el registro
                                                          $name4 = $_FILES['txtImg4']['name'];
                                                          $destino4 = "../public/Lugares/".$vId."/"."Galeria/".$name4;
                                                          $dest4 = "public/Lugares/".$vId. "/"."Galeria/".$name4;
                                                          $ruta4 = $_FILES['txtImg4']['tmp_name'];




                                                        // se mueve el archivo en la carpeta indicada
                                                        if(copy($ruta1,$destino1) and  copy($ruta2,$destino2)  and  copy($ruta3,$destino3) and  copy($ruta4,$destino4)  ){
                                                          $data = array("Portada"=>$dest, "Foto1"=>$dest1, "Foto2"=>$dest2, "Foto3"=>$dest3, "Foto4"=>$dest4, "Foto5"=>$dest5 );
                                                          $where = " Id = " . $vId;
                                                          // actualizamos el ultimo regsitro
                                                          if($objUser->updateData($data, $where)){
                                                            $jsondata['success'] = true;
                                                            $jsondata['message'] = "El Sitio fue registrado correctamente.";
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
                                                          $jsondata['message'] = "Falla al enviar el registro";
                                                      }

                                                  
                                                
                                              








                                              /* IMAGEN 5 */
                                                                                                                              
                                          }else{
                                              $jsondata['success'] = false;
                                              $jsondata['message'] = "La imagen 4 no cumple las medidas solicitadas ";
                                          }
                                        }
                                      }else{
                                        $jsondata['success'] = false;
                                        $jsondata['message'] = "Formato de imagen 4 Incorrecto, Debe ser png o jpg";
                                      }


                                      







                                      /* IMAGEN 4 */
                                                                                                                      
                                  }else{
                                      $jsondata['success'] = false;
                                      $jsondata['message'] = "La imagen 3 no cumple las medidas solicitadas ";
                                  }
                                }
                              }else{
                                $jsondata['success'] = false;
                                $jsondata['message'] = "Formato de imagen 3 Incorrecto, Debe ser png o jpg";
                              }

                              







                              /* IMAGEN 3 */
                                                                                                              
                          }else{
                              $jsondata['success'] = false;
                              $jsondata['message'] = "La imagen 2 no cumple las medidas solicitadas ";
                          }
                        }
                      }else{
                        $jsondata['success'] = false;
                        $jsondata['message'] = "Formato de imagen 2 Incorrecto, Debe ser png o jpg";
                      }








                      /* IMAGEN 2 */
                                                                                                      
                  }else{
                      $jsondata['success'] = false;
                      $jsondata['message'] = "La imagen  1 no cumple las medidas solicitadas ";
                  }
                }
              }else{
                $jsondata['success'] = false;
                $jsondata['message'] = "Formato de imagen 1 Incorrecto, Debe ser png o jpg";
              }

              /* FIN IMAGEN 1  */

        /* Campo 5 vacio FIN  */
      }else{

          /* TODOS LOS CAMPOS LLENOS */
            /* IMAGEN 1  */
              // validamos el formato de la imagen 'png' o 'jpg'
              if(($FormatoImagen1 == "png") or ($FormatoImagen1 == "jpg")  or ($FormatoImagen1 == "JPG")  or ($FormatoImagen1 == "PNG") or ($FormatoImagen1 == "JPEG" ) or ($FormatoImagen1 == "jpeg") ){
                //validamos el peso de la imagen
                if($_FILES['txtImg1']['size'] > 2000000){
                  $jsondata['success'] = false;
                  $jsondata['message'] = "La imagen #1 Tiene un peso superior a 2MB";
                }else{
                //validamos las dimensiones de la imagen
                  $infoImagen = getimagesize($_FILES['txtImg1']['tmp_name']);
                  if ($infoImagen[0] <= 2000 || $infoImagen[1] <= 2000) {

                      /* IMAGEN 2 */

                      // validamos el formato de la imagen 'png' o 'jpg'
                      if(($FormatoImagen2 == "png") or ($FormatoImagen2 == "jpg")  or ($FormatoImagen2 == "JPG")  or ($FormatoImagen2 == "PNG") or ($FormatoImagen2 == "JPEG" ) or ($FormatoImagen1 == "jpeg") ){
                        //validamos el peso de la imagen
                        if($_FILES['txtImg2']['size'] > 2000000){
                          $jsondata['success'] = false;
                          $jsondata['message'] = "La imagen #2 Tiene un peso superior a 2MB";
                        }else{
                        //validamos las dimensiones de la imagen
                          $infoImagen = getimagesize($_FILES['txtImg2']['tmp_name']);
                          if ($infoImagen[0] <= 2000 || $infoImagen[1] <= 2000) {

                              /* IMAGEN 3 */

                              // validamos el formato de la imagen 'png' o 'jpg'
                              if(($FormatoImagen3 == "png") or ($FormatoImagen3 == "jpg")  or ($FormatoImagen3 == "JPG")  or ($FormatoImagen3 == "PNG") or ($FormatoImagen3 == "JPEG" ) or ($FormatoImagen1 == "jpeg")){
                                //validamos el peso de la imagen
                                if($_FILES['txtImg3']['size'] > 2000000){
                                  $jsondata['success'] = false;
                                  $jsondata['message'] = "La imagen #3 Tiene un peso superior a 2MB";
                                }else{
                                //validamos las dimensiones de la imagen
                                  $infoImagen = getimagesize($_FILES['txtImg3']['tmp_name']);
                                  if ($infoImagen[0] <= 2000 || $infoImagen[1] <= 2000) {

                                      /* IMAGEN 4 */

                                      // validamos el formato de la imagen 'png' o 'jpg'
                                      if(($FormatoImagen4 == "png") or ($FormatoImagen4 == "jpg")  or ($FormatoImagen4 == "JPG")  or ($FormatoImagen4 == "PNG") or ($FormatoImagen4 == "JPEG" ) or ($FormatoImagen1 == "jpeg") ){
                                        //validamos el peso de la imagen
                                        if($_FILES['txtImg4']['size'] > 2000000){
                                          $jsondata['success'] = false;
                                          $jsondata['message'] = "La imagen #4 Tiene un peso superior a 2MB";
                                        }else{
                                        //validamos las dimensiones de la imagen
                                          $infoImagen = getimagesize($_FILES['txtImg4']['tmp_name']);
                                          if ($infoImagen[0] <= 2000 || $infoImagen[1] <= 2000) {

                                              /* IMAGEN 5 */

                                              // validamos el formato de la imagen 'png' o 'jpg'
                                              if(($FormatoImagen5 == "png") or ($FormatoImagen5 == "jpg")  or ($FormatoImagen5 == "JPG")  or ($FormatoImagen5 == "PNG") or ($FormatoImagen5 == "JPEG" ) or ($FormatoImagen1 == "jpeg")){
                                                //validamos el peso de la imagen
                                                if($_FILES['txtImg5']['size'] > 2000000){
                                                  $jsondata['success'] = false;
                                                  $jsondata['message'] = "La imagen #5 Tiene un peso superior a 2MB";
                                                }else{
                                                //validamos las dimensiones de la imagen
                                                  $infoImagen = getimagesize($_FILES['txtImg5']['tmp_name']);
                                                  if ($infoImagen[0] <= 2000 || $infoImagen[1] <= 2000) {

                                                      /* COPIAMOS IMAGENES */

                                                      /*IAMGEN PORTADA */
                                                      
                                                      if($objUser->insertData($data))
                                                      {
                                                        /* Tomamos el Id del ultimo registro*/
                                                        $vId = $db->lastInsert();
                                                        // creamos la carpeta
                                                        $carpeta = "../public/Lugares/".$vId. "/Portada";
                                                        if (!file_exists($carpeta)) {
                                                            mkdir($carpeta, 0777, true);
                                                        }

                                                        $carpeta = "../public/Lugares/".$vId. "/Galeria";
                                                        if (!file_exists($carpeta)) {
                                                            mkdir($carpeta, 0777, true);
                                                        }

                                                       

                                                         // datos de la imagen 1 necesarios para el registro
                                                         $name1 = $_FILES['txtImg1']['name'];
                                                         $destino1 = "../public/Lugares/".$vId."/"."Galeria/".$name1;
                                                         $dest1 = "public/Lugares/".$vId. "/". "Galeria/".$name1;
                                                         $ruta1 = $_FILES['txtImg1']['tmp_name'];


                                                         // datos de la imagen 2 necesarios para el registro
                                                         $name2 = $_FILES['txtImg2']['name'];
                                                         $destino2 = "../public/Lugares/".$vId."/"."Galeria/".$name2;
                                                         $dest2 = "public/Lugares/".$vId. "/"."Galeria/".$name2;
                                                         $ruta2 = $_FILES['txtImg2']['tmp_name'];


                                                          // datos de la imagen 3 necesarios para el registro
                                                          $name3 = $_FILES['txtImg3']['name'];
                                                          $destino3 = "../public/Lugares/".$vId."/"."Galeria/".$name3;
                                                          $dest3 = "public/Lugares/".$vId. "/"."Galeria/".$name3;
                                                          $ruta3 = $_FILES['txtImg3']['tmp_name'];


                                                          // datos de la imagen 4 necesarios para el registro
                                                          $name4 = $_FILES['txtImg4']['name'];
                                                          $destino4 = "../public/Lugares/".$vId."/"."Galeria/".$name4;
                                                          $dest4 = "public/Lugares/".$vId. "/"."Galeria/".$name4;
                                                          $ruta4 = $_FILES['txtImg4']['tmp_name'];


                                                          // datos de la imagen 5 necesarios para el registro
                                                          $name5 = $_FILES['txtImg5']['name'];
                                                          $destino5 = "../public/Lugares/".$vId."/"."Galeria/".$name5;
                                                          $dest5 = "public/Lugares/".$vId. "/"."Galeria/".$name5;
                                                          $ruta5 = $_FILES['txtImg5']['tmp_name'];


                                                        // se mueve el archivo en la carpeta indicada
                                                        if(copy($ruta1,$destino1) and  copy($ruta2,$destino2)  and  copy($ruta3,$destino3) and  copy($ruta4,$destino4) and  copy($ruta5,$destino5) ){
                                                          $data = array("Portada"=>$dest, "Foto1"=>$dest1, "Foto2"=>$dest2, "Foto3"=>$dest3, "Foto4"=>$dest4, "Foto5"=>$dest5 );
                                                          $where = " Id = " . $vId;
                                                          // actualizamos el ultimo regsitro
                                                          if($objUser->updateData($data, $where)){
                                                            $jsondata['success'] = true;
                                                            $jsondata['message'] = "El Sitio fue registrado correctamente.";
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
                                                          $jsondata['message'] = "Falla al enviar el registro";
                                                      }

                                                                                
                                                  }else{
                                                      $jsondata['success'] = false;
                                                      $jsondata['message'] = "La imagen 5 no cumple las medidas solicitadas ";
                                                  }
                                                }
                                              }else{
                                                $jsondata['success'] = false;
                                                $jsondata['message'] = "Formato de imagen 5 Incorrecto, Debe ser png o jpg";
                                              }








                                              /* IMAGEN 5 */
                                                                                                                              
                                          }else{
                                              $jsondata['success'] = false;
                                              $jsondata['message'] = "La imagen 4 no cumple las medidas solicitadas ";
                                          }
                                        }
                                      }else{
                                        $jsondata['success'] = false;
                                        $jsondata['message'] = "Formato de imagen 4 Incorrecto, Debe ser png o jpg";
                                      }


                                      







                                      /* IMAGEN 4 */
                                                                                                                      
                                  }else{
                                      $jsondata['success'] = false;
                                      $jsondata['message'] = "La imagen 3 no cumple las medidas solicitadas ";
                                  }
                                }
                              }else{
                                $jsondata['success'] = false;
                                $jsondata['message'] = "Formato de imagen 3 Incorrecto, Debe ser png o jpg";
                              }

                              







                              /* IMAGEN 3 */
                                                                                                              
                          }else{
                              $jsondata['success'] = false;
                              $jsondata['message'] = "La imagen 2 no cumple las medidas solicitadas ";
                          }
                        }
                      }else{
                        $jsondata['success'] = false;
                        $jsondata['message'] = "Formato de imagen 2 Incorrecto, Debe ser png o jpg";
                      }








                      /* IMAGEN 2 */
                                                                                                      
                  }else{
                      $jsondata['success'] = false;
                      $jsondata['message'] = "La imagen  1 no cumple las medidas solicitadas ";
                  }
                }
              }else{
                $jsondata['success'] = false;
                $jsondata['message'] = "Formato de imagen 1 Incorrecto, Debe ser png o jpg";
              }

              /* FIN IMAGEN 1  */



          /* FIN */


      }
              
            


                                                                                              
          
        
      


    }

      header('Content-type: application/json; charset=utf-8');
      echo json_encode($jsondata);
    break;

    
      /* Crea Update de galeria */
    case "upd":
      $jsondata = array();

      $Imagen1 = trim($_FILES['txtImgup1']['name']);
      $Imagen1 = str_replace(' ', '-', $Imagen1);


      $Imagen2 = trim($_FILES['txtImgup2']['name']);
      $Imagen2 = str_replace(' ', '-', $Imagen2);
      $Imagen3 = trim($_FILES['txtImgup3']['name']);
      $Imagen3 = str_replace(' ', '-', $Imagen3);
      $Imagen4 = trim($_FILES['txtImgup4']['name']);
      $Imagen4 = str_replace(' ', '-', $Imagen4);
      $Imagen5 = trim($_FILES['txtImgup5']['name']);
      $Imagen5 = str_replace(' ', '-', $Imagen5);


      

      $vId = $_REQUEST['txtIdup'];






      if ( ($Imagen1 !="")   AND ($Imagen2 !="")  AND ($Imagen3 !="") AND ($Imagen4 !="") AND ($Imagen5 !="")) { 
      	// si file viene lleno            
        $data = array("Titulo"=>$_REQUEST['txtNameup'], "Ubicacion"=>$_REQUEST['txtUbiup'],  
        "Status"=>$_REQUEST['txtStatusup'], "Tipo"=>$_REQUEST['txtTipoGup'], "Descripcion"=>$_REQUEST['txtDescripup'],  "Updated_by"=>$vname,  "Updated_date"=>date('Y-m-d H:i:s')
        );
        $where = " Id = " . $_REQUEST['txtIdup'];
        $objUser->updateData($data, $where);
        
        $vType = substr($_FILES['txtImgup']['name'], strlen($_FILES['txtImgup']['name'])-3, strlen($_FILES['txtImgup']['name']));

        $FormatoImagen1 = substr($_FILES['txtImgup1']['name'], strlen($_FILES['txtImgup1']['name'])-3, strlen($_FILES['txtImgup1']['name']));
        $FormatoImagen2 = substr($_FILES['txtImgup2']['name'], strlen($_FILES['txtImgup2']['name'])-3, strlen($_FILES['txtImgup2']['name']));
        $FormatoImagen3 = substr($_FILES['txtImgup3']['name'], strlen($_FILES['txtImgup3']['name'])-3, strlen($_FILES['txtImgup3']['name']));
        $FormatoImagen4 = substr($_FILES['txtImgup4']['name'], strlen($_FILES['txtImgup4']['name'])-3, strlen($_FILES['txtImgup4']['name']));
        $FormatoImagen5 = substr($_FILES['txtImgup5']['name'], strlen($_FILES['txtImgup5']['name'])-3, strlen($_FILES['txtImgup5']['name']));


        /* PORTADA  */

                /* FOTO 1 */

                if(($FormatoImagen1 == "png") or ($FormatoImagen1 == "jpg") or ($FormatoImagen1 == "JPG") or ($FormatoImagen1 == "PNG") ){
                  //validamos el peso de la imagen
                  if($_FILES['txtImgup1']['size'] <= 7000000){
                    //validamos las dimensiones de la imagen
                    $infoImagen = getimagesize($_FILES['txtImgup1']['tmp_name']);
                    if ($infoImagen[0] <= 20000 || $infoImagen[1] <= 20000) {
      
                        /* FOTO 2 */
                        if(($FormatoImagen2 == "png") or ($FormatoImagen2 == "jpg") or ($FormatoImagen2 == "JPG") or ($FormatoImagen2 == "PNG") ){
                          //validamos el peso de la imagen
                          if($_FILES['txtImgup2']['size'] <= 7000000){
                            //validamos las dimensiones de la imagen
                            $infoImagen = getimagesize($_FILES['txtImgup2']['tmp_name']);
                            if ($infoImagen[0] <= 20000 || $infoImagen[1] <= 20000) {
              
                              /* FOTO 3*/
                              if(($FormatoImagen3 == "png") or ($FormatoImagen3 == "jpg") or ($FormatoImagen3 == "JPG") or ($FormatoImagen3 == "PNG") ){
                                //validamos el peso de la imagen
                                if($_FILES['txtImgup3']['size'] <= 7000000){
                                  //validamos las dimensiones de la imagen
                                  $infoImagen = getimagesize($_FILES['txtImgup3']['tmp_name']);
                                  if ($infoImagen[0] <= 20000 || $infoImagen[1] <= 20000) {
                                    /* FOTO 4*/
                                    if(($FormatoImagen4 == "png") or ($FormatoImagen4 == "jpg") or ($FormatoImagen4 == "JPG") or ($FormatoImagen4 == "PNG") ){
                                      //validamos el peso de la imagen
                                      if($_FILES['txtImgup4']['size'] <= 7000000){
                                        //validamos las dimensiones de la imagen
                                        $infoImagen = getimagesize($_FILES['txtImgup4']['tmp_name']);
                                        if ($infoImagen[0] <= 20000 || $infoImagen[1] <= 20000) {
                                          /* FOTO 5   */
                                          if(($FormatoImagen5 == "png") or ($FormatoImagen5 == "jpg") or ($FormatoImagen5 == "JPG") or ($FormatoImagen5 == "PNG") ){
                                            //validamos el peso de la imagen
                                            if($_FILES['txtImgup5']['size'] <= 7000000){
                                              //validamos las dimensiones de la imagen
                                              $infoImagen = getimagesize($_FILES['txtImgup5']['tmp_name']);
                                              if ($infoImagen[0] <= 20000 || $infoImagen[1] <= 20000) {

                                                /* INFORMACION DE LAS 5 IMAGENES */



                                                // datos de la imagen 1 necesarios para el registro
                                                
                                                $destino1 = "../public/Lugares/".$vId."/"."Galeria/".$Imagen1;
                                                $dest1 = "public/Lugares/".$vId. "/". "Galeria/".$Imagen1;
                                                $ruta1 = $_FILES['txtImgup1']['tmp_name'];


                                                // datos de la imagen 2 necesarios para el registro
                                                
                                                $destino2 = "../public/Lugares/".$vId."/"."Galeria/".$Imagen2;
                                                $dest2 = "public/Lugares/".$vId. "/"."Galeria/".$Imagen2;
                                                $ruta2 = $_FILES['txtImgup2']['tmp_name'];


                                                 // datos de la imagen 3 necesarios para el registro
                                                 
                                                 $destino3 = "../public/Lugares/".$vId."/"."Galeria/".$Imagen3;
                                                 $dest3 = "public/Lugares/".$vId. "/"."Galeria/".$Imagen3;
                                                 $ruta3 = $_FILES['txtImgup3']['tmp_name'];


                                                 // datos de la imagen 4 necesarios para el registro
                                                 
                                                 $destino4 = "../public/Lugares/".$vId."/"."Galeria/".$Imagen4;
                                                 $dest4 = "public/Lugares/".$vId. "/"."Galeria/".$Imagen4;
                                                 $ruta4 = $_FILES['txtImgup4']['tmp_name'];


                                                 // datos de la imagen 5 necesarios para el registro
                                                 
                                                 $destino5 = "../public/Lugares/".$vId."/"."Galeria/".$Imagen5;
                                                 $dest5 = "public/Lugares/".$vId. "/"."Galeria/".$Imagen5;
                                                 $ruta5 = $_FILES['txtImgup5']['tmp_name'];


                                                if( copy($ruta1,$destino1) and  copy($ruta2,$destino2)  and  copy($ruta3,$destino3) and  copy($ruta4,$destino4) and  copy($ruta5,$destino5)){                                                

                                                $data = array("Portada"=>$dest, "Foto1"=>$dest1, "Foto2"=>$dest2, "Foto3"=>$dest3, "Foto4"=>$dest4, "Foto5"=>$dest5 );

                                                $where = " Id = " . $vId;
                                                if($objUser->updateData($data, $where)){
                                                  $jsondata['success'] = true;
                                                  $jsondata['message'] = "Todos Los datos fueron Actualizados";
                                                  $jsondata['redirect'] = 1;
                                                }else {
                                                  $jsondata['success'] = false;
                                                  $jsondata['message'] = "No fue posible Actualizar sus Datos";
                                                }




                                                }else{
                                                $jsondata['success'] = false;
                                                $jsondata['message'] = "No Fue posible subir su Imagen";
                                                }




                                                
                                
                                
                                
                                                /* FIN INFORMACION  */
                                
                                
                                              }else{
                                                $jsondata['success'] = false;
                                                $jsondata['message'] = "La imagen no cumple las medidas solicitadas ";
                                              }
                                
                                            }else{
                                              $jsondata['success'] = false;
                                              $jsondata['message'] = "No se pueden subir Imagenes con pesos superiores a 1MB";
                                            }
                                
                                
                                
                                        }else{
                                          $jsondata['success'] = false;
                                          $jsondata['message'] = "Formato de imagen Incorrecto, Debe ser png o jpg";
                                        }
                      
                                        /* FIN FOTO 5  */
                                        }else{
                                          $jsondata['success'] = false;
                                          $jsondata['message'] = "La imagen no cumple las medidas solicitadas ";
                                        }
                          
                                      }else{
                                        $jsondata['success'] = false;
                                        $jsondata['message'] = "No se pueden subir Imagenes con pesos superiores a 1MB";
                                      }
                          
                          
                          
                                  }else{
                                    $jsondata['success'] = false;
                                    $jsondata['message'] = "Formato de imagen Incorrecto, Debe ser png o jpg";
                                  }

                                  /* FIN  FOTO 4  */
                                  }else{
                                    $jsondata['success'] = false;
                                    $jsondata['message'] = "La imagen no cumple las medidas solicitadas ";
                                  }
                    
                                }else{
                                  $jsondata['success'] = false;
                                  $jsondata['message'] = "No se pueden subir Imagenes con pesos superiores a 1MB";
                                }
                    
                    
                    
                            }else{
                              $jsondata['success'] = false;
                              $jsondata['message'] = "Formato de imagen Incorrecto, Debe ser png o jpg";
                            }



                            /* FIN FOTO 3 */
              

                            }else{
                              $jsondata['success'] = false;
                              $jsondata['message'] = "La imagen no cumple las medidas solicitadas ";
                            }
              
                          }else{
                            $jsondata['success'] = false;
                            $jsondata['message'] = "No se pueden subir Imagenes con pesos superiores a 1MB";
                          }
              
              
              
                      }else{
                        $jsondata['success'] = false;
                        $jsondata['message'] = "Formato de imagen Incorrecto, Debe ser png o jpg";
                      }

      
      
      
                      /* FIN FOTO 2 */
      
                    }else{
                      $jsondata['success'] = false;
                      $jsondata['message'] = "La imagen 1 no cumple las medidas solicitadas ";
                    }
      
                  }else{
                    $jsondata['success'] = false;
                    $jsondata['message'] = "No se pueden subir Imagenes con pesos superiores a 2MB";
                  }
      











                /* FIN FOTO 1 */

              }else{
                $jsondata['success'] = false;
                $jsondata['message'] = "La imagen no cumple las medidas solicitadas ";
              }

           

        
        /* FIN PORTADA */

      }elseif(($Imagen1 !="")   AND ($Imagen2 !="")  AND ($Imagen3 !="") AND ($Imagen4 !="")){



        // si file viene lleno            
        $data = array("Titulo"=>$_REQUEST['txtNameup'], "Ubicacion"=>$_REQUEST['txtUbiup'],  
        "Status"=>$_REQUEST['txtStatusup'], "Tipo"=>$_REQUEST['txtTipoGup'], "Descripcion"=>$_REQUEST['txtDescripup'],  "Updated_by"=>$vname,  "Updated_date"=>date('Y-m-d H:i:s')
        );
        $where = " Id = " . $_REQUEST['txtIdup'];
        $objUser->updateData($data, $where);
        
        $vType = substr($_FILES['txtImgup']['name'], strlen($_FILES['txtImgup']['name'])-3, strlen($_FILES['txtImgup']['name']));

        $FormatoImagen1 = substr($_FILES['txtImgup1']['name'], strlen($_FILES['txtImgup1']['name'])-3, strlen($_FILES['txtImgup1']['name']));
        $FormatoImagen2 = substr($_FILES['txtImgup2']['name'], strlen($_FILES['txtImgup2']['name'])-3, strlen($_FILES['txtImgup2']['name']));
        $FormatoImagen3 = substr($_FILES['txtImgup3']['name'], strlen($_FILES['txtImgup3']['name'])-3, strlen($_FILES['txtImgup3']['name']));
        $FormatoImagen4 = substr($_FILES['txtImgup4']['name'], strlen($_FILES['txtImgup4']['name'])-3, strlen($_FILES['txtImgup4']['name']));
        $FormatoImagen5 = substr($_FILES['txtImgup5']['name'], strlen($_FILES['txtImgup5']['name'])-3, strlen($_FILES['txtImgup5']['name']));


        /* PORTADA  */
        
        

                /* FOTO 1 */

                if(($FormatoImagen1 == "png") or ($FormatoImagen1 == "jpg") or ($FormatoImagen1 == "JPG") or ($FormatoImagen1 == "PNG") ){
                  //validamos el peso de la imagen
                  if($_FILES['txtImgup1']['size'] <= 7000000){
                    //validamos las dimensiones de la imagen
                    $infoImagen = getimagesize($_FILES['txtImgup1']['tmp_name']);
                    if ($infoImagen[0] <= 20000 || $infoImagen[1] <= 20000) {
      
                        /* FOTO 2 */
                        if(($FormatoImagen2 == "png") or ($FormatoImagen2 == "jpg") or ($FormatoImagen2 == "JPG") or ($FormatoImagen2 == "PNG") ){
                          //validamos el peso de la imagen
                          if($_FILES['txtImgup2']['size'] <= 7000000){
                            //validamos las dimensiones de la imagen
                            $infoImagen = getimagesize($_FILES['txtImgup2']['tmp_name']);
                            if ($infoImagen[0] <= 20000 || $infoImagen[1] <= 20000) {
              
                              /* FOTO 3*/
                              if(($FormatoImagen3 == "png") or ($FormatoImagen3 == "jpg") or ($FormatoImagen3 == "JPG") or ($FormatoImagen3 == "PNG") ){
                                //validamos el peso de la imagen
                                if($_FILES['txtImgup3']['size'] <= 7000000){
                                  //validamos las dimensiones de la imagen
                                  $infoImagen = getimagesize($_FILES['txtImgup3']['tmp_name']);
                                  if ($infoImagen[0] <= 20000 || $infoImagen[1] <= 20000) {
                                    /* FOTO 4*/
                                    if(($FormatoImagen4 == "png") or ($FormatoImagen4 == "jpg") or ($FormatoImagen4 == "JPG") or ($FormatoImagen4 == "PNG") ){
                                      //validamos el peso de la imagen
                                      if($_FILES['txtImgup4']['size'] <= 7000000){
                                        //validamos las dimensiones de la imagen
                                        $infoImagen = getimagesize($_FILES['txtImgup4']['tmp_name']);
                                        if ($infoImagen[0] <= 20000 || $infoImagen[1] <= 20000) {
                                                                                          /* INFORMACION DE LAS 5 IMAGENES */


                                                // datos de la imagen 1 necesarios para el registro
                                                
                                                $destino1 = "../public/Lugares/".$vId."/"."Galeria/".$Imagen1;
                                                $dest1 = "public/Lugares/".$vId. "/". "Galeria/".$Imagen1;
                                                $ruta1 = $_FILES['txtImgup1']['tmp_name'];


                                                // datos de la imagen 2 necesarios para el registro
                                                
                                                $destino2 = "../public/Lugares/".$vId."/"."Galeria/".$Imagen2;
                                                $dest2 = "public/Lugares/".$vId. "/"."Galeria/".$Imagen2;
                                                $ruta2 = $_FILES['txtImgup2']['tmp_name'];


                                                 // datos de la imagen 3 necesarios para el registro
                                                 
                                                 $destino3 = "../public/Lugares/".$vId."/"."Galeria/".$Imagen3;
                                                 $dest3 = "public/Lugares/".$vId. "/"."Galeria/".$Imagen3;
                                                 $ruta3 = $_FILES['txtImgup3']['tmp_name'];


                                                 // datos de la imagen 4 necesarios para el registro
                                                 
                                                 $destino4 = "../public/Lugares/".$vId."/"."Galeria/".$Imagen4;
                                                 $dest4 = "public/Lugares/".$vId. "/"."Galeria/".$Imagen4;
                                                 $ruta4 = $_FILES['txtImgup4']['tmp_name'];


                                                 


                                                if( copy($ruta1,$destino1) and  copy($ruta2,$destino2)  and  copy($ruta3,$destino3) and  copy($ruta4,$destino4) ){                                                

                                                $data = array("Portada"=>$dest, "Foto1"=>$dest1, "Foto2"=>$dest2, "Foto3"=>$dest3, "Foto4"=>$dest4 );

                                                $where = " Id = " . $vId;
                                                if($objUser->updateData($data, $where)){
                                                  $jsondata['success'] = true;
                                                  $jsondata['message'] = "Todos Los datos fueron Actualizados Exepto la ultima imagen";
                                                  $jsondata['redirect'] = 1;
                                                }else {
                                                  $jsondata['success'] = false;
                                                  $jsondata['message'] = "No fue posible Actualizar sus Datos";
                                                }




                                                }else{
                                                $jsondata['success'] = false;
                                                $jsondata['message'] = "No Fue posible subir su Imagen";
                                                }




                                                
                                
                                
                                
                                                /* FIN INFORMACION  */
                                        }else{
                                          $jsondata['success'] = false;
                                          $jsondata['message'] = "La imagen no cumple las medidas solicitadas ";
                                        }
                          
                                      }else{
                                        $jsondata['success'] = false;
                                        $jsondata['message'] = "No se pueden subir Imagenes con pesos superiores a 1MB";
                                      }
                          
                          
                          
                                  }else{
                                    $jsondata['success'] = false;
                                    $jsondata['message'] = "Formato de imagen Incorrecto, Debe ser png o jpg";
                                  }

                                  /* FIN  FOTO 4  */
                                  }else{
                                    $jsondata['success'] = false;
                                    $jsondata['message'] = "La imagen no cumple las medidas solicitadas ";
                                  }
                    
                                }else{
                                  $jsondata['success'] = false;
                                  $jsondata['message'] = "No se pueden subir Imagenes con pesos superiores a 1MB";
                                }
                    
                    
                    
                            }else{
                              $jsondata['success'] = false;
                              $jsondata['message'] = "Formato de imagen Incorrecto, Debe ser png o jpg";
                            }



                            /* FIN FOTO 3 */
              

                            }else{
                              $jsondata['success'] = false;
                              $jsondata['message'] = "La imagen no cumple las medidas solicitadas ";
                            }
              
                          }else{
                            $jsondata['success'] = false;
                            $jsondata['message'] = "No se pueden subir Imagenes con pesos superiores a 1MB";
                          }
              
              
              
                      }else{
                        $jsondata['success'] = false;
                        $jsondata['message'] = "Formato de imagen Incorrecto, Debe ser png o jpg";
                      }

      
      
      
                      /* FIN FOTO 2 */
      
                    }else{
                      $jsondata['success'] = false;
                      $jsondata['message'] = "La imagen 1 no cumple las medidas solicitadas ";
                    }
      
                  }else{
                    $jsondata['success'] = false;
                    $jsondata['message'] = "No se pueden subir Imagenes con pesos superiores a 2MB";
                  }
      
      
      
              }else{
                $jsondata['success'] = false;
                $jsondata['message'] = "Formato de imagen 1 Incorrecto, Debe ser png o jpg";
              }











                /* FIN FOTO 1 */


           

        
        /* FIN PORTADA */







      } elseif(($Imagen1 !="")   AND ($Imagen2 !="")  AND ($Imagen3 !="")){

          
        // si file viene lleno            
        $data = array("Titulo"=>$_REQUEST['txtNameup'], "Ubicacion"=>$_REQUEST['txtUbiup'],  
        "Status"=>$_REQUEST['txtStatusup'], "Tipo"=>$_REQUEST['txtTipoGup'], "Descripcion"=>$_REQUEST['txtDescripup'],  "Updated_by"=>$vname,  "Updated_date"=>date('Y-m-d H:i:s')
        );
        $where = " Id = " . $_REQUEST['txtIdup'];
        $objUser->updateData($data, $where);
        
        $vType = substr($_FILES['txtImgup']['name'], strlen($_FILES['txtImgup']['name'])-3, strlen($_FILES['txtImgup']['name']));

        $FormatoImagen1 = substr($_FILES['txtImgup1']['name'], strlen($_FILES['txtImgup1']['name'])-3, strlen($_FILES['txtImgup1']['name']));
        $FormatoImagen2 = substr($_FILES['txtImgup2']['name'], strlen($_FILES['txtImgup2']['name'])-3, strlen($_FILES['txtImgup2']['name']));
        $FormatoImagen3 = substr($_FILES['txtImgup3']['name'], strlen($_FILES['txtImgup3']['name'])-3, strlen($_FILES['txtImgup3']['name']));
        $FormatoImagen4 = substr($_FILES['txtImgup4']['name'], strlen($_FILES['txtImgup4']['name'])-3, strlen($_FILES['txtImgup4']['name']));
        $FormatoImagen5 = substr($_FILES['txtImgup5']['name'], strlen($_FILES['txtImgup5']['name'])-3, strlen($_FILES['txtImgup5']['name']));


        /* PORTADA  */
        


                /* FOTO 1 */

                if(($FormatoImagen1 == "png") or ($FormatoImagen1 == "jpg") or ($FormatoImagen1 == "JPG") or ($FormatoImagen1 == "PNG") ){
                  //validamos el peso de la imagen
                  if($_FILES['txtImgup1']['size'] <= 7000000){
                    //validamos las dimensiones de la imagen
                    $infoImagen = getimagesize($_FILES['txtImgup1']['tmp_name']);
                    if ($infoImagen[0] <= 20000 || $infoImagen[1] <= 20000) {
      
                        /* FOTO 2 */
                        if(($FormatoImagen2 == "png") or ($FormatoImagen2 == "jpg") or ($FormatoImagen2 == "JPG") or ($FormatoImagen2 == "PNG") ){
                          //validamos el peso de la imagen
                          if($_FILES['txtImgup2']['size'] <= 7000000){
                            //validamos las dimensiones de la imagen
                            $infoImagen = getimagesize($_FILES['txtImgup2']['tmp_name']);
                            if ($infoImagen[0] <= 20000 || $infoImagen[1] <= 20000) {
              
                              /* FOTO 3*/
                              if(($FormatoImagen3 == "png") or ($FormatoImagen3 == "jpg") or ($FormatoImagen3 == "JPG") or ($FormatoImagen3 == "PNG") ){
                                //validamos el peso de la imagen
                                if($_FILES['txtImgup3']['size'] <= 7000000){
                                  //validamos las dimensiones de la imagen
                                  $infoImagen = getimagesize($_FILES['txtImgup3']['tmp_name']);
                                  if ($infoImagen[0] <= 20000 || $infoImagen[1] <= 20000) {
                                    /* INFORMACION DE LAS 5 IMAGENES */



                                                // datos de la imagen 1 necesarios para el registro
                                                
                                                $destino1 = "../public/Lugares/".$vId."/"."Galeria/".$Imagen1;
                                                $dest1 = "public/Lugares/".$vId. "/". "Galeria/".$Imagen1;
                                                $ruta1 = $_FILES['txtImgup1']['tmp_name'];


                                                // datos de la imagen 2 necesarios para el registro
                                                
                                                $destino2 = "../public/Lugares/".$vId."/"."Galeria/".$Imagen2;
                                                $dest2 = "public/Lugares/".$vId. "/"."Galeria/".$Imagen2;
                                                $ruta2 = $_FILES['txtImgup2']['tmp_name'];


                                                 // datos de la imagen 3 necesarios para el registro
                                                 
                                                 $destino3 = "../public/Lugares/".$vId."/"."Galeria/".$Imagen3;
                                                 $dest3 = "public/Lugares/".$vId. "/"."Galeria/".$Imagen3;
                                                 $ruta3 = $_FILES['txtImgup3']['tmp_name'];




                                                 


                                                if(copy($ruta1,$destino1) and  copy($ruta2,$destino2)  and  copy($ruta3,$destino3)){                                                

                                                $data = array("Portada"=>$dest, "Foto1"=>$dest1, "Foto2"=>$dest2, "Foto3"=>$dest3);

                                                $where = " Id = " . $vId;
                                                if($objUser->updateData($data, $where)){
                                                  $jsondata['success'] = true;
                                                  $jsondata['message'] = "Se Actualizo la informacion, la portada y las 3 primeras imagenes ";
                                                  $jsondata['redirect'] = 1;
                                                }else {
                                                  $jsondata['success'] = false;
                                                  $jsondata['message'] = "No fue posible Actualizar sus Datos";
                                                }




                                                }else{
                                                $jsondata['success'] = false;
                                                $jsondata['message'] = "No Fue posible subir su Imagen";
                                                }




                                                
                                
                                
                                
                                                /* FIN INFORMACION  */
                                  }else{
                                    $jsondata['success'] = false;
                                    $jsondata['message'] = "La imagen no cumple las medidas solicitadas ";
                                  }
                    
                                }else{
                                  $jsondata['success'] = false;
                                  $jsondata['message'] = "No se pueden subir Imagenes con pesos superiores a 1MB";
                                }
                    
                    
                    
                            }else{
                              $jsondata['success'] = false;
                              $jsondata['message'] = "Formato de imagen Incorrecto, Debe ser png o jpg";
                            }



                            /* FIN FOTO 3 */
              

                            }else{
                              $jsondata['success'] = false;
                              $jsondata['message'] = "La imagen no cumple las medidas solicitadas ";
                            }
              
                          }else{
                            $jsondata['success'] = false;
                            $jsondata['message'] = "No se pueden subir Imagenes con pesos superiores a 1MB";
                          }
              
              
              
                      }else{
                        $jsondata['success'] = false;
                        $jsondata['message'] = "Formato de imagen Incorrecto, Debe ser png o jpg";
                      }

      
      
      
                      /* FIN FOTO 2 */
      
                    }else{
                      $jsondata['success'] = false;
                      $jsondata['message'] = "La imagen 1 no cumple las medidas solicitadas ";
                    }
      
                  }else{
                    $jsondata['success'] = false;
                    $jsondata['message'] = "No se pueden subir Imagenes con pesos superiores a 2MB";
                  }
      
      
      
              }else{
                $jsondata['success'] = false;
                $jsondata['message'] = "Formato de imagen 1 Incorrecto, Debe ser png o jpg";
              }











                /* FIN FOTO 1 */

         
        
        /* FIN PORTADA */







      }elseif(($Imagen1 !="")   AND ($Imagen2 !="")){

                // si file viene lleno            
                $data = array("Titulo"=>$_REQUEST['txtNameup'], "Ubicacion"=>$_REQUEST['txtUbiup'],  
                "Status"=>$_REQUEST['txtStatusup'], "Tipo"=>$_REQUEST['txtTipoGup'], "Descripcion"=>$_REQUEST['txtDescripup'],  "Updated_by"=>$vname,  "Updated_date"=>date('Y-m-d H:i:s')
                );
                $where = " Id = " . $_REQUEST['txtIdup'];
                $objUser->updateData($data, $where);
                
                $vType = substr($_FILES['txtImgup']['name'], strlen($_FILES['txtImgup']['name'])-3, strlen($_FILES['txtImgup']['name']));
        
                $FormatoImagen1 = substr($_FILES['txtImgup1']['name'], strlen($_FILES['txtImgup1']['name'])-3, strlen($_FILES['txtImgup1']['name']));
                $FormatoImagen2 = substr($_FILES['txtImgup2']['name'], strlen($_FILES['txtImgup2']['name'])-3, strlen($_FILES['txtImgup2']['name']));
                $FormatoImagen3 = substr($_FILES['txtImgup3']['name'], strlen($_FILES['txtImgup3']['name'])-3, strlen($_FILES['txtImgup3']['name']));
                $FormatoImagen4 = substr($_FILES['txtImgup4']['name'], strlen($_FILES['txtImgup4']['name'])-3, strlen($_FILES['txtImgup4']['name']));
                $FormatoImagen5 = substr($_FILES['txtImgup5']['name'], strlen($_FILES['txtImgup5']['name'])-3, strlen($_FILES['txtImgup5']['name']));
        
        
                /* PORTADA  */
              
        
                        /* FOTO 1 */
        
                        if(($FormatoImagen1 == "png") or ($FormatoImagen1 == "jpg") or ($FormatoImagen1 == "JPG") or ($FormatoImagen1 == "PNG") ){
                          //validamos el peso de la imagen
                          if($_FILES['txtImgup1']['size'] <= 7000000){
                            //validamos las dimensiones de la imagen
                            $infoImagen = getimagesize($_FILES['txtImgup1']['tmp_name']);
                            if ($infoImagen[0] <= 20000 || $infoImagen[1] <= 20000) {
              
                                /* FOTO 2 */
                                if(($FormatoImagen2 == "png") or ($FormatoImagen2 == "jpg") or ($FormatoImagen2 == "JPG") or ($FormatoImagen2 == "PNG") ){
                                  //validamos el peso de la imagen
                                  if($_FILES['txtImgup2']['size'] <= 7000000){
                                    //validamos las dimensiones de la imagen
                                    $infoImagen = getimagesize($_FILES['txtImgup2']['tmp_name']);
                                    if ($infoImagen[0] <= 20000 || $infoImagen[1] <= 20000) {
                      
                                                                                 /* INFORMACION DE LAS 5 IMAGENES */
        
        
        
                                                        // datos de la imagen 1 necesarios para el registro
                                                        
                                                        $destino1 = "../public/Lugares/".$vId."/"."Galeria/".$Imagen1;
                                                        $dest1 = "public/Lugares/".$vId. "/". "Galeria/".$Imagen1;
                                                        $ruta1 = $_FILES['txtImgup1']['tmp_name'];
        
        
                                                        // datos de la imagen 2 necesarios para el registro
                                                        
                                                        $destino2 = "../public/Lugares/".$vId."/"."Galeria/".$Imagen2;
                                                        $dest2 = "public/Lugares/".$vId. "/"."Galeria/".$Imagen2;
                                                        $ruta2 = $_FILES['txtImgup2']['tmp_name'];
        

                                                        if( copy($ruta1,$destino1) and  copy($ruta2,$destino2)){                                                
        
                                                        $data = array("Portada"=>$dest, "Foto1"=>$dest1, "Foto2"=>$dest2);
        
                                                        $where = " Id = " . $vId;
                                                        if($objUser->updateData($data, $where)){
                                                          $jsondata['success'] = true;
                                                          $jsondata['message'] = "Se Actualizo la informacion, la portada y las 2 primeras imagenes ";
                                                          $jsondata['redirect'] = 1;
                                                        }else {
                                                          $jsondata['success'] = false;
                                                          $jsondata['message'] = "No fue posible Actualizar sus Datos";
                                                        }
        
        
        
        
                                                        }else{
                                                        $jsondata['success'] = false;
                                                        $jsondata['message'] = "No Fue posible subir su Imagen";
                                                        }
        
        
        
        
                                                        
                                        
                                        
                                        
                                                        /* FIN INFORMACION  */
                      
        
                                    }else{
                                      $jsondata['success'] = false;
                                      $jsondata['message'] = "La imagen no cumple las medidas solicitadas ";
                                    }
                      
                                  }else{
                                    $jsondata['success'] = false;
                                    $jsondata['message'] = "No se pueden subir Imagenes con pesos superiores a 1MB";
                                  }
                      
                      
                      
                              }else{
                                $jsondata['success'] = false;
                                $jsondata['message'] = "Formato de imagen Incorrecto, Debe ser png o jpg";
                              }
        
              
              
              
                              /* FIN FOTO 2 */
              
                            }else{
                              $jsondata['success'] = false;
                              $jsondata['message'] = "La imagen 1 no cumple las medidas solicitadas ";
                            }
              
                          }else{
                            $jsondata['success'] = false;
                            $jsondata['message'] = "No se pueden subir Imagenes con pesos superiores a 2MB";
                          }
              
              
              
                      }else{
                        $jsondata['success'] = false;
                        $jsondata['message'] = "Formato de imagen 1 Incorrecto, Debe ser png o jpg";
                      }
        
        
        
        
        
        
        
        
        
        
        
                        /* FIN FOTO 1 */

                /* FIN PORTADA */




      }elseif( ($Imagen1 !="")){

        // si file viene lleno            
        $data = array("Titulo"=>$_REQUEST['txtNameup'], "Ubicacion"=>$_REQUEST['txtUbiup'],  
        "Status"=>$_REQUEST['txtStatusup'], "Tipo"=>$_REQUEST['txtTipoGup'], "Descripcion"=>$_REQUEST['txtDescripup'],  "Updated_by"=>$vname,  "Updated_date"=>date('Y-m-d H:i:s')
        );
        $where = " Id = " . $_REQUEST['txtIdup'];
        $objUser->updateData($data, $where);
        
        $vType = substr($_FILES['txtImgup']['name'], strlen($_FILES['txtImgup']['name'])-3, strlen($_FILES['txtImgup']['name']));

        $FormatoImagen1 = substr($_FILES['txtImgup1']['name'], strlen($_FILES['txtImgup1']['name'])-3, strlen($_FILES['txtImgup1']['name']));
        $FormatoImagen2 = substr($_FILES['txtImgup2']['name'], strlen($_FILES['txtImgup2']['name'])-3, strlen($_FILES['txtImgup2']['name']));
        $FormatoImagen3 = substr($_FILES['txtImgup3']['name'], strlen($_FILES['txtImgup3']['name'])-3, strlen($_FILES['txtImgup3']['name']));
        $FormatoImagen4 = substr($_FILES['txtImgup4']['name'], strlen($_FILES['txtImgup4']['name'])-3, strlen($_FILES['txtImgup4']['name']));
        $FormatoImagen5 = substr($_FILES['txtImgup5']['name'], strlen($_FILES['txtImgup5']['name'])-3, strlen($_FILES['txtImgup5']['name']));


        /* PORTADA  */


                /* FOTO 1 */

                if(($FormatoImagen1 == "png") or ($FormatoImagen1 == "jpg") or ($FormatoImagen1 == "JPG") or ($FormatoImagen1 == "PNG") ){
                  //validamos el peso de la imagen
                  if($_FILES['txtImgup1']['size'] <= 7000000){
                    //validamos las dimensiones de la imagen
                    $infoImagen = getimagesize($_FILES['txtImgup1']['tmp_name']);
                    if ($infoImagen[0] <= 20000 || $infoImagen[1] <= 20000) {
      
                      /* INFORMACION DE LAS 5 IMAGENES */


                    

                      // datos de la imagen 1 necesarios para el registro
                      
                      $destino1 = "../public/Lugares/".$vId."/"."Galeria/".$Imagen1;
                      $dest1 = "public/Lugares/".$vId. "/". "Galeria/".$Imagen1;
                      $ruta1 = $_FILES['txtImgup1']['tmp_name'];



                      if(copy($ruta1,$destino1) ){                                                

                      $data = array("Portada"=>$dest, "Foto1"=>$dest1);

                      $where = " Id = " . $vId;
                      if($objUser->updateData($data, $where)){
                        $jsondata['success'] = true;
                        $jsondata['message'] = "Se Actualizo la informacion, la portada y la 1 primera imagenes ";
                        $jsondata['redirect'] = 1;
                      }else {
                        $jsondata['success'] = false;
                        $jsondata['message'] = "No fue posible Actualizar sus Datos";
                      }




                      }else{
                      $jsondata['success'] = false;
                      $jsondata['message'] = "No Fue posible subir su Imagen";
                      }




                      
      
      
      
                      /* FIN INFORMACION  */
      
                    }else{
                      $jsondata['success'] = false;
                      $jsondata['message'] = "La imagen 1 no cumple las medidas solicitadas ";
                    }
      
                  }else{
                    $jsondata['success'] = false;
                    $jsondata['message'] = "No se pueden subir Imagenes con pesos superiores a 2MB";
                  }
      
      
      
              }else{
                $jsondata['success'] = false;
                $jsondata['message'] = "Formato de imagen 1 Incorrecto, Debe ser png o jpg";
              }











                /* FIN FOTO 1 */

        /* FIN PORTADA */




      }elseif( ($Imagen1 !="")   AND ($Imagen2 =="")  AND ($Imagen3 =="") AND ($Imagen4 =="") AND ($Imagen5 =="")  ){


        //echo "NOMBRE DE LA PORTADA " . $portada;

        // si file viene lleno            
        $data = array("Titulo"=>$_REQUEST['txtNameup'], "Ubicacion"=>$_REQUEST['txtUbiup'],  
        "Status"=>$_REQUEST['txtStatusup'], "Tipo"=>$_REQUEST['txtTipoGup'], "Descripcion"=>$_REQUEST['txtDescripup'],  "Updated_by"=>$vname,  "Updated_date"=>date('Y-m-d H:i:s')
        );
        $where = " Id = " . $_REQUEST['txtIdup'];
        $objUser->updateData($data, $where);
        
        $FormatoImagen1 = substr($_FILES['txtImgup1']['name'], strlen($_FILES['txtImgup1']['name'])-3, strlen($_FILES['txtImgup1']['name']));


        /* FOTO 1 */

        if(($FormatoImagen1 == "png") or ($FormatoImagen1 == "jpg") or ($FormatoImagen1 == "JPG") or ($FormatoImagen1 == "PNG") ){
          //validamos el peso de la imagen
          if($_FILES['txtImgup1']['size'] <= 7000000){
            //validamos las dimensiones de la imagen
            $infoImagen = getimagesize($_FILES['txtImgup1']['tmp_name']);
            if ($infoImagen[0] <= 20000 || $infoImagen[1] <= 20000) {

              /* INFORMACION DE LAS 5 IMAGENES */


              

              // datos de la imagen 1 necesarios para el registro
              
              $destino1 = "../public/Lugares/".$vId."/"."Galeria/".$Imagen1;
              $dest1 = "public/Lugares/".$vId. "/". "Galeria/".$Imagen1 . "' ";
              $ruta1 = $_FILES['txtImgup1']['tmp_name'];



              if(copy($ruta1,$destino1) ){                                                

              $data = array("Foto1"=>$dest1);

              $where = " Id = " . $vId;
              if($objUser->updateData($data, $where)){
                $jsondata['success'] = true;
                $jsondata['message'] = "Se Actualizo la informacion, y la 1 primera foto ";
                $jsondata['redirect'] = 1;
              }else {
                $jsondata['success'] = false;
                $jsondata['message'] = "No fue posible Actualizar sus Datos";
              }




              }else{
              $jsondata['success'] = false;
              $jsondata['message'] = "No Fue posible subir su Imagen";
              }




              



              /* FIN INFORMACION  */

            }else{
              $jsondata['success'] = false;
              $jsondata['message'] = "La imagen 1 no cumple las medidas solicitadas ";
            }

          }else{
            $jsondata['success'] = false;
            $jsondata['message'] = "No se pueden subir Imagenes con pesos superiores a 2MB";
          }



      }else{
        $jsondata['success'] = false;
        $jsondata['message'] = "Formato de imagen 1 Incorrecto, Debe ser png o jpg";
      }











        /* FIN FOTO 1 */



      






      }elseif(($Imagen1 =="")   AND ($Imagen2 !="")  AND ($Imagen3 =="") AND ($Imagen4 =="") AND ($Imagen5 =="")  ){


        //echo "NOMBRE DE LA PORTADA " . $portada;

        // si file viene lleno            
        $data = array("Titulo"=>$_REQUEST['txtNameup'], "Ubicacion"=>$_REQUEST['txtUbiup'],  
        "Status"=>$_REQUEST['txtStatusup'], "Tipo"=>$_REQUEST['txtTipoGup'], "Descripcion"=>$_REQUEST['txtDescripup'],  "Updated_by"=>$vname,  "Updated_date"=>date('Y-m-d H:i:s')
        );
        $where = " Id = " . $_REQUEST['txtIdup'];
        $objUser->updateData($data, $where);
        
        $FormatoImagen2 = substr($_FILES['txtImgup2']['name'], strlen($_FILES['txtImgup2']['name'])-3, strlen($_FILES['txtImgup2']['name']));


        /* FOTO 1 */

        if(($FormatoImagen2 == "png") or ($FormatoImagen2 == "jpg") or ($FormatoImagen2 == "JPG") or ($FormatoImagen2 == "PNG") ){
          //validamos el peso de la imagen
          if($_FILES['txtImgup2']['size'] <= 7000000){
            //validamos las dimensiones de la imagen
            $infoImagen = getimagesize($_FILES['txtImgup2']['tmp_name']);
            if ($infoImagen[0] <= 20000 || $infoImagen[1] <= 20000) {

              /* INFORMACION DE LAS 5 IMAGENES */


              // datos de la imagen 1 necesarios para el registro
              
              $destino1 = "../public/Lugares/".$vId."/"."Galeria/".$Imagen2;
              $dest1 = "public/Lugares/".$vId. "/". "Galeria/".$Imagen2 . "' ";
              $ruta1 = $_FILES['txtImgup2']['tmp_name'];



              if(copy($ruta1,$destino1) ){                                                

              $data = array("Foto2"=>$dest1);

              $where = " Id = " . $vId;
              if($objUser->updateData($data, $where)){
                $jsondata['success'] = true;
                $jsondata['message'] = "Se Actualizo la informacion, y la 2 foto ";
                $jsondata['redirect'] = 1;
              }else {
                $jsondata['success'] = false;
                $jsondata['message'] = "No fue posible Actualizar sus Datos";
              }




              }else{
              $jsondata['success'] = false;
              $jsondata['message'] = "No Fue posible subir su Imagen";
              }


              /* FIN INFORMACION  */

            }else{
              $jsondata['success'] = false;
              $jsondata['message'] = "La imagen 1 no cumple las medidas solicitadas ";
            }

          }else{
            $jsondata['success'] = false;
            $jsondata['message'] = "No se pueden subir Imagenes con pesos superiores a 2MB";
          }



      }else{
        $jsondata['success'] = false;
        $jsondata['message'] = "Formato de imagen 1 Incorrecto, Debe ser png o jpg";
      }

        /* FIN FOTO 1 */

      }elseif(($Imagen1 =="")   AND ($Imagen2 =="")  AND ($Imagen3 !="") AND ($Imagen4 =="") AND ($Imagen5 =="")  ){


        //echo "NOMBRE DE LA PORTADA " . $portada;

        // si file viene lleno            
        $data = array("Titulo"=>$_REQUEST['txtNameup'], "Ubicacion"=>$_REQUEST['txtUbiup'],  
        "Status"=>$_REQUEST['txtStatusup'], "Tipo"=>$_REQUEST['txtTipoGup'], "Descripcion"=>$_REQUEST['txtDescripup'],  "Updated_by"=>$vname,  "Updated_date"=>date('Y-m-d H:i:s')
        );
        $where = " Id = " . $_REQUEST['txtIdup'];
        $objUser->updateData($data, $where);
        
        $FormatoImagen3 = substr($_FILES['txtImgup3']['name'], strlen($_FILES['txtImgup3']['name'])-3, strlen($_FILES['txtImgup3']['name']));


        /* FOTO 1 */

        if(($FormatoImagen3 == "png") or ($FormatoImagen3 == "jpg") or ($FormatoImagen3 == "JPG") or ($FormatoImagen3 == "PNG") ){
          //validamos el peso de la imagen
          if($_FILES['txtImgup3']['size'] <= 7000000){
            //validamos las dimensiones de la imagen
            $infoImagen = getimagesize($_FILES['txtImgup3']['tmp_name']);
            if ($infoImagen[0] <= 20000 || $infoImagen[1] <= 20000) {

              /* INFORMACION DE LAS 5 IMAGENES */


              // datos de la imagen 1 necesarios para el registro
              
              $destino3 = "../public/Lugares/".$vId."/"."Galeria/".$Imagen3;
              $dest3 = "public/Lugares/".$vId. "/"."Galeria/".$Imagen3 . "' ";
              $ruta3 = $_FILES['txtImgup3']['tmp_name'];



              if(copy($ruta3,$destino3) ){                                                

              $data = array("Foto3"=>$dest3);

              $where = " Id = " . $vId;
              if($objUser->updateData($data, $where)){
                $jsondata['success'] = true;
                $jsondata['message'] = "Se Actualizo la informacion, y la 3 foto ";
                $jsondata['redirect'] = 1;
              }else {
                $jsondata['success'] = false;
                $jsondata['message'] = "No fue posible Actualizar sus Datos";
              }




              }else{
              $jsondata['success'] = false;
              $jsondata['message'] = "No Fue posible subir su Imagen";
              }


              /* FIN INFORMACION  */

            }else{
              $jsondata['success'] = false;
              $jsondata['message'] = "La imagen 1 no cumple las medidas solicitadas ";
            }

          }else{
            $jsondata['success'] = false;
            $jsondata['message'] = "No se pueden subir Imagenes con pesos superiores a 2MB";
          }



        }else{
          $jsondata['success'] = false;
          $jsondata['message'] = "Formato de imagen 1 Incorrecto, Debe ser png o jpg";
        }


        /* FIN FOTO 1 */

      }elseif( ($Imagen1 =="")   AND ($Imagen2 =="")  AND ($Imagen3 =="") AND ($Imagen4 !="") AND ($Imagen5 =="")  ){


        //echo "NOMBRE DE LA PORTADA " . $portada;

        // si file viene lleno            
        $data = array("Titulo"=>$_REQUEST['txtNameup'], "Ubicacion"=>$_REQUEST['txtUbiup'],  
        "Status"=>$_REQUEST['txtStatusup'], "Tipo"=>$_REQUEST['txtTipoGup'], "Descripcion"=>$_REQUEST['txtDescripup'],  "Updated_by"=>$vname,  "Updated_date"=>date('Y-m-d H:i:s')
        );
        $where = " Id = " . $_REQUEST['txtIdup'];
        $objUser->updateData($data, $where);
        
        $FormatoImagen4 = substr($_FILES['txtImgup4']['name'], strlen($_FILES['txtImgup4']['name'])-3, strlen($_FILES['txtImgup4']['name']));


        /* FOTO 1 */

        if(($FormatoImagen4 == "png") or ($FormatoImagen4 == "jpg") or ($FormatoImagen4 == "JPG") or ($FormatoImagen4 == "PNG") ){
          //validamos el peso de la imagen
          if($_FILES['txtImgup4']['size'] <= 7000000){
            //validamos las dimensiones de la imagen
            $infoImagen = getimagesize($_FILES['txtImgup4']['tmp_name']);
            if ($infoImagen[0] <= 20000 || $infoImagen[1] <= 20000) {

              /* INFORMACION DE LAS 5 IMAGENES */


              // datos de la imagen 1 necesarios para el registro
              
              $destino4 = "../public/Lugares/".$vId."/"."Galeria/".$Imagen4;
              $dest4 = "public/Lugares/".$vId. "/"."Galeria/".$Imagen4 . "' ";
              $ruta4 = $_FILES['txtImgup4']['tmp_name'];



              if(copy($ruta4,$destino4) ){                                                

              $data = array("Foto4"=>$dest4);

              $where = " Id = " . $vId;
              if($objUser->updateData($data, $where)){
                $jsondata['success'] = true;
                $jsondata['message'] = "Se Actualizo la informacion, y la 4 foto ";
                $jsondata['redirect'] = 1;
              }else {
                $jsondata['success'] = false;
                $jsondata['message'] = "No fue posible Actualizar sus Datos";
              }




              }else{
              $jsondata['success'] = false;
              $jsondata['message'] = "No Fue posible subir su Imagen";
              }


              /* FIN INFORMACION  */

            }else{
              $jsondata['success'] = false;
              $jsondata['message'] = "La imagen 1 no cumple las medidas solicitadas ";
            }

          }else{
            $jsondata['success'] = false;
            $jsondata['message'] = "No se pueden subir Imagenes con pesos superiores a 2MB";
          }



        }else{
          $jsondata['success'] = false;
          $jsondata['message'] = "Formato de imagen 1 Incorrecto, Debe ser png o jpg";
        }


        /* FIN FOTO 1 */

      }elseif(($Imagen1 =="")   AND ($Imagen2 =="")  AND ($Imagen3 =="") AND ($Imagen4 =="") AND ($Imagen5 !="")  ){


        //echo "NOMBRE DE LA PORTADA " . $portada;

        // si file viene lleno            
        $data = array("Titulo"=>$_REQUEST['txtNameup'], "Ubicacion"=>$_REQUEST['txtUbiup'],  
        "Status"=>$_REQUEST['txtStatusup'], "Tipo"=>$_REQUEST['txtTipoGup'], "Descripcion"=>$_REQUEST['txtDescripup'],  "Updated_by"=>$vname,  "Updated_date"=>date('Y-m-d H:i:s')
        );
        $where = " Id = " . $_REQUEST['txtIdup'];
        $objUser->updateData($data, $where);
        
        $FormatoImagen5 = substr($_FILES['txtImgup5']['name'], strlen($_FILES['txtImgup5']['name'])-3, strlen($_FILES['txtImgup5']['name']));


        /* FOTO 1 */

        if(($FormatoImagen5 == "png") or ($FormatoImagen5 == "jpg") or ($FormatoImagen5 == "JPG") or ($FormatoImagen5 == "PNG") ){
          //validamos el peso de la imagen
          if($_FILES['txtImgup5']['size'] <= 7000000){
            //validamos las dimensiones de la imagen
            $infoImagen = getimagesize($_FILES['txtImgup5']['tmp_name']);
            if ($infoImagen[0] <= 20000 || $infoImagen[1] <= 20000) {

              /* INFORMACION DE LAS 5 IMAGENES */


              // datos de la imagen 1 necesarios para el registro
              
              $destino5 = "../public/Lugares/".$vId."/"."Galeria/".$Imagen5;
              $dest5 = "public/Lugares/".$vId. "/"."Galeria/".$Imagen5 . "' ";
              $ruta5 = $_FILES['txtImgup5']['tmp_name'];



              if(copy($ruta5,$destino5) ){                                                

              $data = array("Foto5"=>$dest5);

              $where = " Id = " . $vId;
              if($objUser->updateData($data, $where)){
                $jsondata['success'] = true;
                $jsondata['message'] = "Se Actualizo la informacion, y la 5 foto ";
                $jsondata['redirect'] = 1;
              }else {
                $jsondata['success'] = false;
                $jsondata['message'] = "No fue posible Actualizar sus Datos";
              }




              }else{
              $jsondata['success'] = false;
              $jsondata['message'] = "No Fue posible subir su Imagen";
              }


              /* FIN INFORMACION  */

            }else{
              $jsondata['success'] = false;
              $jsondata['message'] = "La imagen 1 no cumple las medidas solicitadas ";
            }

          }else{
            $jsondata['success'] = false;
            $jsondata['message'] = "No se pueden subir Imagenes con pesos superiores a 2MB";
          }



        }else{
          $jsondata['success'] = false;
          $jsondata['message'] = "Formato de imagen 1 Incorrecto, Debe ser png o jpg";
        }


        /* FIN FOTO 1 */

      }


      
      
      
      
      
      
      
      
      
      
      
      
      
      
      else{
      	/*si tipo file esta vacio*/
      	$data = array("Titulo"=>$_REQUEST['txtNameup'], "Ubicacion"=>$_REQUEST['txtUbiup'],  
                "Status"=>$_REQUEST['txtStatusup'], "Tipo"=>$_REQUEST['txtTipoup'], "Descripcion"=> $_REQUEST["txtDescripup"],  "Updated_by"=>$vname,  "Updated_date"=>date('Y-m-d H:i:s')
              );
      	$where = "Id = " . $_REQUEST['txtIdup'];
      	if($objUser->updateData($data, $where))
      	 {
      	   $jsondata['success'] = true;
      	   $jsondata['message'] = "Actualizado correctamente";
      	 }else {
      	  $jsondata['success'] = false;
      	  $jsondata['message'] = "No fue posible Actualizar sus Datos";
      	}

      }


      header('Content-type: application/json; charset=utf-8');
      echo json_encode($jsondata);
    break;
      /* Crea Update de usuarios */
    case "upd2":
      $jsondata = array();
      $vimg = $_FILES['txtImg']['name'];

      if ($vimg != "") {
      	// si file viene lleno
      	$data = array("Nombre"=>$_REQUEST['txtName1'],"Cedula"=>$_REQUEST['txtCed1'], "Direccion"=>$_REQUEST['txtDir1'],
      	        "Telefono"=>$_REQUEST['txtTel1'], "Email"=>$_REQUEST['txtEml1'],
      	        "Usuario"=>$_REQUEST['txtUser2'],  "Status"=>1, "Updated_by"=>$vname,  "Updated_at"=>date('Y-m-d H:i:s')
      	      );
      	$where = " Id = " . $_REQUEST['txtId'];
      	$objUser->updateData($data, $where);
      	$vType = substr($_FILES['txtImg']['name'], strlen($_FILES['txtImg']['name'])-3, strlen($_FILES['txtImg']['name']));
      	if(($vType == "png") or ($vType == "jpg")){
          //validamos el peso de la imagen
          if($_FILES['txtImg']['size'] <= 1000000){
            //validamos las dimensiones de la imagen
            $infoImagen = getimagesize($_FILES['txtImg']['tmp_name']);
            if ($infoImagen[0] <= 225 || $infoImagen[1] <= 225) {

                $carpeta = "../public/usuarios/".$_REQUEST['txtId'];
                $destino2 = "../public/usuarios/".$_REQUEST['txtId']."/".$vimg;
                $dest = "public/usuarios/".$_REQUEST['txtId']."/".$vimg."'-";
                $ruta2 = $_FILES['txtImg']['tmp_name'];
                if(copy($ruta2,$destino2)){
                  $data = array("Foto"=>$dest);
                  $where = " Id = " . $_REQUEST['txtId'];
                  if($objUser->updateData($data, $where)){
                    $jsondata['success'] = false;
                    $jsondata['message'] = "Actualizado Correctamente";
                    header('Location: ../msj/?v='.$jsondata['message']);
                  }else {
                    $jsondata['success'] = false;
                    $jsondata['message'] = "No fue posible Actualizar sus Datos";
                    header('Location: ../msj/?v='.$jsondata['message']);
                  }

                }else{
                  $jsondata['success'] = false;
                  $jsondata['message'] = "No Fue posible subir su Imagen";
                  header('Location: ../msj/?v='.$jsondata['message']);
                }
            }else{
              $jsondata['success'] = false;
              $jsondata['message'] = "La imagen no cumple las medidas solicitadas ";
              header('Location: ../msj/?v='.$jsondata['message']);
            }

          }else{
            $jsondata['success'] = false;
            $jsondata['message'] = "No se pueden subir Imagenes con pesos superiores a 1MB";
            header('Location: ../msj/?v='.$jsondata['message']);
          }


      	}else{
      	  $jsondata['success'] = false;
      	  $jsondata['message'] = "Formato de imagen Incorrecto, Debe ser png o jpg";
          header('Location: ../msj/?v='.$jsondata['message']);
      	}

      }else{
      	/*si tipo file esta vacio*/

      	$data = array("Nombre"=>$_REQUEST['txtName1'],"Cedula"=>$_REQUEST['txtCed1'], "Direccion"=>$_REQUEST['txtDir1'],
      	        "Telefono"=>$_REQUEST['txtTel1'], "Email"=>$_REQUEST['txtEml1'],
      	        "Usuario"=>$_REQUEST['txtUser2'], "Status"=>1, "Updated_by"=>$vname,  "Updated_at"=>date('Y-m-d H:i:s')
      	      );
      	$where = "Id = " . $_REQUEST['txtId'];
      	if($objUser->updateData($data, $where))
      	 {
      	 	header('Location: ../msj/');
      	 }else {
      	  $jsondata['success'] = false;
      	  $jsondata['message'] = "No fue posible Actualizar sus Datos";
      	}

      }


      header('Content-type: application/json; charset=utf-8');
      echo json_encode($jsondata);
    break;
    /* Crea delete de usuarios */
    case "del":
      $Id =  $_REQUEST['pId'];
      $jsondata = array();
      if($objUser->delData($Id))
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
    /* Cambia el password del usuario */
    case "chg":
      // Determina el pasword
    	$jsondata = array();
		$pass = md5($_REQUEST['pPass']);
		$data = array("Password"=>"".$pass."''");
		$where = " Id = " . $_REQUEST['pId'];
      if($objUser->updateData($data, $where))
      {
          $jsondata['success'] = true;
          $jsondata['message'] = "Contraseña modificada correctamente";
      }
      else
      {
           $jsondata['success'] = false;
           $jsondata['message'] = "Falla al modificar el registro";
      }
      header('Content-type: application/json; charset=utf-8');
      echo json_encode($jsondata);
    break;

    case "imp":
    include_once("../Classes/PHPExcel/IOFactory.php");
    set_time_limit(300);
    // header('Content-type: application/json; charset=utf-8');
    // echo json_encode($jsondata);
    // $nombreArchivo = $_FILES['uploadExcel']['name'];
    $nombreArchivo = '../usuarios.xlsx';
    $objPHPExcel = PHPExcel_IOFactory::load($nombreArchivo);
    $objPHPExcel->setActiveSheetIndex(0);
    $numRows = $objPHPExcel->setActiveSheetIndex(0)->getHighestRow();
    echo 'Numero de registros cargados'. $numRows. ' ';
    echo '
		<html>
		<head> </head>
		<body>
        <table class="table table-striped table-bordered table-hover">
            <thead>
            <tr>
               <th width="5%"><i class="icon_profile"></i>Status</th>
               <th><i class="icon_profile"></i>Nombre completo</th>
                <th><i class="icon_calendar"></i> Cedula</th>
                <th><i class="icon_mail_alt"></i>Direccion</th>
                <th width="10%"><i class="icon_mobile"></i>E-mail</th>
                <th><i class="icon_mobile"></i>Usuario</th>
                <th><i class="icon_mobile"></i>Foto</th>
                <th><i class="icon_mobile"></i>Perfil</th>
                <th><i class="icon_cogs"></i> Pass</th>
                <th><i class="icon_cogs"></i> Status</th>
                <th><i class="icon_cogs"></i> Creacion</th>
                <th><i class="icon_cogs"></i> user_updated</th>
                <th><i class="icon_cogs"></i> actualiza</th>
            </tr>
            </thead>
			<tbody>
    ';
    for ($i=2; $i <= $numRows; $i++) {
    	//Recojemos el valor de cada columna
    	$nombre = $objPHPExcel->getActiveSheet()->getCell('A'.$i)->getCalculatedValue();
    	$cedula = $objPHPExcel->getActiveSheet()->getCell('B'.$i)->getCalculatedValue();
    	$direccion = $objPHPExcel->getActiveSheet()->getCell('C'.$i)->getCalculatedValue();
    	$telefono = $objPHPExcel->getActiveSheet()->getCell('D'.$i)->getCalculatedValue();
    	$email = $objPHPExcel->getActiveSheet()->getCell('E'.$i)->getCalculatedValue();
    	$usuario = $objPHPExcel->getActiveSheet()->getCell('F'.$i)->getCalculatedValue();
    	$foto = $objPHPExcel->getActiveSheet()->getCell('G'.$i)->getCalculatedValue();
    	$perfil = $objPHPExcel->getActiveSheet()->getCell('H'.$i)->getCalculatedValue();
    	$pass = $objPHPExcel->getActiveSheet()->getCell('I'.$i)->getCalculatedValue();
    	$status = $objPHPExcel->getActiveSheet()->getCell('J'.$i)->getCalculatedValue();
    	$creacion = $objPHPExcel->getActiveSheet()->getCell('K'.$i)->getCalculatedValue();
    	$user_updated = $objPHPExcel->getActiveSheet()->getCell('L'.$i)->getCalculatedValue();
    	$actualiza =  $objPHPExcel->getActiveSheet()->getCell('M'.$i)->getCalculatedValue();
    	echo '<tr>';
    	echo '<td>'.$nombre.'</td>';
    	echo '<td>'.$cedula.'</td>';
    	echo '<td>'.$direccion.'</td>';
    	echo '<td>'.$telefono.'</td>';
    	echo '<td>'.$email.'</td>';
    	echo '<td>'.$usuario.'</td>';
    	echo '<td>'.$foto.'</td>';
    	echo '<td>'.$perfil.'</td>';
    	echo '<td>'.$pass.'</td>';
    	echo '<td>'.$status.'</td>';
    	echo '<td>'.$creacion.'</td>';
    	echo '<td>'.$user_updated.'</td>';
    	echo '<td>'.$actualiza.'</td>';
    	echo '</body> </html>';

    	$data = array("Nombre"=>$nombre,"Cedula"=>$cedula, "Direccion"=>$direccion,
	        "Telefono"=>$telefono, "Email"=>$email,
	        "Usuario"=>$usuario, "Foto"=>$foto, "Perfil"=>$perfil,  "Password"=>$pass, "Status"=>$status, "Created_at"=>$creacion, "Updated_by"=>$user_updated, "Updated_at"=>$actualiza
    	);
    	if($objUser->insertData($data)){
    		$jsondata['success'] = true;
    		$jsondata['message'] = "Registros cargados correctamente";
    	}else{
    		$jsondata['success'] = false;
    		$jsondata['message'] = "Algo no va bien ! Revisa tu conexión";
    	}
    }
    break;
  }
?>