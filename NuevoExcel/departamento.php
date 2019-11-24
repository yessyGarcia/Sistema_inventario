<?php

header("Content-type:application/xls");
header('Content-Disposition: attachment;filename="Departamento.xls"');

require_once('conexion.php');

$query1 = "SELECT * FROM departamento";
   $resultado = $mysqli->query($query1);

   ?>

<table>
        <tr>

        <th>Id</th>
        <th>Nombre</th>
        <th>Codigo</th>
       
        
        </tr>

        <?php 


while ($row=mysqli_fetch_assoc($resultado)){
    ?>
<tr>
    <td><?php echo $row['iddepartamento']; ?></td>
    <td><?php echo $row['nombre']; ?></td>
    <td><?php echo $row['codigodepartamento']; ?></td>

    </tr>
            <?php
        }
        ?>
  
        <tr>
        <td></td>
        </tr>
</table>      