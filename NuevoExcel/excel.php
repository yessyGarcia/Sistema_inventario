<?php

header("Content-type:application/xls");
header('Content-Disposition: attachment;filename="Bienes.xls"');

require_once('conexion.php');



$query1 = "SELECT b.idbien as idbien, codigointerno, codigomined, codigoitca, c.nombre as idclasificacionbien, tipobien, descripcionbien, marca, modelo, serie, ub.nombre as idubicacion, costobien, u.nombre as idusuariocustodio, e.nombre as estadobien, f.nombre as idfuentefinanciamiento, t.nombre as idtipocomprobante, numerocomprobante, fechaadquisicion, d.nombre as iddepartamento, observaciones, u.nombre as nombre FROM bien as b INNER JOIN usuario AS u ON b.idusuariocustodio = u.idusuario INNER JOIN departamento AS d ON b.iddepartamento = d.iddepartamento INNER JOIN tipocomprobante AS t ON b.idtipocomprobante = t.idtipocomprobante INNER JOIN fuentefinanciamiento AS f ON b.idfuentefinanciamiento = f.idfuentefinanciamiento INNER JOIN estadobien AS e ON b.idestadobien = e.idestadobien INNER JOIN ubicacion AS ub ON b.idubicacion = ub.idubicacion INNER JOIN clasificacionbien AS c ON b.idclasificacionbien = c.idclasificacionbien ORDER BY idbien";
$resultado = $mysqli->query($query1);
?>

<table>
        <tr>

        <th>Bien</th>
        <th>Interno</th>
        <th>Mined</th>
        <th>Itca</th>
        <th>Nombre</th>
        <th>Clasificacion</th>
        <th>Tipo</th>
        <th>Descripcion</th>
        <th>Marca</th>
        <th>Modelo</th>
        <th>Serie</th>
        <th>Ubicacion</th>
        <th>Costo</th>
        <th>Custodio</th>
        <th>Estado</th>
        <th>Financiamiento</th>
        <th>TipoComprob</th>
        <th>Numero</th>
        <th>Fechaadquisicion</th>
        <th>Departamento</th>
        <th>Observaciones</th>
        <th>Nombre</th>
        
        </tr>

        <?php 
/*while($row = $resultado->fetch_assoc())*/
        while ($row=mysqli_fetch_assoc($resultado)){
            ?>
        <tr>
            <td><?php echo $row['idbien']; ?></td>
            <td><?php echo $row['codigointerno']; ?></td>
            <td><?php echo $row['codigomined']; ?></td>
            <td><?php echo $row['codigoitca']; ?></td>
            <td><?php echo $row['nombre']; ?></td>
            <td><?php echo $row['idclasificacionbien']; ?></td>
            <td><?php echo $row['tipobien']; ?></td>
            <td><?php echo $row['descripcionbien']; ?></td>
            <td><?php echo $row['marca']; ?></td>
            <td><?php echo $row['modelo']; ?></td>
            <td><?php echo $row['serie']; ?></td>
            <td><?php echo $row['idubicacion']; ?></td>
            <td><?php echo $row['costobien']; ?></td>
            <td><?php echo $row['idusuariocustodio']; ?></td>
            <td><?php echo $row['estadobien']; ?></td>
            <td><?php echo $row['idfuentefinanciamiento']; ?></td>
            <td><?php echo $row['idtipocomprobante']; ?></td>
            <td><?php echo $row['numerocomprobante']; ?></td>
            <td><?php echo $row['fechaadquisicion']; ?></td>
            <td><?php echo $row['iddepartamento']; ?></td>
            <td><?php echo $row['observaciones']; ?></td>
            <td><?php echo $row['nombre']; ?></td>
        </tr>
            <?php
        }
        ?>
  
        <tr>
        <td></td>
        </tr>
</table>           
