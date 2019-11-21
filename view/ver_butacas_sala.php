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
                          <td><b>Fecha:</b> <?php echo $horario->fechapelicula; ?> | <b>Hora:</b> <?php echo $horario->horapelicula; ?> | <b>Sala:</b> <?php echo $horario->sala; ?> </td>
                      </tr>
                      <tr>
                          <td><b>Boletos:</b> <?php echo $_REQUEST['txtCantidadBoleto']; ?> | <b>Total a Pagar:</b> $ <?php echo $_REQUEST['txtTotal']; ?></td>  
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
                          <th>Elija la(s) butaca(s) que desea utilizar</th>
                      </tr>
                  </thead>                  
                    <form name="fbutacas" class="col s12" action="?c=Boletousuario&a=DatosPago" method="post" enctype="multipart/form-data">
                    
                    <input type="hidden" name="txtIdhorario" value="<?php echo $horario->idhorario; ?>" />
                    <input type="hidden" name="txtIdsala" value="<?php echo $horario->idsala; ?>" />
                    <input id="txtCantidadBoleto" type="hidden" name="txtCantidadBoleto" value="<?php echo $_REQUEST['txtCantidadBoleto']; ?>">
                    <input id="clickCantidadBoleto" type="hidden" name="clickCantidadBoleto" value="0">
                    <input id="txtTotal" type="hidden" name="txtTotal" value="<?php echo $_REQUEST['txtTotal']; ?>">
                  <tbody>
                      <tr>
                          <td class="center red darken-4 white-text">
                              <h5>PANTALLA</h5>
                          </td>                          
                          <td class="center">
                            <h5>Sus butacas</h5>                            
                          </td>
                      </tr>
                      <tr>
                          <td style="vertical-align: top;">
                            <?php foreach($this->modelSala->ListarButacaSala($horario->idsala) as $r): ?>
                              <a onclick="seleccionarButaca(this)"  class="waves-effect waves-light btn-small <?php echo $r->estado == 1 ? "" : "disabled"; ?> tooltipped seleccionar" data-position="bottom" data-tooltip="<?php echo $r->estado != 2 ? "Disponible" : "Reservado"; ?>" data-id="<?php echo $r->idbutaca; ?>" data-name="<?php echo $r->nombre; ?>" data-click="null"><i class="material-icons left">airline_seat_recline_extra</i><?php echo $r->nombre; ?></a>                             
                            <?php endforeach;?>
                            
                            <input id="txtNumeroButacas" type="hidden" name="txtNumeroButacas" value="<?php echo $numeroButacas; ?>">
                          </td>                         
                          <td class="center" rowspan="2">
                            <?php 
                              for ($i=1; $i <= $_REQUEST['txtCantidadBoleto']; $i++) { 
                                #imprimir los input para las butacas
                                echo '
                                <input id="txtButaca'.$i.'" type="hidden" name="txtButaca'.$i.'" value="">
                                <input id="txtNombreButaca'.$i.'" type="text" name="txtNombreButaca'.$i.'"  value="Butaca'.$i.'" readonly style="display:block;border-radius: 8px;  background:#eeeeee; text-align:center;" >';
                              }
                            ?>
                            <button onclick="location.reload();" title="Iniciar de nuevo" class="btn green darken-2 waves-effect waves-light" type="button" name="action">Cambiar Butacas<i class="material-icons right">reply</i></button><br><br>

                            <button title="Pagar Boletos" class="btn grey darken-2 waves-effect waves-light" type="submit" name="action">Datos de Pago<i class="material-icons right">monetization_oncredit_card</i></button>
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

<script>
//para seleccionar las butacas
function seleccionarButaca(butaca) {
  //tomar el id de la butaca 
  var idbutaca = butaca.getAttribute('data-id');
  //tomar el nombre de la butaca 
  var nombrebutaca = butaca.getAttribute('data-name');
  //tomar el estado de la selección de la butaca (null es disponible; 1 es seleccionada)
  var click = butaca.getAttribute('data-click');
  //tomar la cantidad de butacas que puede seleccionar
  var cantidadBoletos = parseInt(document.getElementById("txtCantidadBoleto").value);
  //tomar la cantidad de butacas que Ya seleccionó (inicia siempre en 0)
  var cantidadBoletosSeleccionados = parseInt(document.getElementById("clickCantidadBoleto").value);

  //validar la selección de las butacas y la cantidad de estas
  if (click == 'null' && cantidadBoletosSeleccionados < cantidadBoletos) {
    //cambiar el estilo de la butaca seleccionada
    butaca.style.background = '#eee';
    butaca.style.color = '#000';
    butaca.style.border = 'solid 1px #000';
 
    //cambiar el estado de la butaca seleccionada
    butaca.setAttribute('data-click', '1');

    //definir el número del conteo de boletos
    var numero = parseInt(document.fbutacas.clickCantidadBoleto.value) + 1;

    //asignar al campo oculto el id de la butaca seleccionada
    document.getElementById("txtButaca"+numero).value = idbutaca;

    //asignar el nuevo número del conteo de boletos
    document.fbutacas.clickCantidadBoleto.value = numero;
    document.getElementById("txtNombreButaca"+numero).value = nombrebutaca;
    document.getElementById("txtNombreButaca"+numero).style.background = '#b71c1c';
    document.getElementById("txtNombreButaca"+numero).style.color = '#fff';
  } else {
    alert('Ya seleccionó esta butaca o ya no puede seleccionar otra.\nSi desea cambiar su selección debe dar click en\nCAMBIAR BUTACAS');
  }

}
</script>