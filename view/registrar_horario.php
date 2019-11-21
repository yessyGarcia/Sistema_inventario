<?php 
  require_once 'model/Sala.php';
  $sala = new Sala();
  require_once 'model/Pelicula.php';
  $pelicula = new Pelicula();
 ?>
<!-- cuerpo de registrar_usuario -->
  <div class="container">
    <div class="section">

      <!--   Icon Section   -->
      <div class="row">
        <div class="col s12">
            <h2 class="center  grey-text text-darken-3"><i class="medium material-icons">event</i> 
              <!--si el atributo Alumno->id es diferente de nulo muestra el nombre-->
              <?php echo $horario->idhorario != null ? 'Editar '.$horario->nombre : 'Registrar Horario'; ?>
            </h2>

            <!-- formulario -->
            <div class="row">
              <form class="col s12" action="?c=Horario&a=Guardar" method="post" enctype="multipart/form-data">
                <div class="row">

                  <input type="hidden" name="txtIdpelicula" value="<?php echo $horario->idhorario; ?>" />

                  <div class="input-field col s6">
                    <input id="txtFechaPelicula" type="date" class="validate" name="txtFechaPelicula" value="<?php echo $horario->fechapelicula; ?>"  required>
                    <label for="txtFechaPelicula">Fecha de la Película</label>
                  </div>

                  <div class="input-field col s6">
                    <input id="txtHoraPelicula" type="text" class="validate" name="txtHoraPelicula" value="<?php echo $horario->horapelicula; ?>"  required>
                    <label for="txtHoraPelicula">Hora de la Película</label>
                  </div>

                  <div class="input-field col s6">
                    <select name="selPelicula" id="selPelicula">
                      <?php 
                        if ($horario->idpelicula != null) {

                          $objPelicula = $pelicula->ObtenerPelicula($horario->idpelicula);
                          
                          echo '<option value="'.$objPelicula->idpelicula.'" selected>'.$objPelicula->nombre.'</option>';

                        }
                      ?>
                      <?php foreach($pelicula->ListarPeliculaActivas() as $r): ?>
                          <option value="<?php echo $r->idpelicula; ?>"><?php echo $r->nombre; ?></option>
                      <?php endforeach; ?>
                      </select>
                    <label for="selPelicula">Película</label>
                  </div>

                    <div class="input-field col s6">
                      <select name="selSala" id="selSala">
                        <?php 
                          if ($horario->idsala != null) {
                            # mostrar el id y sala al inicio

                            $objSala = $sala->ObtenerSala($horario->idsala);
                            
                            echo '<option value="'.$objSala->idsala.'" selected>'.$objSala->nombre.'</option>';

                          }
                        ?>
                        <?php foreach($sala->ListarSalaActivas() as $r): ?>
                            <option value="<?php echo $r->idsala; ?>"><?php echo $r->nombre; ?></option>
                        <?php endforeach; ?>
                        </select>
                      <label for="selSala">Sala</label>
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
