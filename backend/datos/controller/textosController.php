<?php
    /** incluye todos los recursos */
    include_once("../AnsTek_libs/integracion.inc.php");
    include_once("../model/textos.class.php");
    /** Instancia la clase experiencia*/
    $contacto = new texto($db);
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
        $jsondata['Pagina'] = $r["Pagina"];
        $jsondata['Texto'] = $r["Texto"];
        $jsondata['Sub'] = $r["Sub"];
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
    case "upd":
      $jsondata = array();
        $vId = $_REQUEST['txtIdup'];

         // Datos necesarios para el registro
         $data = array("Texto"=>$_REQUEST['txtTextup'], "Sub"=>$_REQUEST['txtSubup'],
         "Status"=>$_REQUEST['txtStatusup'], "Updated_date"=>date('Y-m-d H:i:s'), "Updated_by"=>$user);
         $where1 = " Id = " . $vId;

      if($contacto->updateData($data, $where1))
     {



              $jsondata['success'] = true;
              $jsondata['message'] = ' ACTUALIZADO CORRECTAMENTE ';


      }
      else
      {
        $jsondata['success'] = false;
        $jsondata['message'] = "Falla al realizar el registro";
      }
      header('Content-type: application/json; charset=utf-8');
      echo json_encode($jsondata);
   break;





    }
?>
