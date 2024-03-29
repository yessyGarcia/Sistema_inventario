  <div class="container">
    <div class="section">

      <!--   Icon Section   -->
      <div class="row">
        <div class="col s12">
            <h2 class="center grey-text text-darken-4"><i class="medium material-icons">account_circle</i> Movimientos Registrados</h2>
        </div>

            <!-- datos -->
            <div class="row">
              <div class="col s12">
                <ul class="tabs">
                  <li class="tab col s12"><a  class="active" href="#activas">Activos</a></li>
                 
                </ul>
              </div>
              <!-- tabla de activos -->
              <div id="activas" class="col s12">
                <table id="tabla-activos" class="striped">
                  <thead>
                      <tr>
                          <th class="center">Id</th>
                          <th>Fecha traslado</th>
                          <th>Usuario custodio</th>
                          <th>Nuevo custodio</th>
                          <th>Destino</th>
                          <th>Tipo de movimiento</th>
                          <th>Justificación</th>
                          <th>Centro de costos por envío</th>
                          <th>Centro de costos por recibir</th>
                          <th class="center">Editar</th>
                          <th class="center"></th>
                      </tr>
                  </thead>
                  <tbody>
                  <?php foreach($this->model->ListarMovimientoActivas() as $r): ?>
                      <tr>
                          <td><?php echo mb_strtoupper($r->idmovimiento); ?></td>
                          <td><?php echo mb_strtoupper($r->fechatraslado); ?></td>
                          <td><?php echo mb_strtoupper($r->idusuariocustodio); ?></td>
                          <td><?php echo mb_strtoupper($r->idusuarionuevocustodio); ?></td>
                          <td><?php echo mb_strtoupper($r->destino); ?></td>
                          <td><?php echo mb_strtoupper($r->idtipomovimiento); ?></td>
                          <td><?php echo mb_strtoupper($r->justificacion); ?></td>
                          <td><?php echo mb_strtoupper($r->centrocostosenvia); ?></td>
                          <td><?php echo mb_strtoupper($r->centrocostosrecibe); ?></td>
                          <td class="center">
                              <!-- en la url pasamos parámetros para el controlador -->
                              <!--    controller, metod,id -->
                              <a href="?c=Movimiento&a=CrudCustodio&id=<?php echo $r->idmovimiento; ?>" title="Editar Registro" ><i class="small material-icons blue-text">edit</i></a>
                          </td>
                          <td class="center">
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