  <div class="container">
    <div class="section">

      <!--   Icon Section   -->
      <div class="row">
        <div class="col s12">
            <h2 class="center grey-text text-darken-4"><i class="medium material-icons">account_balance</i> Fuentes de financiamiento registrados</h2>
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
                          <th>Nombre</th>
                          <th>Código</th>
                          <th class="center">Editar</th>
                          <th class="center">Adicional</th>
                      </tr>
                  </thead>
                  <tbody>
                  <?php foreach($this->model->ListarFuentefinanciamientoActivos() as $r): ?>
                      <tr>
                          <td><?php echo mb_strtoupper($r->idfuentefinanciamiento); ?></td>
                          <td><?php echo mb_strtoupper($r->nombre); ?></td>
                          <td><?php echo mb_strtoupper($r->codigofuentefinanciamiento); ?></td>

                          <td class="center">
                              <!-- en la url pasamos parámetros para el controlador -->
                              <!--    controller, metod,id -->
                              <a href="?c=Fuentefinanciamiento&a=Crud&id=<?php echo $r->idfuentefinanciamiento; ?>" title="Editar Registro" ><i class="small material-icons blue-text">edit</i></a>
                          </td>
                          <td class="center">

                          <a href="pdf/fuentefinanciamiento.php"target="_blank" title="Imprimir en Pdf" ><i class="small material-icons black-text">archive</i></a><br>
                              <a href="NuevoExcel/fuentefinanciamiento.php" title="Imprimir en Excel" ><i class="small material-icons green-text">print</i></a><br>
                              <a href="word/fuentefinanciamiento.php" title="Imprimir en Word" ><i class="small material-icons blue-text">print</i></a><br>
                           
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