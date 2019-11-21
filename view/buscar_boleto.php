<!-- cuerpo de buscar boleto -->
  <div class="container">
    <div class="section">

      <!--   Icon Section   -->
      <div class="row">
        <div class="col s12">
            <h2 class="center grey-text text-darken-3"><i class="medium material-icons">airplay</i> 
              Búsqueda de boletos
            </h2>

            <!-- formulario -->
            <div class="row">
              <form class="col s12" action="?c=Boletousuario&a=ImprimirBoletos" method="post" enctype="multipart/form-data" target="_blank">
                <div class="row">

                <div class="input-field col s8 center offset-s2">
                    <input autofocus id="txtCodigoCompra" type="number" class="validate" name="txtCodigoCompra" required>
                    <label for="txtCodigoCompra">Código de Compra</label>
                  </div>

                  <div class="input-field col s12 center">
                  <button type="submit" class="waves-effect waves-light btn grey darken-2"><i class="material-icons right">search</i>Buscar</button>
                  
                  <button type="reset" class="waves-effect waves-light btn grey"><i class="material-icons right">autorenew</i>Nueva Búsqueda</button>
                  </div>

                </div>
              </form>
            </div>

        </div>

      </div>

    </div>
    <br><br><br>
  </div>
