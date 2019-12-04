<?php 
require_once '/Classes/PHPExcel.php';
require_once 'conexion.php';

$query1 = "SELECT b.idbien as idbien, codigointerno, codigomined, codigoitca, c.nombre as idclasificacionbien, tipobien, descripcionbien, marca, modelo, serie, ub.nombre as idubicacion, costobien, u.nombre as idusuariocustodio, e.nombre as estadobien, f.nombre as idfuentefinanciamiento, t.nombre as idtipocomprobante, numerocomprobante, fechaadquisicion, d.nombre as iddepartamento, observaciones, u.nombre as nombre FROM bien as b INNER JOIN usuario AS u ON b.idusuariocustodio = u.idusuario INNER JOIN departamento AS d ON b.iddepartamento = d.iddepartamento INNER JOIN tipocomprobante AS t ON b.idtipocomprobante = t.idtipocomprobante INNER JOIN fuentefinanciamiento AS f ON b.idfuentefinanciamiento = f.idfuentefinanciamiento INNER JOIN estadobien AS e ON b.idestadobien = e.idestadobien INNER JOIN ubicacion AS ub ON b.idubicacion = ub.idubicacion INNER JOIN clasificacionbien AS c ON b.idclasificacionbien = c.idclasificacionbien ORDER BY idbien";
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

$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(15);
$objPHPExcel->getActiveSheet()->setCellValue('B1', 'Interno');
$objPHPExcel->getActiveSheet()->getStyle('B1')->applyFromArray($estilo);
$objPHPExcel->getActiveSheet()->getStyle('B1')->applyFromArray($estilo1);

$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(15);
$objPHPExcel->getActiveSheet()->setCellValue('C1', 'Mined');
$objPHPExcel->getActiveSheet()->getStyle('C1')->applyFromArray($estilo);
$objPHPExcel->getActiveSheet()->getStyle('C1')->applyFromArray($estilo1);

$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(15);
$objPHPExcel->getActiveSheet()->setCellValue('D1', 'Itca');
$objPHPExcel->getActiveSheet()->getStyle('D1')->applyFromArray($estilo);
$objPHPExcel->getActiveSheet()->getStyle('D1')->applyFromArray($estilo1);

$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(18);
$objPHPExcel->getActiveSheet()->setCellValue('E1', 'Nombre');
$objPHPExcel->getActiveSheet()->getStyle('E1')->applyFromArray($estilo);
$objPHPExcel->getActiveSheet()->getStyle('E1')->applyFromArray($estilo1);

$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(23);
$objPHPExcel->getActiveSheet()->setCellValue('F1', 'Clasificación');
$objPHPExcel->getActiveSheet()->getStyle('F1')->applyFromArray($estilo);
$objPHPExcel->getActiveSheet()->getStyle('F1')->applyFromArray($estilo1);

$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(20);
$objPHPExcel->getActiveSheet()->setCellValue('G1', 'Tipo');
$objPHPExcel->getActiveSheet()->getStyle('G1')->applyFromArray($estilo);
$objPHPExcel->getActiveSheet()->getStyle('G1')->applyFromArray($estilo1);

$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(30);
$objPHPExcel->getActiveSheet()->setCellValue('H1', 'Descripción');
$objPHPExcel->getActiveSheet()->getStyle('H1')->applyFromArray($estilo);
$objPHPExcel->getActiveSheet()->getStyle('H1')->applyFromArray($estilo1);

$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(15);
$objPHPExcel->getActiveSheet()->setCellValue('I1', 'Marca');
$objPHPExcel->getActiveSheet()->getStyle('I1')->applyFromArray($estilo);
$objPHPExcel->getActiveSheet()->getStyle('I1')->applyFromArray($estilo1);

$objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(15);
$objPHPExcel->getActiveSheet()->setCellValue('J1', 'Modelo');
$objPHPExcel->getActiveSheet()->getStyle('J1')->applyFromArray($estilo);
$objPHPExcel->getActiveSheet()->getStyle('J1')->applyFromArray($estilo1);

$objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(15);
$objPHPExcel->getActiveSheet()->setCellValue('K1', 'Serie');
$objPHPExcel->getActiveSheet()->getStyle('K1')->applyFromArray($estilo);
$objPHPExcel->getActiveSheet()->getStyle('K1')->applyFromArray($estilo1);

$objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(13);
$objPHPExcel->getActiveSheet()->setCellValue('L1', 'Ubicación');
$objPHPExcel->getActiveSheet()->getStyle('L1')->applyFromArray($estilo);
$objPHPExcel->getActiveSheet()->getStyle('L1')->applyFromArray($estilo1);

$objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(10);
$objPHPExcel->getActiveSheet()->setCellValue('M1', 'Costo');
$objPHPExcel->getActiveSheet()->getStyle('M1')->applyFromArray($estilo);
$objPHPExcel->getActiveSheet()->getStyle('M1')->applyFromArray($estilo1);

$objPHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth(18);
$objPHPExcel->getActiveSheet()->setCellValue('N1', 'Custodio');
$objPHPExcel->getActiveSheet()->getStyle('N1')->applyFromArray($estilo);
$objPHPExcel->getActiveSheet()->getStyle('N1')->applyFromArray($estilo1);

$objPHPExcel->getActiveSheet()->getColumnDimension('O')->setWidth(16);
$objPHPExcel->getActiveSheet()->setCellValue('O1', 'Estado');
$objPHPExcel->getActiveSheet()->getStyle('O1')->applyFromArray($estilo);
$objPHPExcel->getActiveSheet()->getStyle('O1')->applyFromArray($estilo1);

$objPHPExcel->getActiveSheet()->getColumnDimension('P')->setWidth(20);
$objPHPExcel->getActiveSheet()->setCellValue('P1', 'Financiamiento');
$objPHPExcel->getActiveSheet()->getStyle('P1')->applyFromArray($estilo);
$objPHPExcel->getActiveSheet()->getStyle('P1')->applyFromArray($estilo1);

$objPHPExcel->getActiveSheet()->getColumnDimension('Q')->setWidth(15);
$objPHPExcel->getActiveSheet()->setCellValue('Q1', 'Comprobante');
$objPHPExcel->getActiveSheet()->getStyle('Q1')->applyFromArray($estilo);
$objPHPExcel->getActiveSheet()->getStyle('Q1')->applyFromArray($estilo1);

$objPHPExcel->getActiveSheet()->getColumnDimension('R')->setWidth(16);
$objPHPExcel->getActiveSheet()->setCellValue('R1', 'N.Comprobante');
$objPHPExcel->getActiveSheet()->getStyle('R1')->applyFromArray($estilo);
$objPHPExcel->getActiveSheet()->getStyle('R1')->applyFromArray($estilo1);

$objPHPExcel->getActiveSheet()->getColumnDimension('S')->setWidth(16);
$objPHPExcel->getActiveSheet()->setCellValue('S1', 'Adquisición');
$objPHPExcel->getActiveSheet()->getStyle('S1')->applyFromArray($estilo);
$objPHPExcel->getActiveSheet()->getStyle('S1')->applyFromArray($estilo1);

$objPHPExcel->getActiveSheet()->getColumnDimension('T')->setWidth(40);
$objPHPExcel->getActiveSheet()->setCellValue('T1', 'Departamento');
$objPHPExcel->getActiveSheet()->getStyle('T1')->applyFromArray($estilo);
$objPHPExcel->getActiveSheet()->getStyle('T1')->applyFromArray($estilo1);

$objPHPExcel->getActiveSheet()->getColumnDimension('U')->setWidth(35);
$objPHPExcel->getActiveSheet()->setCellValue('U1', 'Observaciones');
$objPHPExcel->getActiveSheet()->getStyle('U1')->applyFromArray($estilo);
$objPHPExcel->getActiveSheet()->getStyle('U1')->applyFromArray($estilo1);

$objPHPExcel->getActiveSheet()->getColumnDimension('V')->setWidth(20);
$objPHPExcel->getActiveSheet()->setCellValue('V1', 'Registró');
$objPHPExcel->getActiveSheet()->getStyle('V1')->applyFromArray($estilo);
$objPHPExcel->getActiveSheet()->getStyle('V1')->applyFromArray($estilo1);

while ($row=mysqli_fetch_assoc($resultado))

