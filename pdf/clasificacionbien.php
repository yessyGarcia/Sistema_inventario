<?php 
    include 'plantilla.php';
    require 'Conexion.php';
    require '../model/Clasificacionbien.php';


     
    $query1 = "SELECT * FROM clasificacionbien";
   $resultado = $mysqli->query($query1);

  /* public function ListarBienActivos()
   {
       try
       {

           $stm = $this->pdo->prepare("SELECT b.idbien as idbien, codigointerno, codigomined, codigoitca, c.nombre as idclasificacionbien, tipobien, descripcionbien, marca, modelo, serie, ub.nombre as idubicacion, costobien, u.nombre as idusuariocustodio, e.nombre as estadobien, f.nombre as idfuentefinanciamiento, t.nombre as idtipocomprobante, numerocomprobante, fechaadquisicion, d.nombre as iddepartamento, observaciones, u.nombre as nombre FROM bien as b INNER JOIN usuario AS u ON b.idusuariocustodio = u.idusuario INNER JOIN departamento AS d ON b.iddepartamento = d.iddepartamento INNER JOIN tipocomprobante AS t ON b.idtipocomprobante = t.idtipocomprobante INNER JOIN fuentefinanciamiento AS f ON b.idfuentefinanciamiento = f.idfuentefinanciamiento INNER JOIN estadobien AS e ON b.idestadobien = e.idestadobien INNER JOIN ubicacion AS ub ON b.idubicacion = ub.idubicacion INNER JOIN clasificacionbien AS c ON b.idclasificacionbien = c.idclasificacionbien ORDER BY idbien");
           $stm->execute();

           return $stm->fetchAll(PDO::FETCH_OBJ);
       }
       catch (Throwable $t)//php7
       {
           die($t->getMessage());
       }
       catch(Exception $e)//php5
       {
           die($e->getMessage());
       }
   }*/
    $pdf = new PDF();
    $pdf->AliasNbPages();
    $pdf->AddPage();

    $pdf->SetFillColor(232,232,232);
    $pdf->SetFont('Arial', 'B', 12);

   // $pdf->Cell(12,6,'Clasificacionbien',1,0,'c',1);
   $pdf->Cell(70,6,'idclasificacionbien',1,0,'c',1);
    $pdf->Cell(70,6,'nombre',1,1,'c',1);
   
   
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

        $pdf->Cell(70,6,$row['idclasificacionbien'],1,0,'c');
        $pdf->Cell(70,6,$row['nombre'],1,1,'c');
      
         
    }
    $pdf->Output();




?>