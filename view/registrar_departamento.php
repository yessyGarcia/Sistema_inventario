<?php 
 require_once 'model/Departamento.php';
  $model = new Departamento();
 ?>

<!-- cuerpo de registrar_pelicula -->
  <div class="container">
    <div class="section">

      <!--   Icon Section   -->
      <div class="row">
        <div class="col s12">
            <h3 class="center gray-text"><i class="medium material-icons">home</i> 
            <?php echo $departamento->iddepartamento != null ? 'Editar '.$departamento->nombre : 'Registrar Departamento'; ?>
            </h3>

            <!-- formulario -->
            <div class="row">
              <form class="col s12" action="?c=Departamento&a=Guardar" method="post" enctype="multipart/form-data">
                <div class="row">

                <input type="hidden" name="txtiddepartamento" value="<?php echo $departamento->iddepartamento; ?>" />

                <div class="input-field col s6">
                    <i class="material-icons prefix">contacts</i>
                    <input id="txtnombre" type="text" class="validate" name="txtnombre" maxlength="30" onkeypress="return sololetras(event)" value="<?php echo $departamento->nombre; ?>" autofocus required>
                    <label for="txtnombre">Nombre</label>
                  </div>

                  

                  <div class="input-field col s6">
                    <i class="material-icons prefix">blur_linear</i>
                    <input id="txtcodigodepartamento" type="text" class="validate" name="txtcodigodepartamento" maxlength="20" onkeypress="return solonumeros(event)" value="<?php echo $departamento->codigodepartamento; ?>" required>
                    <label for="txtcodigodepartamento">Código de departamento</label>
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
