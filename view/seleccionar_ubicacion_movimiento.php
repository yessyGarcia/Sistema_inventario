<?php 
 
  require_once 'model/Ubicacion.php';
  $ubicacion = new Ubicacion();
  
 ?>
 <!-- cuerpo de registrar_usuario -->
<div class="container">
    <div class="section">

      <!--   Icon Section   -->
      <div class="row">
        <div class="col s12">
            <h2 class="center gray-text text-darken-2"><i class="medium material-icons">loop</i> 
              Registrar Movimiento
            </h2>

                <!-- formulario -->
                <div class="row">
                  <form class="col s12" action="?c=Movimiento&a=CrudCustodio" method="post" enctype="multipart/form-data">
                    <div class="row">

                 <div class="input-field col s8">
                  <i class="material-icons prefix">perm_identity</i>
                  <select id="selidubicacion" class="validate" name="selidubicacion"  required>
                      <?php foreach($ubicacion->ListarUbicacionCustodioActivos($_SESSION['id']) as $r): ?>
                          <option value="<?php echo $r->idubicacion; ?>"><?php echo $r->nombre; ?></option>
                      <?php endforeach; ?>
                  </select>
                  <label for="selidubicacion">Seleccione la ubicación de los bienes</label>
                </div>

                  <div class="input-field col s4 ">
                    <button id="boton-enviar" type="submit" class="waves-effect waves-light btn grey darken-2"><i class="material-icons right">send</i>Enviar</button>
                  </div>
                  

                </div>
              </form>
            </div>

        </div>

      </div>

    </div>
    <br><br><br><br><br><br><br><br>
  </div>