{
    $objPHPExcel->getActiveSheet()->setCellValue('A'.$fila, $row['idbien']);
    $objPHPExcel->getActiveSheet()->setCellValue('B'.$fila, $row['codigointerno']); 
    $objPHPExcel->getActiveSheet()->setCellValue('C'.$fila, $row['codigomined']); 
    $objPHPExcel->getActiveSheet()->setCellValue('D'.$fila, $row['codigoitca']); 
    $objPHPExcel->getActiveSheet()->setCellValue('E'.$fila,utf8_encode($row['nombre']));
    $objPHPExcel->getActiveSheet()->setCellValue('F'.$fila,utf8_encode($row['idclasificacionbien']));
    $objPHPExcel->getActiveSheet()->setCellValue('G'.$fila,utf8_encode($row['tipobien']));
    $objPHPExcel->getActiveSheet()->setCellValue('H'.$fila,utf8_encode($row['descripcionbien']));
    $objPHPExcel->getActiveSheet()->setCellValue('I'.$fila,utf8_encode($row['marca']));
    $objPHPExcel->getActiveSheet()->setCellValue('J'.$fila,utf8_encode($row['modelo']));
    $objPHPExcel->getActiveSheet()->setCellValue('K'.$fila,utf8_encode($row['serie']));
    $objPHPExcel->getActiveSheet()->setCellValue('L'.$fila,utf8_encode($row['idubicacion']));
    $objPHPExcel->getActiveSheet()->setCellValue('M'.$fila,utf8_encode($row['costobien']));
    $objPHPExcel->getActiveSheet()->setCellValue('N'.$fila,utf8_encode($row['idusuariocustodio']));
    $objPHPExcel->getActiveSheet()->setCellValue('O'.$fila,utf8_encode($row['estadobien']));
    $objPHPExcel->getActiveSheet()->setCellValue('P'.$fila,utf8_encode($row['idfuentefinanciamiento']));
    $objPHPExcel->getActiveSheet()->setCellValue('Q'.$fila,utf8_encode($row['idtipocomprobante']));
    $objPHPExcel->getActiveSheet()->setCellValue('R'.$fila,utf8_encode($row['numerocomprobante']));
    $objPHPExcel->getActiveSheet()->setCellValue('S'.$fila,utf8_encode($row['fechaadquisicion']));
    $objPHPExcel->getActiveSheet()->setCellValue('T'.$fila,utf8_encode($row['iddepartamento']));
    $objPHPExcel->getActiveSheet()->setCellValue('U'.$fila,utf8_encode($row['observaciones']));
    $objPHPExcel->getActiveSheet()->setCellValue('V'.$fila,utf8_encode($row['nombre']));

   /* 
    ---------------------------------PARA TODO MAYUSCULA------------------------------
    $objPHPExcel->getActiveSheet()->setCellValue('A'.$fila,mb_strtoupper($row['idbien']));
    $objPHPExcel->getActiveSheet()->setCellValue('B'.$fila,mb_strtoupper($row['codigointerno'])); 
    $objPHPExcel->getActiveSheet()->setCellValue('C'.$fila,mb_strtoupper($row['codigomined'])); 
    $objPHPExcel->getActiveSheet()->setCellValue('D'.$fila,mb_strtoupper($row['codigoitca'])); 
    $objPHPExcel->getActiveSheet()->setCellValue('E'.$fila,mb_strtoupper($row['nombre']));
    $objPHPExcel->getActiveSheet()->setCellValue('F'.$fila,mb_strtoupper($row['idclasificacionbien']));
    $objPHPExcel->getActiveSheet()->setCellValue('G'.$fila,mb_strtoupper($row['tipobien']));
    $objPHPExcel->getActiveSheet()->setCellValue('H'.$fila,mb_strtoupper($row['descripcionbien']));
    $objPHPExcel->getActiveSheet()->setCellValue('I'.$fila,mb_strtoupper($row['marca']));
    $objPHPExcel->getActiveSheet()->setCellValue('J'.$fila,mb_strtoupper($row['modelo']));
    $objPHPExcel->getActiveSheet()->setCellValue('K'.$fila,mb_strtoupper($row['serie']));
    $objPHPExcel->getActiveSheet()->setCellValue('L'.$fila,mb_strtoupper($row['idubicacion']));
    $objPHPExcel->getActiveSheet()->setCellValue('M'.$fila,mb_strtoupper($row['costobien']));
    $objPHPExcel->getActiveSheet()->setCellValue('N'.$fila,mb_strtoupper($row['idusuariocustodio']));
    $objPHPExcel->getActiveSheet()->setCellValue('O'.$fila,mb_strtoupper($row['estadobien']));
    $objPHPExcel->getActiveSheet()->setCellValue('P'.$fila,mb_strtoupper($row['idfuentefinanciamiento']));
    $objPHPExcel->getActiveSheet()->setCellValue('Q'.$fila,mb_strtoupper($row['idtipocomprobante']));
    $objPHPExcel->getActiveSheet()->setCellValue('R'.$fila,mb_strtoupper($row['numerocomprobante']));
    $objPHPExcel->getActiveSheet()->setCellValue('S'.$fila,mb_strtoupper($row['fechaadquisicion']));
    $objPHPExcel->getActiveSheet()->setCellValue('T'.$fila,mb_strtoupper($row['iddepartamento']));
    $objPHPExcel->getActiveSheet()->setCellValue('U'.$fila,mb_strtoupper($row['observaciones']));
    $objPHPExcel->getActiveSheet()->setCellValue('V'.$fila,mb_strtoupper($row['nombre']));
 */
    $fila++;
}

    header("Content-type:application/xls");
    header('Content-Disposition: attachment;filename="Bienes.xls"');
    header('Cache-Control: max-age=0');
 
$objWriter=PHPExcel_IOFactory::createWriter($objPHPExcel,'Excel5');
$objWriter->save('php://output');
//exit;
?>

