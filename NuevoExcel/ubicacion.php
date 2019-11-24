<?php

header("Content-type:application/xls");
header('Content-Disposition: attachment;filename="Ubicacion.xls"');

require_once('conexion.php');

$query1 = "SELECT * FROM ubicacion";
   $resultado = $mysqli->query($query1);

   ?>

<table>
        <tr>

        <th>Id</th>
        <th>Nombre</th>
        <th>Descripcion</th>
       
        
        </tr>

        <?php 


while ($row=mysqli_fetch_assoc($resultado)){
    ?>
<tr>
    <td><?php echo $row['idubicacion']; ?></td>
    <td><?php echo $row['nombre']; ?></td>
    <td><?php echo $row['descripcion']; ?></td>

    </tr>
            <?php
        }
        ?>
  
        <tr>
        <td></td>
        </tr>
</table>      