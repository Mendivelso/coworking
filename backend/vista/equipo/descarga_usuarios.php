<?php

/** Error reporting */
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
date_default_timezone_set('America/Bogota');
$jsondata = array();
if (PHP_SAPI == 'cli')
    die('This example should only be run from a Web Browser');

/** Include PHPExcel*/
require_once '../../datos/Classes/PHPExcel.php';
include_once("../../../backend/datos/AnsTek_libs/integracion.inc.php");
include_once("../../datos/model/contactos.class.php");



    $accion = $_REQUEST['accion'];

    switch($accion){

        case "desc":


            $dateC = $_REQUEST['Date1'];
             $date1 = substr($dateC, 0, 10);
             $date2 = substr($dateC, 13);


            if ($date1 != "" AND $date2 == "") {
                $where  = " Where Created_date  LIKE  " . "'%".  $date1 . "%'";
            }elseif ($date1 == ""  and $date2 == "") {
                $where  = " Where Id > 0";
            }else{
                // $where = " Where  Created_date >= ". " '" . $date1. " 00:00:00'". "  and  Created_date <= ". " '" . $date2. " 23:59:00'";
                $where = " Where  Created_date BETWEEN "."'" . $date1. " 00:00:00'". " and  "."'" . $date2. " 23:59:00'";
            }


                $user = new contacto($db);
                $result = $user->selectDescarga($where);
                // Create new PHPExcel object
                $objPHPExcel = new PHPExcel();

                        // Set document properties
                        $objPHPExcel->getProperties()->setCreator("Conjunto Digital")
                                                     ->setLastModifiedBy("Developer")
                                                     ->setTitle("Office 2007 XLSX Test Document")
                                                     ->setSubject("Office 2007 XLSX Test Document")
                                                     ->setDescription("Reporte registros campaña admisiones uan.")
                                                     ->setKeywords("office 2007 openxml php")
                                                     ->setCategory("Test result file");
                        // Add some data
                        $objPHPExcel->setActiveSheetIndex(0)
                                    ->setCellValue('A1', 'Nombre Completo')
                                    ->setCellValue('B1', 'Cedula')
                                    ->setCellValue('C1', 'Telefono')
                                    ->setCellValue('D1', 'Email')
                                    ->setCellValue('E1', 'Programa')
                                    ->setCellValue('F1', 'Mensaje')
                                    ->setCellValue('G1', 'CampanaId')
                                    ->setCellValue('H1', 'OrigenCampana')
                                    ->setCellValue('I1', 'Created_at')
                                    ->setCellValue('J1', 'Status')
                                    ->setCellValue('K1', 'Status2')
                                    ->setCellValue('L1', 'AsignadoA')
                                    ->setCellValue('M1', 'FechaAsignado');





                        if($db->numRows($result) > 0){
                            $i=2;
                          while ($r = $db->datos($result)) {
                            $date = $r['Created_date'];
                            $nuevafecha = strtotime ( '-5 hour' , strtotime ($date));
                            $nuevafecha = date( 'Y-m-d H:i:s' , $nuevafecha );

                            $objPHPExcel->setActiveSheetIndex(0)
                                        ->setCellValue("A$i", $r['Nombre_completo'])
                                        ->setCellValue("B$i", $r['Cedula'])
                                        ->setCellValue("C$i", $r['Celular'])
                                        ->setCellValue("D$i", $r['Email'])
                                        ->setCellValue("E$i", $r['Programa'])
                                        ->setCellValue("F$i", $r['Mensaje'])
                                        ->setCellValue("G$i", $r['Campana_Id'])
                                        ->setCellValue("H$i", $r['Origen_Campana'])
                                        ->setCellValue("I$i", $r['Created_date'])
                                        ->setCellValue("J$i", $r['Status'])
                                        ->setCellValue("K$i", $r['Status2'])
                                        ->setCellValue("L$i", $r['Asignado_a'])
                                        ->setCellValue("M$i", $r['Fecha_asignado']);
                                        $i++;


                            //$r['Id']
                          }




                        }
                        else{

                        }

                    // Rename worksheet
                    $objPHPExcel->getActiveSheet()->setTitle('Registros_campana');
                    $objPHPExcel->setActiveSheetIndex(0);

                    // Redirect output to a client’s web browser (Excel5)
                    header('Content-Type: application/vnd.ms-excel');
                    header('Content-Disposition: attachment;filename="registros_campana.xls"');
                    header('Cache-Control: max-age=0');
                    // If you're serving to IE 9, then the following may be needed
                    header('Cache-Control: max-age=1');

                    // If you're serving to IE over SSL, then the following may be needed
                    header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
                    header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
                    header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
                    header ('Pragma: public'); // HTTP/1.0

                    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
                    $objWriter->save('php://output');




        break;
        exit;




    }




?>