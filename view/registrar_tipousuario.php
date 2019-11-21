﻿<?php 
  require_once 'model/Tipousuario.php';
  $model = new Tipousuario();
 
 ?>
<!-- cuerpo de registrar_usuario -->
  <div class="container">
    <div class="section">

      <!--   Icon Section   -->
      <div class="row">
        <div class="col s12">
            <h2 class="center  grey-text text-darken-3"><i class="medium material-icons">bookmark</i> 
            <?php echo $tipousuario->idtipousuario != null ? 'Editar '.$tipousuario->nombre : 'Registrar tipo de usuario'; ?>
              
            </h2>

            <!-- formulario -->
            <div class="row">
              <form class="col s12" action="?c=Tipousuario&a=Guardar" method="post" enctype="multipart/form-data">
                <div class="row">

                 <input type="hidden" name="txtidtipousuario" value="<?php echo $tipousuario->idtipousuario; ?>" />

                  <div class="input-field col s12">
                    <i class="material-icons prefix">font_download</i>
                    <input id="txtnombre" type="text" class="validate" name="txtnombre"maxlength="30" onkeypress="return sololetras(event)" value="<?php echo $tipousuario->nombre; ?>" autofocus  required>
                    <label for="txtnombre">Nombre</label>
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
