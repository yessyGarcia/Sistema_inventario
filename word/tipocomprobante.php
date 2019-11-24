<?php

header("Content-type:application/vnd.ms-word");
header('Content-Disposition: attachment;filename="Tipocomprobante.doc"');

require_once('conexion.php');

$query1 = "SELECT * FROM tipocomprobante";
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
    <td><?php echo $row['idtipocomprobante']; ?></td>
    <td><?php echo $row['nombre']; ?></td>
  

    </tr>
            <?php
        }
        ?>
  
        <tr>
        <td></td>
        </tr>
</table>      