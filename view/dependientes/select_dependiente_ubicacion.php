<?php    
  require_once '../../model/Ubicacion.php';
  $ubicacion = new Ubicacion();
  $idcustodio = $_POST['q'];
  
    echo '<i class="material-icons prefix">perm_identity</i>
            <select id="selidubicacion" class="validate" name="selidubicacion"  required>'.
      foreach($ubicacion->ListarUbicacionCustodioActivos($idcustodio) as $r): 
          echo '<option value="'.$r->idubicacion.'">'.$r->nombre.'</option>';
      endforeach;
    echo '<option value="">--> Seleccione un custodio <--</option>
        </select><label for="selidubicacion">Seleccione la ubicación de los bienes</label>';
?>