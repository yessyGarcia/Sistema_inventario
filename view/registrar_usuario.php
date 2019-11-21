<?php 
 require_once 'model/Usuario.php';
  $usuario = new Usuario();
  require_once 'model/Tipousuario.php';
  $tipousuario = new Tipousuario();
 
 ?>
 <!-- cuerpo de registrar_usuario -->
  <div class="container">
    <div class="section">

      <!--   Icon Section   -->
      <div class="row">
        <div class="col s12">
            <h2 class="center gray-text"><i class="medium material-icons">person_add</i> 
              <!--si el atributo Alumno->id es diferente de nulo muestra el nombre-->
            Registrar Usuario
            </h2>

            <!-- formulario -->
            <div class="row">
              <form class="col s12" id="validationForm" name="validationForm" action="?c=Usuario&a=Guardar" method="post" enctype="multipart/form-data">
                <div class="row">

               <input type="hidden" name="txtidusuario"/>

                  <div class="input-field col s6">
                    <i class="material-icons prefix">person</i>
                    <input class="tf w-input" id="txtnombre" type="text" class="validate" name="txtnombre" maxlength="30" onkeypress="return sololetras(event)" autofocus required>
                    <label for="txtnombre">Nombre</label>

                    </div>

                  <div class="input-field col s6">
                    <i class="material-icons prefix">perm_identity</i>
                    <input id="txtapellido" type="text" class="validate" name="txtapellido" maxlength="40" onkeypress="return sololetras(event)" required>
                    <label for="txtapellido">Apellido</label>
                  </div>

                  <div class="input-field col s6"> 
                  <i class="material-icons prefix">mail_outline</i>
                    <input id="txtemail" type="email" class="validate" name="txtemail" maxlength="50" required>
                    <label for="txtemail">Email</label>
                  </div>

                  <div class="input-field col s6"> 
                  <i class="material-icons prefix">mail_outline</i>
                    <input id="txtemail2" type="email" class="validate" name="txtemail2" maxlength="50" onfocus="return validaremail(txtemail)" onchange="return compararemail(txtemail,txtemail2)" required>
                    <label for="txtemail2">Confirmar Email</label>
                  </div>

                 <div class="input-field col s6"> 
                  <i class="material-icons prefix">blur_circular</i>
                    <input id="txtclave" type="password" class="validate" name="txtclave" onfocus="return validaremail(txtemail2)" maxlength="8" onkeypress="return letrasynumerosClave(event)" required>
                    <label for="txtclave">Clave</label>
                  </div>

                <div class="input-field col s6">
                  <i class="material-icons prefix">blur_circular</i>
                    <input id="txtclave2" type="password" class="validate" name="txtclave2" maxlength="8" onkeypress="return letrasynumerosClave(event)" onchange="return compararclave(txtclave,txtclave2)" onfocus="select()">
                    <label for="txtclave2">Confirmar Clave</label>
                  </div> 

                  <div class="input-field col s6">
                  <i class="material-icons prefix">bookmark</i>
                   <select name="selidtipousuario" id="selidtipousuario"  >
                 <?php 
                        if ($usuario->idtipousuario != null) {
                         
                          $objTipousuario = $tipousuario->ObtenerTipousuario($usuario->idtipousuario);
                           
                          echo '<option value="'.$objTipousuario->idtipousuario.'" selected>'.$objTipousuario->nombre.'</option>';
                    }
                   ?> 
                   <?php foreach($tipousuario->ListarTipousuarioActivas() as $r): ?>
                      <option value="<?php echo $r->idtipousuario; ?>"><?php echo $r->idtipousuario; ?>-<?php echo $r->nombre; ?></option>
                  <?php endforeach; ?>
                  </select>
                      <label for="selidtipousuario">Tipo de usuario</label>
                  </div>
      
                  <div class="input-field col s12">
                  <div class="input-field col s12 center">
                  <button type="submit" class="waves-effect waves-light btn grey"><i class="material-icons right">send</i>Guardar</button>
                  </div>
                  </div>
                </div>
              </form>
            </div>

        </div>

      </div>

    </div>
    <br><br>
  </div>
