<?php 
 require_once 'model/Ubicacion.php';
  $model = new Ubicacion();
 ?>

<!-- cuerpo de registrar_pelicula -->
  <div class="container">
    <div class="section">

      <!--   Icon Section   -->
      <div class="row">
        <div class="col s12">
            <h3 class="center gray-text"><i class="medium material-icons">location_on</i> 
            <?php echo $ubicacion->idubicacion != null ? 'Editar '.$ubicacion->nombre : 'Registrar ubicación'; ?>
            </h3>

            <!-- formulario -->
            <div class="row">
              <form class="col s12" action="?c=Ubicacion&a=Guardar" method="post" enctype="multipart/form-data">
                <div class="row">

                <input type="hidden" name="txtidubicacion" value="<?php echo $ubicacion->idubicacion; ?>" />

                <div class="input-field col s6">
                    <i class="material-icons prefix">contacts</i>
                    <input id="txtnombre" type="text" class="validate" name="txtnombre" maxlength="4" onkeypress="return letrasynumeros(event)" value="<?php echo $ubicacion->nombre; ?>" autofocus required>
                    <label for="txtnombre">Nombre</label>
                  </div>

                  

                  <div class="input-field col s6">
                    <i class="material-icons prefix">blur_linear</i>
                    <input id="txtdescripcion" type="text" class="validate" name="txtdescripcion" maxlength="60" onkeypress="return letrasynumeros(event)" value="<?php echo $ubicacion->descripcion; ?>" required>
                    <label for="txtdescripcion">Descripción</label>
                  </div>

                  <div class="input-field col s12 center">
                  <button type="submit" class="waves-effect waves-light btn grey"><i class="material-icons right">send</i>Guardar</button>
                  </div>

                </div>
              </form>
            </div>

        </div>

      </div>

    </div>
    <br><br>
  </div>
