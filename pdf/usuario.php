<?php
require 'fpdf/fpdf.php';

class PDF extends FPDF{

    function Header(){
     
        $this->SetFont('Arial','B',15);
        $this->Cell(30);
        $this->Cell(120,10, 'Reporte de Usuarios Registrados',0,0,'C');
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
    require '../model/Usuario.php';
    
    $query1 = "SELECT * FROM usuario";
    $resultado = $mysqli->query($query1);

    $pdf = new PDF();
    $pdf->AliasNbPages();
    $pdf->AddPage();

    $pdf->SetFillColor(232,232,232);
    $pdf->SetFont('Arial', 'B', 12);

    $pdf->Cell(20,6,'N',1,0,'c',1);
    $pdf->Cell(50,6,'Nombre',1,0,'c',1);
    $pdf->Cell(55,6,'Apellidos',1,0,'c',1);
    $pdf->Cell(60,6,'Email',1,1,'c',1);
   
    $pdf->SetFont('Arial', '', 10);

    while($row = $resultado->fetch_assoc()){

        $pdf->Cell(20,6,$row['idusuario'],1,0,'c');
        $pdf->Cell(50,6,$row['nombre'],1,0,'c');
        $pdf->Cell(55,6,$row['apellido'],1,0,'c');
        $pdf->Cell(60,6,$row['email'],1,1,'c');
    }
    $pdf->Output();
?>