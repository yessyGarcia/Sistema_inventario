<?php
require_once '/Classes/PHPExcel.php';
require_once('conexion.php');




$query1 = "SELECT * FROM ubicacion";
   $resultado = $mysqli->query($query1);

  

$fila = 2;
$objPHPExcel = new PHPExcel();

//ESTILO PARA FORMATO EXCEL
$estilo = array(
    'borders' => array(
    'outline' => array(
    'style' =>PHPExcel_Style_Border::
BORDER_THIN  
    )   
  )
);
$estilo1 = array(
    'font' => array(
    'bold' => true,
    'center' => true,
    'size' =>10,
    'name' => 'Verdana'
));


$objPHPExcel->setActiveSheetIndex();
$objPHPExcel->getActiveSheet()->setTitle('Ubicación');

$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(10);
$objPHPExcel->getActiveSheet()->setCellValue('A1', 'N');
$objPHPExcel->getActiveSheet()->getStyle('A1')->applyFromArray($estilo);
$objPHPExcel->getActiveSheet()->getStyle('A1')->applyFromArray($estilo1);

$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(15);
$objPHPExcel->getActiveSheet()->setCellValue('B1', 'Nombre');
$objPHPExcel->getActiveSheet()->getStyle('B1')->applyFromArray($estilo);
$objPHPExcel->getActiveSheet()->getStyle('B1')->applyFromArray($estilo1);

$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(15);
$objPHPExcel->getActiveSheet()->setCellValue('C1', 'Descripción');
$objPHPExcel->getActiveSheet()->getStyle('C1')->applyFromArray($estilo);
$objPHPExcel->getActiveSheet()->getStyle('C1')->applyFromArray($estilo1);

while ($row = $resultado->fetch_assoc())
{


    $objPHPExcel->getActiveSheet()->setCellValue('A'.$fila, $row['idubicacion']); 
    $objPHPExcel->getActiveSheet()->setCellValue('B'.$fila, $row['nombre']); 
    $objPHPExcel->getActiveSheet()->setCellValue('C'.$fila, $row['descripcion']); 

    $fila++;
}
    header("Content-type:application/xls");
header('Content-Disposition: attachment;filename="Ubicacion.xls"');
header('Cache-Control: max-age=0');


    $objWriter=PHPExcel_IOFactory::createWriter($objPHPExcel,'Excel5');
$objWriter->save('php://output');
//exit;
?>