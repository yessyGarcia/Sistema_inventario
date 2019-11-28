<?php

header("Content-type:application/vnd.ms-word");
header('Content-Disposition: attachment;filename="Ubicacion.doc"');

require_once('conexion.php');

$query1 = "SELECT * FROM ubicacion";
   $resultado = $mysqli->query($query1);

   ?>

<table>
        <tr>

        <th>Id</th>
        <th>Nombre</th>
        <th>Descripción</th>
       
        
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