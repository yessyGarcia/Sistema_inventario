<!-- cuerpo de registrar_usuario -->
  <div class="container">
    <div class="section">

      <!--   Icon Section   -->
      <div class="row">
        <div class="col s12">
            <h2 class="center gray-text"><i class="medium material-icons">shopping_cart</i> 
              <!--si el atributo Alumno->id es diferente de nulo muestra el nombre-->
              <?php echo $cliente->idcliente != null ? 'Editar '.$cliente->nombre : 'Registrar Cliente'; ?>
            </h2>

            <!-- formulario -->
            <div class="row">
              <form class="col s12" action="?c=Cliente&a=Guardar" method="post" enctype="multipart/form-data">
                <div class="row">

                  <input type="hidden" name="txtIdcliente" value="<?php echo $cliente->idcliente; ?>" />

                  <div class="input-field col s6">
                    <input id="txtNombre" type="text" class="validate" name="txtNombre" value="<?php echo $cliente->nombre; ?>"  required>
                    <label for="txtNombre">Nombre</label>
                  </div>
                  <div class="input-field col s6">
                    <input id="txtApellido" type="text" class="validate" name="txtApellido" value="<?php echo $cliente->apellido; ?>"  required>
                    <label for="txtApellido">Apellido</label>
                  </div>

                  <div class="input-field col s6">
                    <input id="txtEmail" type="email" class="validate" name="txtEmail" value="<?php echo $cliente->email; ?>"  required>
                    <label for="txtEmail">Email</label>
                  </div>

                  <div class="input-field col s6">

                    <input id="txtContrasena1" type="password" class="validate" name="txtContrasena1" value="<?php echo $cliente->clave; ?>"  required onfocus="select()">
                    <label for="txtContrasena1">Contraseña</label>
                  </div>

                  <div class="input-field col s6">

                    <input id="txtContrasena2" type="password" class="validate" name="txtContrasena2" value="<?php echo $cliente->clave; ?>" required onfocus="select()">
                    <label for="txtContrasena2">Confirmar Contraseña</label>
                  </div>  

                  <div class="input-field col s6">

                    <input id="txtIdentificacion" type="text" class="validate" name="txtIdentificacion" value="<?php echo $cliente->identificacion; ?>" required onfocus="select()">
                    <label for="txtIdentificacion">Número de Identificación</label>
                  </div>   

                  <div class="input-field col s6">

                    <input id="txtTarjeta" type="text" class="validate" name="txtTarjeta" value="<?php echo $cliente->tarjeta; ?>" required onfocus="select()">
                    <label for="txtTarjeta">Número de Tajeta</label>
                  </div>  

                  <div class="input-field col s6">

                    <input id="txtFechavencimientotarjeta" type="date" class="validate" name="txtFechavencimientotarjeta" value="<?php echo $cliente->fechavencimientotarjeta; ?>" required onfocus="select()">
                    <label for="txtFechavencimientotarjeta">Fecha de vencimiento de la Tajeta</label>
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
