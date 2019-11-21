<?php 
  require_once 'model/Clasificacionbien.php';
  $model = new Clasificacionbien();
 ?>
<!-- cuerpo de registrar_usuario -->
  <div class="container">
    <div class="section">

      <!--   Icon Section   -->
      <div class="row">
        <div class="col s12">
            <h3 class="center  grey-text text-darken-3"><i class="medium material-icons">bookmark</i> 
              <!--si el atributo Alumno->id es diferente de nulo muestra el nombre-->
              <?php echo $clasificacionbien->idclasificacionbien != null ? 'Editar '.$clasificacionbien->nombre : 'Clasificación del bien'; ?>
            </h3>

            <!-- formulario -->
            <div class="row">
              <form class="col s12" action="?c=Clasificacionbien&a=Guardar" method="post" enctype="multipart/form-data">
                <div class="row">

                  <input type="hidden" name="txtidclasificacionbien" value="<?php echo $clasificacionbien->idclasificacionbien; ?>" />

                  <div class="input-field col s12">
                    <i class="material-icons prefix">font_download</i>
                    <input id="txtnombre" type="text" class="validate" name="txtnombre" maxlength="30" onkeypress="return sololetras(event)" value="<?php echo $clasificacionbien->nombre; ?>" autofocus  required>
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
