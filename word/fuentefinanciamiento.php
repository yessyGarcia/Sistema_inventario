<?php

header("Content-type:application/vnd.ms-word");
header('Content-Disposition: attachment;filename="Fuentefinanciamiento.doc"');

require_once('conexion.php');

$query1 = "SELECT * FROM fuentefinanciamiento";
   $resultado = $mysqli->query($query1);

   ?>

<table>
        <tr>

        <th>Id</th>
        <th>Nombre</th>
        <th>Codigofuentefinanciamiento</th>
       
        
        </tr>

        <?php 


while ($row=mysqli_fetch_assoc($resultado)){
    ?>
<tr>
    <td><?php echo $row['idfuentefinanciamiento']; ?></td>
    <td><?php echo $row['nombre']; ?></td>
    <td><?php echo $row['codigofuentefinanciamiento']; ?></td>

    </tr>
            <?php
        }
        ?>
  
        <tr>
        <td></td>
        </tr>
</table>      