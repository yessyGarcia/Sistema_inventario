<?php 
    include 'plantilla.php';
    require 'Conexion.php';
    require '../model/Bien.php';


     
    $query1 = "SELECT b.idbien as idbien, codigointerno, codigomined, codigoitca, c.nombre as idclasificacionbien, tipobien, descripcionbien, marca, modelo, serie, ub.nombre as idubicacion, costobien, u.nombre as idusuariocustodio, e.nombre as estadobien, f.nombre as idfuentefinanciamiento, t.nombre as idtipocomprobante, numerocomprobante, fechaadquisicion, d.nombre as iddepartamento, observaciones, u.nombre as nombre FROM bien as b INNER JOIN usuario AS u ON b.idusuariocustodio = u.idusuario INNER JOIN departamento AS d ON b.iddepartamento = d.iddepartamento INNER JOIN tipocomprobante AS t ON b.idtipocomprobante = t.idtipocomprobante INNER JOIN fuentefinanciamiento AS f ON b.idfuentefinanciamiento = f.idfuentefinanciamiento INNER JOIN estadobien AS e ON b.idestadobien = e.idestadobien INNER JOIN ubicacion AS ub ON b.idubicacion = ub.idubicacion INNER JOIN clasificacionbien AS c ON b.idclasificacionbien = c.idclasificacionbien ORDER BY idbien";
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

    $pdf->Cell(12,6,'Bien',1,0,'c',1);
    $pdf->Cell(21,6,'CodigoInterno',1,0,'c',1);
    $pdf->Cell(23,6,'Mined',1,0,'c',1);
    $pdf->Cell(16,6,'Itca',1,0,'c',1);
    $pdf->Cell(26,6,'Nombre',1,0,'c',1);
    $pdf->Cell(21,6,'Clasificacion',1,0,'c',1);
    $pdf->Cell(21,6,'Tipo',1,0,'c',1);
    $pdf->Cell(21,6,'Descripcion',1,0,'c',1);
    $pdf->Cell(21,6,'Marca',1,0,'c',1);
    $pdf->Cell(17,6,'Modelo',1,0,'c',1);
    $pdf->Cell(21,6,'Serie',1,0,'c',1);
    $pdf->Cell(21,6,'Ubicacion',1,0,'c',1);
    $pdf->Cell(21,6,'Costo',1,0,'c',1);
    $pdf->Cell(21,6,'Custodio',1,0,'c',1);
    $pdf->Cell(21,6,'Estado',1,0,'c',1);
    $pdf->Cell(21,6,'Financiamiento',1,0,'c',1);
    $pdf->Cell(21,6,'Comprobante',1,0,'c',1);
    $pdf->Cell(21,6,'numero',1,0,'c',1);
    $pdf->Cell(21,6,'fecha',1,0,'c',1);
    $pdf->Cell(21,6,'departamento',1,0,'c',1);
    $pdf->Cell(21,6,'observaciones',1,0,'c',1);
    $pdf->Cell(21,6,'UsuarioRegistro',1,1,'c',1);
   
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
        $pdf->Cell(12,6,$row['idbien'],1,0,'c');
        $pdf->Cell(21,6,$row['codigointerno'],1,0,'c');
        $pdf->Cell(23,6,$row['codigomined'],1,0,'c');
        $pdf->Cell(16,6,$row['codigoitca'],1,0,'c');
        $pdf->Cell(26,6,$row['nombre'],1,0,'c');
        $pdf->Cell(21,6,$row['idclasificacionbien'],1,0,'c');
        $pdf->Cell(21,6,$row['tipobien'],1,0,'c');
        $pdf->Cell(21,6,$row['descripcionbien'],1,0,'c');
        $pdf->Cell(21,6,$row['marca'],1,0,'c');
        $pdf->Cell(17,6,$row['modelo'],1,0,'c');
        $pdf->Cell(21,6,$row['serie'],1,0,'c');
        $pdf->Cell(21,6,$row['idubicacion'],1,0,'c');
        $pdf->Cell(21,6,$row['costobien'],1,0,'c',1);
        $pdf->Cell(21,6,$row['idusuariocustodio'],1,0,'c');
        $pdf->Cell(21,6,$row['estadobien'],1,0,'c');
        $pdf->Cell(21,6,$row['idfuentefinanciamiento'],1,0,'c');
        $pdf->Cell(21,6,$row['idtipocomprobante'],1,0,'c');
        $pdf->Cell(21,6,$row['numerocomprobante'],1,0,'c');
        $pdf->Cell(21,6,$row['fechaadquisicion'],1,0,'c');
        $pdf->Cell(21,6,$row['iddepartamento'],1,0,'c');
        $pdf->Cell(21,6,$row['observaciones'],1,0,'c');
        $pdf->Cell(21,6,$row['nombre'],1,1,'c');
       
         
    }
    $pdf->Output();




?>