  <div class="container">
    <div class="section">

      <!--   Icon Section   -->
      <div class="row">
        <div class="col s12">
            <h2 class="center grey-text text-darken-4"><i class="medium material-icons">bookmark_border</i>Estado de bienes registrados</h2>
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
                          <th class="center">Editar</th>
                          <th class="center">Adicional</th>
                      </tr>
                  </thead>
                  <tbody>
                  <?php foreach($this->model->ListarEstadobienActivas() as $r): ?>
                      <tr>
                          <td><?php echo mb_strtoupper($r->idestadobien); ?></td>
                          <td><?php echo mb_strtoupper($r->nombre); ?></td>
                          
                          <td class="center">
                              <!-- en la url pasamos parámetros para el controlador -->
                              <!--    controller, metod,id -->
                              <a href="?c=Estadobien&a=Crud&id=<?php echo $r->idestadobien; ?>" title="Editar Registro" ><i class="small material-icons blue-text">edit</i></a>
                          </td>
                          <td class="center">
                              <!-- en la url pasamos parámetros para el controlador -->
                              <!--    controller, metod,id -->
                              <a href="pdf/estadobien.php"target="_blank" title="Ver detalles e Imprimir en Pdf" ><i class="small material-icons black-text">archive</i></a><br>
                              <a href="NuevoExcel/excel.php" title="Imprimir en Excel" ><i class="small material-icons green-text">print</i></a><br>
                              <a href="word/word.php" title="Imprimir en Word" ><i class="small material-icons blue-text">print</i></a><br>
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