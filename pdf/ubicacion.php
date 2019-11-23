<?php 
    include 'plantilla.php';
    require 'Conexion.php';
    require '../model/Ubicacion.php';

    //$this->Cell(120,10, 'Fuente Finnciamiento',0,0,'C');
    $query1 = "SELECT * FROM ubicacion";
    $resultado = $mysqli->query($query1);

    $pdf = new PDF();
    $pdf->AliasNbPages();
    $pdf->AddPage();

    $pdf->SetFillColor(232,232,232);
    $pdf->SetFont('Arial', 'B', 12);

   // $pdf->Cell(12,6,'Clasificacionbien',1,0,'c',1);
   $pdf->Cell(60,6,'idubicacion',1,0,'c',1);
    $pdf->Cell(60,6,'nombre',1,0,'c',1);
    $pdf->Cell(60,6,'descripcion',1,1,'c',1);
   
   
    //alineado o margen de celda
    //$pdf->SetX(50);
    //$pdf->SetY(50);
    //$pdf->SetXY(50, 50);
    

    //para celdas normales, en este el texto sobre pasa la celda
    //$pdf->Cell(100, 10, 'Hola Mundo', 0, 1, 'C');
   /* $y = $pdf->GetY();
    $pdf->SetY($y+10);
    $pdf->Cell(100, 10, 'Hola Mundo 2', 1, 1, 'C');
    $pdf->Cell(100, 10, 'Hola Mundo 3', 1, 1, 'C');

    
    //para celdas, en este el texto se acopla a la celda 
    //$pdf->MultiCell(100, 5,'hddvnvblfkfinasdffcvvnbbbbbbbbjd djffffffffffffffffffffffffffffffffffffff', 0, 'L', 0);
*/
    $pdf->SetFont('Arial', '', 10);

    while($row = $resultado->fetch_assoc()){

        $pdf->Cell(60,6,$row['idubicacion'],1,0,'c');
        $pdf->Cell(60,6,$row['nombre'],1,0,'c');
        $pdf->Cell(60,6,$row['descripcion'],1,1,'c');
      
         
    }
    $pdf->Output();




?>