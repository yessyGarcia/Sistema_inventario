<?php

header("Content-type:application/xls");
header('Content-Disposition: attachment;filename="Usuario.xls"');

require_once('conexion.php');

$query1 = "SELECT * FROM usuario";
   $resultado = $mysqli->query($query1);

   ?>

<table>
        <tr>

        <th>Id</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Email</th>
       
        
        </tr>

        <?php 


while ($row=mysqli_fetch_assoc($resultado)){
    ?>
<tr>
    <td><?php echo $row['idusuario']; ?></td>
    <td><?php echo $row['nombre']; ?></td>
    <td><?php echo $row['apellido']; ?></td>
    <td><?php echo $row['email']; ?></td>

    </tr>
            <?php
        }
        ?>
  
        <tr>
        <td></td>
        </tr>
</table>      