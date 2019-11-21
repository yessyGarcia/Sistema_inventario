<?php 
  require_once 'model/Movimiento.php';
  $movimiento = new Movimiento();
  require_once 'model/Bien.php';
  $bien = new Bien();
  require_once 'model/Tipomovimiento.php';
  $tipomovimiento = new Tipomovimiento();
  require_once 'model/Usuario.php';
  $objUsuario = new Usuario();
  require_once 'model/Ubicacion.php';
  $objUbicacion = new Ubicacion();
  require_once 'model/Departamento.php';
  $objDepartamento = new Departamento();
  
 ?>
 <!-- cuerpo de registrar_usuario -->
<div class="container">
    <div class="section">

      <!--   Icon Section   -->
      <div class="row">
        <div class="col s12">
            <h2 class="center gray-text text-darken-2"><i class="medium material-icons">loop</i> 
              Registrar Movimiento
            </h2>

                <!-- formulario -->
                <div class="row">
                  <form class="col s12" action="?c=Movimiento&a=Guardar" method="post" enctype="multipart/form-data">
                    <div class="row">

                    <input id="txtCantidadBien" type="hidden" name="txtCantidadBien" value="0">
            
                  <div class="input-field col s12">
                    <a href="?c=Movimiento&a=Seleccionar_Custodio" class="grey darken-2 waves-effect waves-light btn-small"><i class="material-icons left">arrow_back</i>Seleccionar otro</a>

                  </div>

                      <div class="input-field col s6">
                  <i class="material-icons prefix">event_note</i>
                  <input id="txtfechatraslado" type="date" class="validate" name="txtfechatraslado" autofocus required>
                  <label for="txtfechatraslado">Fecha de traslado</label>
                </div>

                <div class="input-field col s6">
                  <i class="material-icons prefix">perm_identity</i>
                  <select id="selidusuariocustodio" class="validate" name="selidusuariocustodio" disabled>
                  <?php 
                            if ($usuario->idusuario != null) {
                                                          
                              echo '<option value="'.$usuario->idusuario.'" selected>'.$usuario->nombre.' '.$usuario->apellido.'</option>';
                            }
                      ?> 
                  </select>
                  <label for="selidusuariocustodio">Activo asignado a</label>
                </div>

                <div class="input-field col s6">
                  <i class="material-icons prefix">person_pin_circle</i>
                  <select id="selidubicacion" class="validate" name="selidubicacion" disabled>
                  <?php 
                            if ($ubicacion->idubicacion != null) {
                                                          
                              echo '<option value="'.$ubicacion->idubicacion.'" selected>'.$ubicacion->nombre.'</option>';
                            }
                      ?> 
                  </select>
                  <label for="selidubicacion">Ubicación Actual</label>
                </div>

                <div class="input-field col s6">
                  <i class="material-icons prefix">person</i>
                  <select id="selidusuarionuevocustodio" class="validate" name="selidusuarionuevocustodio"  required>
                      <?php foreach($objUsuario->ListarUsuarioActivas() as $r): ?>
                          <option value="<?php echo $r->idusuario; ?>"><?php echo $r->nombre.' '.$r->apellido; ?></option>
                      <?php endforeach; ?>
                  </select>
                  <label for="selidusuarionuevocustodio">Nuevo Custodio</label>
                </div>

              <div class="input-field col s6">
              <i class="material-icons prefix">location_on</i>
              <select id="seldestino" class="validate" name="seldestino"  required>
               <?php foreach($objUbicacion->ListarUbicacionActivos() as $r): ?>
                      <option value="<?php echo $r->idubicacion; ?>"><?php echo $r->nombre; ?></option>
                  <?php endforeach; ?>
                </select>
              <label for="seldestino">Destino</label>
            </div>
            
            <div class="input-field col s6">
                  <i class="material-icons prefix">loop</i>
                  <select id="selidtipomovimiento" class="validate" name="selidtipomovimiento"  required>
                      <?php foreach($tipomovimiento->ListarTipomovimientoActivas() as $r): ?>
                          <option value="<?php echo $r->idtipomovimiento; ?>"><?php echo $r->idtipomovimiento; ?>-<?php echo $r->nombre; ?></option>
                      <?php endforeach; ?>
                  </select>
                  <label for="selidtipomovimiento">Tipo movimiento</label>
                  </div>
            
                  <div class="input-field col s6">
                    <i class="material-icons prefix">file_upload</i>
                      <select id="selenvia" class="validate" name="selenvia"  required>
                          <?php foreach($objDepartamento->ListarDepartamentoActivos() as $r): ?>
                              <option value="<?php echo $r->iddepartamento; ?>"><?php echo $r->nombre; ?></option>
                          <?php endforeach; ?>
                      </select>
                    <label for="selenvia">Quien envía (Departamento)</label>
                  </div>
                  
                  <div class="input-field col s6">
                    <i class="material-icons prefix">file_download</i>
                      <select id="selrecibe" class="validate" name="selrecibe"  required>
                          <?php foreach($objDepartamento->ListarDepartamentoActivos() as $r): ?>
                              <option value="<?php echo $r->iddepartamento; ?>"><?php echo $r->nombre; ?></option>
                          <?php endforeach; ?>
                      </select>
                    <label for="selrecibe">Quien recibe (Departamento)</label>
                  </div>

                  <div class="input-field col s12">
                    <i class="material-icons prefix">mode_comment</i>
                    <input id="txtjustificacion" type="text" class="validate" name="txtjustificacion" maxlength="100" onkeypress="return letrasynumeros(event)" required>
                    <label for="txtjustificacion">Justificación del movimiento del activo fijo</label>
                  </div>
                            
                  <h4 class="center gray-text text-darken-2"><i class="medium material-icons">playlist_add_check
