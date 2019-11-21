<?php 
  require_once 'model/Tipomovimiento.php';
  $model = new Tipomovimiento();
 ?>
<!-- cuerpo de registrar_usuario -->
  <div class="container">
    <div class="section">

      <!--   Icon Section   -->
      <div class="row">
        <div class="col s12">
            <h2 class="center  grey-text text-darken-3"><i class="medium material-icons">loop</i> 
             <?php echo $tipomovimiento->idtipomovimiento != null ? 'Editar '.$tipomovimiento->nombre : 'Registrar tipo de movimiento'; ?>
              
            </h2>

            <!-- formulario -->
            <div class="row">
              <form class="col s12" action="?c=Tipomovimiento&a=Guardar" method="post" enctype="multipart/form-data">
                <div class="row">

                 <input type="hidden" name="txtidtipomovimiento" value="<?php echo $tipomovimiento->idtipomovimiento; ?>" />

                  <div class="input-field col s12">
                    <i class="material-icons prefix">font_download</i>
                    <input id="txtnombre" type="text" class="validate" name="txtnombre" maxlength="30" onkeypress="return sololetras(event)" value="<?php echo $tipomovimiento->nombre; ?>" autofocus  required>
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
