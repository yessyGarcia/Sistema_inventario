  <div class="container">
    <div class="section">

      <!--   Icon Section   -->
      <div class="row">
        <div class="col s12">
            <h2 class="center grey-text text-darken-4"><i class="medium material-icons">account_circle</i> Usuarios Registrados</h2>
        </div>

            <!-- datos -->
            <div class="row">
              <div class="col s12">
                <ul class="tabs">
                  <li class="tab col s6"><a  class="active" href="#activas">Activos</a></li>
                  <li class="tab col s6"><a href="#inactivas">Inactivos</a></li>
                </ul>
                <div class="input-field col s2">
                  <a href="?c=Usuario&a=Crud" class="waves-effect waves-light btn sky_blue"><i class="material-icons right">send</i>Nuevo</a>
                </div>
                <div class="input-field col s2">
                  <a href="NuevoExcel/usuario.php" class="waves-effect waves-light btn green"><i class="material-icons right">print</i>Excel</a>
                </div> 
                <div class="input-field col s2">
                  <a href="word/usuario.php" class="waves-effect waves-light btn blue"><i class="material-icons right">print</i>Word</a>
                </div>
                <div class="input-field col s2">
                  <a href="pdf/usuario.php" target="_blank" class="waves-effect waves-light btn black"><i class="material-icons right">print</i>Pdf</a>
                </div>        
         </div>
              </div>
              <!-- tabla de activos -->
              <div id="activas" class="col s12">
                <table id="tabla-activos" class="striped">
                  <thead>
                      <tr>
                          <th class="center">Id</th>
                          <th>Nombre</th>
                          <th>Apellido</th>
                          <th>Correo electrónico</th>
                          <th class="center">Editar</th>
                          <th class="center">Desactivar</th>
                          <th>Adicional</th>
                      </tr>
                  </thead>
                  <tbody>
                  <?php foreach($this->model->ListarUsuarioActivas() as $r): ?>
                      <tr>
                          <td><?php echo mb_strtoupper($r->idusuario); ?></td>
                          <td><?php echo mb_strtoupper($r->nombre); ?></td>
                          <td><?php echo mb_strtoupper($r->apellido); ?></td>
                          <td><?php echo mb_strtoupper($r->email); ?></td>
                          <td class="center">
                              <!-- en la url pasamos parámetros para el controlador -->
                              <!--    controller, metod,id -->
                              <a href="?c=Usuario&a=Update&id=<?php echo $r->idusuario; ?>" title="Editar Registro" ><i class="small material-icons blue-text">edit</i></a>
                          </td>
                          <td class="center">
                              <a onclick="javascript:return confirm('¿Seguro que desea desactivar este registro?');" href="?c=Usuario&a=CambiarEstado&nuevo_estado=0&id=<?php echo $r->idusuario; ?>" title="Desactivar Registro" ><i class="small material-icons red-text">cancel</i></a>
                          </td>
                          <td class="center">
                              <!-- en la url pasamos parámetros para el controlador -->
                              <!--    controller, metod,id -->
                              <a href="pdf/usuario.php"target="_blank" title="Ver detalles e Imprimir en Pdf" ><i class="small material-icons black-text">archive</i></a><br>
                             </td>
                      </tr>
                  <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
              
              <!-- tabla de inactivos -->
              <div id="inactivas" class="col s12">
                <table id="tabla-activos" class="striped">
                  <thead>
                      <tr>
                          <th class="center">Id</th>
                          <th>Nombre</th>
                          <th>Apellido</th>
                          <th>Correo electrónico</th>
                          <th class="center">Editar</th>
                          <th class="center">Activar</th>
                          <th class="center">Adicional</th>
                      </tr>
                  </thead>
                  <tbody>
                  <?php foreach($this->model->ListarUsuarioInactivos() as $r): ?>
                      <tr>
                          <td><?php echo mb_strtoupper($r->idusuario); ?></td>
                          <td><?php echo mb_strtoupper($r->nombre); ?></td>
                          <td><?php echo mb_strtoupper($r->apellido); ?></td>
                          <td><?php echo mb_strtoupper($r->email); ?></td>
                          <td class="center">
                              <!-- en la url pasamos parámetros para el controlador -->
                              <!--    controller, metod,id -->
                              <a href="?c=Usuario&a=Update&id=<?php echo $r->idusuario; ?>" title="Editar Registro" ><i class="small material-icons blue-text">edit</i></a>
                          </td>
                          <td class="center">
                              <a onclick="javascript:return confirm('¿Seguro que desea activar este registro?');" href="?c=Usuario&a=CambiarEstado&nuevo_estado=1&id=<?php echo $r->idusuario; ?>" title="Activar Registro" ><i class="small material-icons green-text">check_circle</i></a>
                          </td>
                          <td class="center">
                              <!-- en la url pasamos parámetros para el controlador -->
                              <!--    controller, metod,id -->
                              <a href="pdf/usuario.php"target="_blank" title="Ver detalles e Imprimir en Pdf" ><i class="small material-icons black-text">archive</i></a><br>
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