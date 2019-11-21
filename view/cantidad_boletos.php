  <div class="row grey darken-3 white-text">

      <!-- Datos de la película -->
      <div class="container">
                <table>
                  <tbody>
                      <tr>
                          <td class="center" rowspan="3"><img class="materialboxed" src="view/include/peliculas/<?php echo $horario->imagen; ?>" alt="Imagen"></td>
                          <td ><h3><?php echo $horario->nombrepelicula; ?></h3></td>  
                      </tr>
                      <tr>
                          <td><b>Fecha:</b> <?php echo $horario->fechapelicula; ?> </td>
                      </tr>
                      <tr>
                          <td><b>Hora:</b> <?php echo $horario->horapelicula; ?> | <b>Sala:</b> <?php echo $horario->sala; ?></td>  
                      </tr>
                  </tbody>
                </table>
              </div>

      </div>

      <!-- Horarios de la película -->
      <div class="container">
              <!-- tabla de activos -->
              <div id="activas" class="col s12">
                <table class="striped">
                  <thead>
                      <tr>
                          <th>Precio Boleto ($)</th>
                          <th>Cantidad</th>
                          <th>Total ($)</th>
                          <th class="center">Butacas</th>
                      </tr>
                  </thead>                  
                    <form class="col s12" action="?c=Boletousuario&a=VerButacas" method="post" enctype="multipart/form-data">
                    
                    <input type="hidden" name="txtIdhorario" value="<?php echo $horario->idhorario; ?>" />
                    <input type="hidden" name="txtIdsala" value="<?php echo $horario->idsala; ?>" />
                  <tbody>
                      <tr>
                          <td><input id="txtPrecioBoleto" type="text"  name="txtPrecioBoleto" value="<?php echo $horario->precio; ?>" readonly></td>
                          <td class="center"><i class="material-icons center" id="mas">add_circle</i><input id="txtCantidadBoleto" type="text" name="txtCantidadBoleto" value="1" size="5" required readonly><i class="material-icons center" id="menos">do_not_disturb_on</i></td>
                          <td><input id="txtTotal" type="text" name="txtTotal" value="<?php echo $horario->precio; ?>" readonly></td>
                          <td class="center">
                          <button title="Pagar Boletos" class="btn grey darken-2 waves-effect waves-light" type="submit" name="action">Elegir Butacas<i class="material-icons right">airline_seat_recline_extra</i></button>
                          </td>
                      </tr>
                  </tbody>
                  </form>
                </table>
              </div>
      </div>

    </div>
    <br><br><br>
  </div>