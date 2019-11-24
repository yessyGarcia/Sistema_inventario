<?php
require 'fpdf/fpdf.php';

class PDF extends FPDF{

    function Header(){
     
        $this->SetFont('Arial','B',15);
        $this->Cell(30);
        $this->Cell(120,10, 'Reporte de Clasificacion del bien',0,0,'C');
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
    require '../model/Departamento.php';
    
    $query1 = "SELECT * FROM departamento";
    $resultado = $mysqli->query($query1);

    $pdf = new PDF();
    $pdf->AliasNbPages();
    $pdf->AddPage();

    $pdf->SetFillColor(232,232,232);
    $pdf->SetFont('Arial', 'B', 12);

    $pdf->Cell(34,6,'N',1,0,'c',1);
    $pdf->Cell(122,6,'Nombre',1,0,'c',1);
    $pdf->Cell(25,6,'Codigo',1,1,'c',1);


    $pdf->SetFont('Arial', '', 10);

    while($row = $resultado->fetch_assoc()){

        $pdf->Cell(34,6,$row['iddepartamento'],1,0,'c');
        $pdf->Cell(122,6,$row['nombre'],1,0,'c');
        $pdf->Cell(25,6,$row['codigodepartamento'],1,1,'c');
    }
    $pdf->Output();
?>