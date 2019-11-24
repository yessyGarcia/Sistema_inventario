<?php 
require_once '/Classes/PHPExcel.php';
require_once 'conexion.php';

$query1 = "SELECT b.idbien as idbien, codigointerno, codigomined, codigoitca, c.nombre as idclasificacionbien, tipobien, descripcionbien, marca, modelo, serie, ub.nombre as idubicacion, costobien, u.nombre as idusuariocustodio, e.nombre as estadobien, f.nombre as idfuentefinanciamiento, t.nombre as idtipocomprobante, numerocomprobante, fechaadquisicion, d.nombre as iddepartamento, observaciones, u.nombre as nombre FROM bien as b INNER JOIN usuario AS u ON b.idusuariocustodio = u.idusuario INNER JOIN departamento AS d ON b.iddepartamento = d.iddepartamento INNER JOIN tipocomprobante AS t ON b.idtipocomprobante = t.idtipocomprobante INNER JOIN fuentefinanciamiento AS f ON b.idfuentefinanciamiento = f.idfuentefinanciamiento INNER JOIN estadobien AS e ON b.idestadobien = e.idestadobien INNER JOIN ubicacion AS ub ON b.idubicacion = ub.idubicacion INNER JOIN clasificacionbien AS c ON b.idclasificacionbien = c.idclasificacionbien ORDER BY idbien";
$resultado = $mysqli->query($query1);

$fila = 2;
$objPHPExcel = new PHPExcel();

$objPHPExcel->setActiveSheetIndex();
$objPHPExcel->getActiveSheet()->setTitle('Bien');

$objPHPExcel->getActiveSheet()->setCellValue('A1', 'Bien');
$objPHPExcel->getActiveSheet()->setCellValue('B1', 'Interno');
$objPHPExcel->getActiveSheet()->setCellValue('C1', 'Mined');
$objPHPExcel->getActiveSheet()->setCellValue('D1', 'Itca');
$objPHPExcel->getActiveSheet()->setCellValue('E1', 'Nombre');
$objPHPExcel->getActiveSheet()->setCellValue('F1', 'Clasificacion');
$objPHPExcel->getActiveSheet()->setCellValue('G1', 'Tipo');
$objPHPExcel->getActiveSheet()->setCellValue('H1', 'Descripcion');
$objPHPExcel->getActiveSheet()->setCellValue('I1', 'Marca');
$objPHPExcel->getActiveSheet()->setCellValue('J1', 'Modelo');
$objPHPExcel->getActiveSheet()->setCellValue('K1', 'Serie');
$objPHPExcel->getActiveSheet()->setCellValue('L1', 'Ubicacion');
$objPHPExcel->getActiveSheet()->setCellValue('M1', 'Costo');
$objPHPExcel->getActiveSheet()->setCellValue('N1', 'Custodio');
$objPHPExcel->getActiveSheet()->setCellValue('O1', 'Estado');
$objPHPExcel->getActiveSheet()->setCellValue('P1', 'Financiamiento');
$objPHPExcel->getActiveSheet()->setCellValue('Q1', 'TipoComprob');
$objPHPExcel->getActiveSheet()->setCellValue('R1', 'Numero');
$objPHPExcel->getActiveSheet()->setCellValue('S1', 'Fechaadquisicion');
$objPHPExcel->getActiveSheet()->setCellValue('T1', 'Departamento');
$objPHPExcel->getActiveSheet()->setCellValue('U1', 'Observaciones');
$objPHPExcel->getActiveSheet()->setCellValue('V1', 'Nombre');

while ($row=mysqli_fetch_assoc($resultado))
{
    $objPHPExcel->getActiveSheet()->setCellValue('A'.$fila, $row['idbien']);
    $objPHPExcel->getActiveSheet()->setCellValue('B'.$fila, $row['codigointerno']); 
    $objPHPExcel->getActiveSheet()->setCellValue('C'.$fila, $row['codigomined']); 
    $objPHPExcel->getActiveSheet()->setCellValue('D'.$fila, $row['codigoitca']); 
    $objPHPExcel->getActiveSheet()->setCellValue('E'.$fila, $row['nombre']); 
    $objPHPExcel->getActiveSheet()->setCellValue('F'.$fila, $row['idclasificacionbien']); 
    $objPHPExcel->getActiveSheet()->setCellValue('G'.$fila, $row['tipobien']); 
    $objPHPExcel->getActiveSheet()->setCellValue('H'.$fila, $row['descripcionbien']); 
    $objPHPExcel->getActiveSheet()->setCellValue('I'.$fila, $row['marca']); 
    $objPHPExcel->getActiveSheet()->setCellValue('J'.$fila, $row['modelo']); 
    $objPHPExcel->getActiveSheet()->setCellValue('K'.$fila, $row['serie']); 
    $objPHPExcel->getActiveSheet()->setCellValue('L'.$fila, $row['idubicacion']); 
    $objPHPExcel->getActiveSheet()->setCellValue('M'.$fila, $row['costobien']); 
    $objPHPExcel->getActiveSheet()->setCellValue('N'.$fila, $row['idusuariocustodio']); 
    $objPHPExcel->getActiveSheet()->setCellValue('O'.$fila, $row['estadobien']); 
    $objPHPExcel->getActiveSheet()->setCellValue('P'.$fila, $row['idfuentefinanciamiento']); 
    $objPHPExcel->getActiveSheet()->setCellValue('Q'.$fila, $row['idtipocomprobante']); 
    $objPHPExcel->getActiveSheet()->setCellValue('R'.$fila, $row['numerocomprobante']); 
    $objPHPExcel->getActiveSheet()->setCellValue('S'.$fila, $row['fechaadquisicion']); 
    $objPHPExcel->getActiveSheet()->setCellValue('T'.$fila, $row['iddepartamento']); 
    $objPHPExcel->getActiveSheet()->setCellValue('U'.$fila, $row['observaciones']); 
    $objPHPExcel->getActiveSheet()->setCellValue('V'.$fila, $row['nombre']); 
}
    header("Content-type:application/xls");
    header('Content-Disposition: attachment;filename="Bienes.xls"');
    header('Cache-Control: max-age=0');

$objWriter=PHPExcel_IOFactory::createWriter($objPHPExcel,'Excel5');
$objWriter->save('php://output');
exit;
?>

