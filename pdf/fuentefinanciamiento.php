<?php 
    include 'plantilla.php';
    require 'Conexion.php';
    require '../model/Fuentefinanciamiento.php';

    $query1 = "SELECT * FROM fuentefinanciamiento";
    $resultado = $mysqli->query($query1);

    $pdf = new PDF();
    $pdf->AliasNbPages();
    $pdf->AddPage();

    $pdf->SetFillColor(232,232,232);
    $pdf->SetFont('Arial', 'B', 12);

   $pdf->Cell(60,6,'idfuentefinanciamiento',1,0,'c',1);
    $pdf->Cell(60,6,'nombre',1,0,'c',1);
    $pdf->Cell(60,6,'codigofuentefinanciamiento',1,1,'c',1);
   
   $pdf->SetFont('Arial', '', 10);

    while($row = $resultado->fetch_assoc()){

        $pdf->Cell(60,6,$row['idfuentefinanciamiento'],1,0,'c');
        $pdf->Cell(60,6,$row['nombre'],1,0,'c');
        $pdf->Cell(60,6,$row['codigofuentefinanciamiento'],1,1,'c');
    }
    $pdf->Output();
?>