</i> 
                    Lista de Bienes en <strong><?php echo $ubicacion->nombre; ?></strong>
                  </h4>

                  <!-- listado de bienes-->
                  <div class="col s12">
                    <table id="tabla-activos" class="striped responsive-table">
                      <thead>
                          <tr>
                              <th>CÓDIGO</th>
                              <th>CANTIDAD</th>
                              <th>DESCRIPCIÓN</th>
                              <th>MODELO</th>
                              <th>MARCA</th>
                              <th class="center">SELECCIONAR</th>
                          </tr>
                      </thead>
                      <tbody>
                      <?php $i=1; foreach($bien->ObtenerBienesPorUsuario($usuario->idusuario, $ubicacion->idubicacion) as $r): ?>
                          <tr>
                              <td><b>INTERNO:</b>&nbsp;<?php echo ($r->codigointerno!=null)? $r->codigointerno: "N/A"; ?><br>
                                  <b>MINED</b>:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ($r->codigomined!=null)? $r->codigomined: "N/A"; ?><br>
                                  <b>ITCA:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ($r->codigoitca!=null)? $r->codigoitca: "N/A"; ?></td>
                              <td>1</td>
                              <td><?php echo $r->descripcionbien; ?></td>
                              <td><?php echo ($r->modelo!=null)? $r->modelo: "N/A"; ?></td>
                              <td><?php echo ($r->marca!=null)? $r->marca: "N/A"; ?></td>
                              
                              <td class="center">
                                <label>
                                  <input onchange="seleccionarBien(this)" type="checkbox" name="idbien<?php echo $i; ?>" id="idbien<?php echo $i; ?>" value="null"  data-id="<?php echo $r->idbien; ?>" data-name="idbien<?php echo $i; ?>"/>
                                  <span>Enviar</span>
                                </label>
                              </td>
                          </tr>
                      <?php $i++; endforeach; ?>
                      </tbody>
                    </table>
                      
                  </div>                  

                  <div class="input-field col s12 center">
                    <button id="boton-enviar" type="submit" class="waves-effect waves-light btn grey darken-2" disabled><i class="material-icons right">send</i>Enviar a Autorización</button>
                  </div>
                  

                </div>
              </form>
            </div>

        </div>

      </div>

    </div>
    <br><br>
  </div>


  <script>
    //para seleccionar las butacas
    function seleccionarBien(bien) {
      //tomar el id de la bien 
      var idbien = bien.getAttribute('data-id');
      //tomar el nombre de la bien 
      var nombrebien = bien.getAttribute('data-name');
      
    
      //validar la selección de las biens y la cantidad de estas
      if (document.getElementById(nombrebien).value == "null") {
        //cambiar el valor del bien seleccionado
        document.getElementById(nombrebien).value = idbien;
        document.getElementById('boton-enviar').disabled=false;
        //definir el número del conteo de boletos
        var numero = parseInt(document.getElementById("txtCantidadBien").value) + 1;

        //asignar el nuevo número de bienes
        document.getElementById("txtCantidadBien").value = numero;

      } else {
        //cambiar el valor del bien seleccionado
        document.getElementById(nombrebien).value = "null";
        document.getElementById('boton-enviar').disabled=true;
        //asignar el nuevo número de bienes
        if(parseInt(document.getElementById("txtCantidadBien").value) != 0){
          document.getElementById("txtCantidadBien").value = document.getElementById("txtCantidadBien").value - 1;
        }
      }
    
    }
    </script>
