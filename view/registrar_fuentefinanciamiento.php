<?php 
  require_once 'model/Fuentefinanciamiento.php';
  $model = new Fuentefinanciamiento();
 
 ?>
<!-- cuerpo de registrar_usuario -->
  <div class="container">
    <div class="section">

      <!--   Icon Section   -->
      <div class="row">
        <div class="col s12">
            <h3 class="center  grey-text text-darken-3"><i class="medium material-icons">account_balance</i> 
              <!--si el atributo Alumno->id es diferente de nulo muestra el nombre-->
              <?php echo $fuentefinanciamiento->idfuentefinanciamiento != null ? 'Editar '.$fuentefinanciamiento->nombre : 'Registrar fuente de financiamiento'; ?>
            </h3>

            <!-- formulario -->
            <div class="row">
              <form class="col s12" action="?c=Fuentefinanciamiento&a=Guardar" method="post" enctype="multipart/form-data">
                <div class="row">

                  <input type="hidden" name="txtidfuentefinanciamiento" value="<?php echo $fuentefinanciamiento->idfuentefinanciamiento; ?>" />

                  <div class="input-field col s6">
                    <i class="material-icons prefix">font_download</i>
                    <input id="txtnombre" type="text" class="validate" name="txtnombre" maxlength="30" onkeypress="return sololetras(event)" value="<?php echo $fuentefinanciamiento->nombre; ?>" autofocus required>
                    <label for="txtnombre">Nombre</label>
                  </div>

                  <div class="input-field col s6">
                    <i class="material-icons prefix">art_track </i>
                    <input id="txtcodigofuentefinanciamiento" type="text" class="validate" name="txtcodigofuentefinanciamiento" maxlength="20" onkeypress="return solonumeros(event)" value="<?php echo $fuentefinanciamiento->codigofuentefinanciamiento; ?>" required>
                    <label for="txtcodigofuentefinanciamiento">Código fuente de financiamiento</label>
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
