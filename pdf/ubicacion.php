<?php
require 'fpdf/fpdf.php';

class PDF extends FPDF{

    function Header(){
     
        $this->SetFont('Arial','B',15);
        $this->Cell(30);
        $this->Cell(120,10, 'Reporte de Ubicacion del bien',0,0,'C');
        $this->Ln(20);
    }
    
    function Footer(){
        $this->SetY(-15);
        $this->SetFont('Arial','I', 8);
        $this->Cell(0,10, 'Pagina '.$this->PageNo().'/{nb}',0,0,'C'); 
    }
}
?>
<?php 
    require 'Conexion.php';
    require '../model/Ubicacion.php';

    $query1 = "SELECT * FROM ubicacion";
    $resultado = $mysqli->query($query1);

    $pdf = new PDF();
    $pdf->AliasNbPages();
    $pdf->AddPage();

    $pdf->SetFillColor(232,232,232);
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(60,6,'N',1,0,'c',1);
    $pdf->Cell(60,6,'Nombre',1,0,'c',1);
    $pdf->Cell(60,6,'Descripcion',1,1,'c',1);
   
    $pdf->SetFont('Arial', '', 10);

    while($row = $resultado->fetch_assoc()){

        $pdf->Cell(60,6,$row['idubicacion'],1,0,'c');
        $pdf->Cell(60,6,$row['nombre'],1,0,'c');
        $pdf->Cell(60,6,$row['descripcion'],1,1,'c');
    }
    $pdf->Output();
?>