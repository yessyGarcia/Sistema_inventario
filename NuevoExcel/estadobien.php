<?php

header("Content-type:application/xls");
header('Content-Disposition: attachment;filename="Estadobien.xls"');

require_once('conexion.php');

$query1 = "SELECT * FROM estadobien";
   $resultado = $mysqli->query($query1);

   ?>

<table>
        <tr>

        <th>Id</th>
        <th>Nombre</th>
      
       
        
        </tr>

        <?php 


while ($row=mysqli_fetch_assoc($resultado)){
    ?>
<tr>
    <td><?php echo $row['idestadobien']; ?></td>
    <td><?php echo $row['nombre']; ?></td>
  

    </tr>
            <?php
        }
        ?>
  
        <tr>
        <td></td>
        </tr>
</table>      