<?php 
  require_once 'model/Detallemovimiento.php';
  $detallemovimiento = new Detallemovimiento();
  require_once 'model/Movimiento.php';
  $movimiento = new Movimiento();
  require_once 'model/Bien.php';
  $bien = new Bien();
 ?>
<!-- cuerpo de registrar_usuario -->
  <div class="container">
    <div class="section">

      <!--   Icon Section   -->
      <div class="row">
        <div class="col s12">
            <h2 class="center  grey-text text-darken-3"><i class="medium material-icons">bookmark_border</i> 
              Registrar detalle del movimiento
            </h2>

            <!-- formulario -->
            <div class="row">
              <form class="col s12" action="?c=Detallemovimiento&a=Guardar" method="post" enctype="multipart/form-data">
                <div class="row">

                  <!--<input type="hidden" name="txtIdbutaca" value="<?php echo $butaca->idbutaca; ?>" />-->

                  <div class="input-field col s6">
              <i class="material-icons prefix">loop </i>
              <select id="selidmovimiento" class="validate" name="selidmovimiento"  required>
              <?php 
              if ($detallemovimiento->idmovimiento != null) {
                         
                  $objMovimiento = $movimiento->ObtenerMovimiento($detallemovimiento->idmovimiento);
                           
                  echo '<option value="'.$objMovimiento->idmovimiento.'" selected>'.$objMovimiento->idtipomovimiento.'</option>';
                    }
                   ?> 
                   <?php foreach($movimiento->ListarMovimientoActivas() as $r): ?>
                      <option value="<?php echo $r->idmovimiento; ?>"><?php echo $r->idmovimiento; ?>-<?php echo $r->idtipomovimiento; ?></option>
                  <?php endforeach; ?>
              </select>
              <label for="selidmovimiento">Movimiento</label>
            </div>

            <div class="input-field col s6">
              <i class="material-icons prefix">book</i>
              <select id="selidbien" class="validate" name="selidbien"  required>
              <?php 
              if ($bien->idbien != null) {
                         
                  $objBien = $bien->ObtenerBien($bien->idbien);
                           
                  echo '<option value="'.$objBien->idbien.'" selected>'.$objBien->tipobien.'</option>';
                    }
                   ?> 
                   <?php foreach($bien->ListarBienActivos() as $r): ?>
                      <option value="<?php echo $r->idbien; ?>"><?php echo $r->idbien; ?>-<?php echo $r->tipobien; ?></option>
                  <?php endforeach; ?>
              </select>
              <label for="selidbien">Bien</label>
            </div>
                   
                  
                  <div class="input-field col s12 center">
                  <button type="submit" class="waves-effect waves-light btn grey darken-2"><i class="material-icons right">send</i>Guardar</button>
                  </div>

                </div>
              </form>
            </div>

        </div>

      </div>

    </div>
    <br><br>
  </div>
