<!-- cuerpo de registrar_usuario -->
<div class="container">
    <div class="section">

      <!--   Icon Section   -->
      <div class="row">
        <div class="col s12">
            <h2 class="center grey-text text-darken-2"><i class="medium material-icons">account_circle</i> 
              Editar Clave
            </h2>

            <!-- formulario -->
            <div class="row">
              <form class="col s12" action="?c=Usuario&a=EditarCLave" method="post" enctype="multipart/form-data">
                <div class="row">

                  <input type="hidden" name="txtIdusuario" value="<?php echo $_SESSION['id']; ?>" />

                  

                  <div class="input-field col s6">

                    <input id="txtContrasena1" type="password" class="validate" name="txtContrasena1" maxlength="8" onkeypress="return letrasynumerosClave(event)" autofocus>
                    <label for="txtContrasena1">Nueva Clave</label>
                  </div>

                  <div class="input-field col s6">

                    <input id="txtContrasena2" type="password" class="validate" name="txtContrasena2" maxlength="8" onkeypress="return letrasynumerosClave(event)" onchange="return compararclave(txtContrasena1,txtContrasena2)" required>
                    <label for="txtContrasena2">Confirmar Nueva Clave</label>
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
