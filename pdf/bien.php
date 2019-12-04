<?php
require 'fpdf/fpdf.php';

class PDF extends FPDF{

    function Header(){
     
        $this->SetFont('Arial','B',15);
        //$this->Cell(30);
        $this->Cell(120,10, 'Reporte del bien',0,0,'C');

        $this->Ln(20);
    }
    
    function Footer(){
       // $this->SetY(-15);
        $this->SetFont('Arial','I', 8);
        $this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C'); 
    }
}
?>
<?php 
    require 'Conexion.php';
    require '../model/Bien.php';
    
   $query1 = "SELECT b.idbien as idbien, codigointerno, codigomined, codigoitca, c.nombre as idclasificacionbien, tipobien, descripcionbien, marca, modelo, serie, ub.nombre as idubicacion, costobien, u.nombre as idusuariocustodio, e.nombre as estadobien, f.nombre as idfuentefinanciamiento, t.nombre as idtipocomprobante, numerocomprobante, fechaadquisicion, d.nombre as iddepartamento, observaciones, u.nombre as nombre FROM bien as b INNER JOIN usuario AS u ON b.idusuariocustodio = u.idusuario INNER JOIN departamento AS d ON b.iddepartamento = d.iddepartamento INNER JOIN tipocomprobante AS t ON b.idtipocomprobante = t.idtipocomprobante INNER JOIN fuentefinanciamiento AS f ON b.idfuentefinanciamiento = f.idfuentefinanciamiento INNER JOIN estadobien AS e ON b.idestadobien = e.idestadobien INNER JOIN ubicacion AS ub ON b.idubicacion = ub.idubicacion INNER JOIN clasificacionbien AS c ON b.idclasificacionbien = c.idclasificacionbien ORDER BY idbien";
   $resultado = $mysqli->query($query1);

    $pdf = new PDF('L');
    $pdf->AliasNbPages();
    $pdf->AddPage();

    $pdf->SetFillColor(232,232,232);
    $pdf->SetFont('Arial', 'B', 10);

   
    $pdf->Cell(20,6,utf8_decode('Códigos'),1,0,'C',1);
    $pdf->Cell(20,6,'Nombre',1,0,'C',1);
    $pdf->Cell(20,6,utf8_decode('Clasificación'),1,0,'C',1);
    $pdf->Cell(20,6,'Tipo',1,0,'C',1);
    $pdf->Cell(24,6,utf8_decode('Descripción'),1,0,'C',1);
    $pdf->Cell(30,6,'Detalles',1,0,'C',1);
    /* $pdf->Cell(17,6,'Modelo',1,0,'c',1);
    $pdf->Cell(21,6,'Serie',1,0,'c',1); */
    $pdf->Cell(21,6,utf8_decode('Ubicación'),1,0,'C',1);
    $pdf->Cell(21,6,'Costo $',1,0,'C',1);
    $pdf->Cell(21,6,'Custodio',1,0,'C',1);
    $pdf->Cell(21,6,'Estado',1,0,'C',1);
    $pdf->Cell(21,6,'Financiamiento',1,0,'C',1);
    $pdf->Cell(21,6,'Comprobante',1,0,'C',1);
    $pdf->Cell(21,6,'Numero.',1,0,'L',1);
    $pdf->Cell(21,6,'Fecha',1,0,'C',1);
    $pdf->Cell(21,6,'Departamento',1,0,'C',1);
    $pdf->Cell(21,6,'Observaciones',1,0,'C',1);
    $pdf->Cell(21,6,utf8_decode('Registró'),1,1,'C',1);
   
    $pdf->SetFont('Arial', '', 9);

    while($row = $resultado->fetch_assoc()){
   
    
    $pdf->Cell(25, 6,'Interno: '.$row['codigointerno'],'L');
    $pdf->MultiCell(20, 6,$row['nombre'],'L');
    $pdf->Cell(20, 6,$row['idclasificacionbien'],'L');
    $pdf->MultiCell(20, 6,$row['tipobien'],'L');
    $pdf->MultiCell(20, 6,$row['descripcionbien'],'L');  
    $pdf->MultiCell(20, 6,'Mined:  '.$row['codigomined'],'L');
    $pdf->MultiCell(20, 6,'Itca: '.$row['codigoitca'],'L');
    $pdf->MultiCell(100, 5,'$ '.$row['costobien'],1,0,'c');
    
    /* $pdf->MultiCell(20, 6,'Mined: '.$row['codigomined'],1,'C');
    $pdf->MultiCell(20, 6,'Itca: '.$row['codigoitca'],1,'L'); */

      
          /* $pdf->MultiCell(100, 5,'Marca:',1).$pdf->MultiCell(16,6,$row['marca'],1,0,'c');
        $pdf->MultiCell(100, 5,$row['idubicacion'],1,0,'c');
        
        $pdf->MultiCell(100, 5,$row['idusuariocustodio'],1,0,'c');
        $pdf->MultiCell(100, 5,$row['estadobien'],1,0,'c');
        $pdf->MultiCell(100, 5,$row['idfuentefinanciamiento'],1,0,'c');
        $pdf->MultiCell(100, 5,$row['idtipocomprobante'],1,0,'c');
        $pdf->MultiCell(100, 5,$row['numerocomprobante'],1,0,'c');
        $pdf->MultiCell(100, 5,$row['fechaadquisicion'],1,0,'c');
        $pdf->MultiCell(100, 5,$row['iddepartamento'],1,0,'c');
        $pdf->MultiCell(100, 5,$row['observaciones'],1,0,'c');
        $pdf->MultiCell(100, 5,$row['nombre'],1,0,'c'); */
       /*  $pdf->Cell(14,6,'Modelo:',1).$pdf->Cell(17,6,$row['modelo'],1,1,'c');
        $pdf->Cell(14,6,'Serie:',1).$pdf->Cell(21,6,$row['serie'],1,1,'c'); */ 

      
       
        
       
       
       
       
       
     }
    $pdf->Output();
?>