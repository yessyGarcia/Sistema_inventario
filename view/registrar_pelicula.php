<!-- cuerpo de registrar_pelicula -->
  <div class="container">
    <div class="section">

      <!--   Icon Section   -->
      <div class="row">
        <div class="col s12">
            <h2 class="center gray-text"><i class="medium material-icons">movie</i> 
              Registrar Película
            </h2>

            <!-- formulario -->
            <div class="row">
              <form class="col s12" action="?c=Pelicula&a=Guardar" method="post" enctype="multipart/form-data">
                <div class="row">

                  <div class="input-field col s6">
                    <input id="txtNombre" type="text" class="validate" name="txtNombre"   required>
                    <label for="txtNombre">Nombre</label>
                  </div>

                  <div class="file-field input-field col s6">
                    <div class="btn grey">
                      <span>Imagen</span>
                      <input type="file" name="txtImagen" accept=".jpg">
                    </div>
                    <div class="file-path-wrapper">
                      <input class="file-path validate" type="text" placeholder="Subir imagen" required>
                    </div>
                  </div>

                  <div class="input-field col s6">
                    <input id="txtDuracion" type="text" class="validate" name="txtDuracion"  required>
                    <label for="txtDuracion">Duración</label>
                  </div>

                  <div class="input-field col s6">
                    <input id="txtTipo" type="text" class="validate" name="txtTipo"   required>
                    <label for="txtTipo">Tipo</label>
                  </div>

                  <div class="input-field col s6">

                    <input id="txtClasificacion" type="text" class="validate" name="txtClasificacion"  required>
                    <label for="txtClasificacion">Clasificación</label>
                  </div>

                  <div class="input-field col s6">

                    <input id="txtDirector" type="text" class="validate" name="txtDirector" required >
                    <label for="txtDirector">Director</label>
                  </div>  

                  <div class="input-field col s6">
                    <input id="txtReparto" type="text" class="validate" name="txtReparto"  required>
                    <label for="txtReparto">Reparto</label>
                  </div>  

                  <div class="input-field col s6">
                    <input id="txtDescripcion" type="text" class="validate" name="txtDescripcion"  required>
                    <label for="txtDescripcion">Descripción</label>
                  </div> 

                  <div class="input-field col s6">
                    <input id="txtPrecio" type="text" class="validate" name="txtPrecio"  required>
                    <label for="txtPrecio">Precio del boleto</label>
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
