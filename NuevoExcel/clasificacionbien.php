<?php
require_once '/Classes/PHPExcel.php';
require_once 'conexion.php';

$query1 = "SELECT * FROM clasificacionbien";
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
$objPHPExcel->getActiveSheet()->setTitle('Bien');

$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(10);
$objPHPExcel->getActiveSheet()->setCellValue('A1', 'N');
$objPHPExcel->getActiveSheet()->getStyle('A1')->applyFromArray($estilo);
$objPHPExcel->getActiveSheet()->getStyle('A1')->applyFromArray($estilo1);

$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(28);
$objPHPExcel->getActiveSheet()->setCellValue('B1', 'Nombre');
$objPHPExcel->getActiveSheet()->getStyle('B1')->applyFromArray($estilo);
$objPHPExcel->getActiveSheet()->getStyle('B1')->applyFromArray($estilo1);

while ($row = $resultado->fetch_assoc())
{
    $objPHPExcel->getActiveSheet()->setCellValue('A'.$fila,utf8_encode($row['idclasificacionbien']));
    $objPHPExcel->getActiveSheet()->setCellValue('B'.$fila,utf8_encode($row['nombre'])); 

    $fila++;
}
    header("Content-type:application/xls");
    header('Content-Disposition: attachment;filename="Clasificacion.xls"');
    header('Cache-Control: max-age=0');

$objWriter=PHPExcel_IOFactory::createWriter($objPHPExcel,'Excel5');
$objWriter->save('php://output');

?>
     