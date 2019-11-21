  <div class="row">
    <div class="section">

      <!--   Icon Section   -->
      <div class="row">
        <div class="col s12">
            <h2 class="center grey-text text-darken-4"><i class="medium material-icons">home</i>Bienes a su cargo</h2>
        </div>

            <!-- datos -->
            <div class="row">
              <div class="col s12">
                <ul class="tabs">
                  <li class="tab col s6"><a  class="active" href="#activas">Buenos</a></li>
                  <li class="tab col s6"><a  href="#inactivas">Descargos</a></li>
                 
                </ul>
                <div class="input-field col s6">
                  <a href="?c=Bien&a=Crud" class="waves-effect waves-light btn green"><i class="material-icons right">send</i>Nuevo</a>
                  </div>
                  <div class="input-field col s6">
                  <a href="pdf"target="_blank" class="waves-effect waves-light btn green"><i class="material-icons right">send</i>Imprimir</a>
                  </div>
                  <div class="input-field col s6">
                  <a href="pdf"target="_blank" class="waves-effect waves-light btn green"><i class="material-icons right">add_to_photos</i>Imprimir</a>
                  </div>
                  <div class="input-field col s6">
                  <a href="pdf"target="_blank" class="waves-effect waves-light btn green"><i class="material-icons right">add_to_photos</i>Imprimir</a>
                  </div>
              </div>
            </div>
            <div class="row">
              <!-- tabla de activos -->
              <div id="activas" class="col s12">
                <table id="tabla-activos" class="highlight responsive-table">
                  <thead>
                      <tr>
                          <th>Código Interno</th>
                          <th>Código MINED</th>
                          <th>Código ITCA</th>
                          <th>Clasificación</th>
                          <th>Tipo</th>
                          <th>Descripción</th>
                          <th>Marca</th>
                          <th>Modelo</th>
                          <th>Serie</th>
                          <th>Usuario custodio</th>
                          <th>Ubicación</th>
                          <th>Costo ($)</th>
                          <th>Fuente financiamiento</th>
                          <th>Observaciones</th>
                          <th class="center"><i title="Editar" class="small material-icons black-text">border_color</i></th>
                          <th class="center"><i title="Desactivar" class="small material-icons black-text">delete_forever</i></th>
                      </tr>
                  </thead>
                  <tbody>
                  <?php foreach($this->model->ListarBienActivos() as $r): ?>
                      <tr>
                          <td><?php echo mb_strtoupper($r->codigointerno,'UTF-8'); ?></td>
                          <td><?php echo mb_strtoupper($r->codigomined,'UTF-8'); ?></td>
                          <td><?php echo mb_strtoupper($r->codigoitca,'UTF-8'); ?></td>
                          <td><?php echo mb_strtoupper($r->idclasificacionbien,'UTF-8'); ?></td>
                          <td><?php echo mb_strtoupper($r->tipobien,'UTF-8'); ?></td>
                          <td><?php echo mb_strtoupper($r->descripcionbien,'UTF-8'); ?></td>
                          <td><?php echo mb_strtoupper($r->marca,'UTF-8'); ?></td>
                          <td><?php echo mb_strtoupper($r->modelo,'UTF-8'); ?></td>
                          <td><?php echo mb_strtoupper($r->serie,'UTF-8'); ?></td>
                          <td><?php echo mb_strtoupper($r->idusuariocustodio,'UTF-8'); ?></td>
                          <td><?php echo mb_strtoupper($r->idubicacion,'UTF-8'); ?></td>
                          <td style="text-align:right;"><?php echo mb_strtoupper($r->costobien,'UTF-8'); ?></td>
                          <td><?php echo mb_strtoupper($r->idfuentefinanciamiento,'UTF-8'); ?></td>
                          <td><?php echo mb_strtoupper($r->observaciones,'UTF-8'); ?></td>
                          
                          <td class="center">
                              <!-- en la url pasamos parámetros para el controlador -->
                              <!--    controller, metod,id -->
                              <a href="?c=Bien&a=Crud&id=<?php echo $r->idbien; ?>" title="Editar Registro" ><i class="small material-icons blue-text">edit</i></a>
                          </td>
                          <td class="center">
                          <a onclick="javascript:return confirm('¿Seguro/a que desea descartar este bien?');" href="?c=Bien&a=CambiarEstado&nuevo_estado=4&id=<?php echo $r->idbien; ?>" title="Desactivar Registro" ><i class="small material-icons red-text">cancel</i></a>
                       
                           </td>
                      </tr>
                  <?php endforeach; ?>
                  </tbody>
                </table>
              </div>

             <!-- tabla de inactivos -->
             <div id="inactivas" class="col s12">
                <table id="tabla-activos" class="highlight responsive-table">
                  <thead>
                      <tr>
                          <th>Código Interno</th>
                          <th>Código MINED</th>
                          <th>Código ITCA</th>
                          <th>Clasificación</th>
                          <th>Tipo</th>
                          <th>Descripción</th>
                          <th>Marca</th>
                          <th>Modelo</th>
                          <th>Serie</th>
                          <th>Usuario custodio</th>
                          <th>Ubicación</th>
                          <th>Costo ($)</th>
                          <th>Fuente financiamiento</th>
                          <th>Observaciones</th>
                          <th class="center">Editar</th>
                          <th class="center">Activar</th>
                      </tr>
                  </thead>
                  <tbody>
                  <?php foreach($this->model->ListarBienInactivos() as $r): ?>
                      <tr>
                          <td><?php echo mb_strtoupper($r->codigointerno,'UTF-8'); ?></td>
                          <td><?php echo mb_strtoupper($r->codigomined,'UTF-8'); ?></td>
                          <td><?php echo mb_strtoupper($r->codigoitca,'UTF-8'); ?></td>
                          <td><?php echo mb_strtoupper($r->idclasificacionbien,'UTF-8'); ?></td>
                          <td><?php echo mb_strtoupper($r->tipobien,'UTF-8'); ?></td>
                          <td><?php echo mb_strtoupper($r->descripcionbien,'UTF-8'); ?></td>
                          <td><?php echo mb_strtoupper($r->marca,'UTF-8'); ?></td>
                          <td><?php echo mb_strtoupper($r->modelo,'UTF-8'); ?></td>
                          <td><?php echo mb_strtoupper($r->serie,'UTF-8'); ?></td>
                          <td><?php echo mb_strtoupper($r->idusuariocustodio,'UTF-8'); ?></td>
                          <td><?php echo mb_strtoupper($r->idubicacion,'UTF-8'); ?></td>
                          <td style="text-align:right;"><?php echo mb_strtoupper($r->costobien,'UTF-8'); ?></td>
                          <td><?php echo mb_strtoupper($r->idfuentefinanciamiento,'UTF-8'); ?></td>
                          <td><?php echo mb_strtoupper($r->observaciones,'UTF-8'); ?></td>
                          
                          <td class="center">
                              <!-- en la url pasamos parámetros para el controlador -->
                              <!--    controller, metod,id -->
                              <a href="?c=Bien&a=Crud&id=<?php echo $r->idbien; ?>" title="Editar Registro" ><i class="small material-icons blue-text">edit</i></a>
                          </td>
                          <td class="center">
                          <a onclick="javascript:return confirm('¿Seguro/a que desea activar este bien?');" href="?c=Bien&a=CambiarEstado&nuevo_estado=1&id=<?php echo $r->idbien; ?>" title="Activar Registro" ><i class="small material-icons green-text">check_circle</i></a>
                       
                           </td>
                      </tr>
                  <?php endforeach; ?>
                  </tbody>
                </table>
              </div>

            </div>

      </div>

    </div>
    <br><br><br><br>
  </div>