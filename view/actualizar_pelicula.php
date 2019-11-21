<!-- cuerpo de registrar_pelicula -->
  <div class="container">
    <div class="section">

      <!--   Icon Section   -->
      <div class="row">
        <div class="col s12">
            <h2 class="center gray-text"><i class="medium material-icons">movie</i> 
              Actualizar Película
            </h2>

            <!-- formulario -->
            <div class="row">
              <form class="col s12" action="?c=Pelicula&a=Actualizar" method="post" enctype="multipart/form-data">
                <div class="row">

                  <input type="hidden" name="txtIdpelicula" value="<?php echo $pelicula->idpelicula; ?>" />

                  <div class="input-field col s6">
                    <input id="txtNombre" type="text" class="validate" name="txtNombre" value="<?php echo $pelicula->nombre; ?>"  required>
                    <label for="txtNombre">Nombre</label>
                  </div>
                  <div class="input-field col s6">
</i>
                    <input id="txtDuracion" type="text" class="validate" name="txtDuracion" value="<?php echo $pelicula->duracion; ?>"  required>
                    <label for="txtDuracion">Duración</label>
                  </div>

                  <div class="input-field col s6">
                    <input id="txtTipo" type="text" class="validate" name="txtTipo" value="<?php echo $pelicula->tipo; ?>"  required>
                    <label for="txtTipo">Tipo</label>
                  </div>

                  <div class="input-field col s6">

                    <input id="txtClasificacion" type="text" class="validate" name="txtClasificacion" value="<?php echo $pelicula->clasificacion; ?>"  required>
                    <label for="txtClasificacion">Clasificación</label>
                  </div>

                  <div class="input-field col s6">

                    <input id="txtDirector" type="text" class="validate" name="txtDirector" value="<?php echo $pelicula->director; ?>" required >
                    <label for="txtDirector">Director</label>
                  </div>  

                  <div class="input-field col s6">

                    <input id="txtReparto" type="text" class="validate" name="txtReparto" value="<?php echo $pelicula->reparto; ?>" required>
                    <label for="txtReparto">Reparto</label>
                  </div>  

                  <div class="input-field col s6">

                    <input id="txtDescripcion" type="text" class="validate" name="txtDescripcion" value="<?php echo $pelicula->descripcion; ?>" required>
                    <label for="txtDescripcion">Descripción</label>
                  </div> 

                  <div class="input-field col s6">

                    <input id="txtPrecio" type="text" class="validate" name="txtPrecio" value="<?php echo $pelicula->precio; ?>" required>
                    <label for="txtPrecio">Precio del boleto</label>
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
