  <div class="container">
    <div class="section">

      <!--   Icon Section   -->
      <div class="row">
        <div class="col s12">
            <h2 class="center grey-text text-darken-4"><i class="medium material-icons">home</i>Ubicaciones registradas</h2>
        </div>

            <!-- datos -->
            <div class="row">
              <div class="col s12">
                <ul class="tabs">
                  <li class="tab col s12"><a  class="active" href="#activas">Activos</a></li>
                </ul>
                <div class="input-field col s2">
                  <a href="?c=Ubicacion&a=Crud" class="waves-effect waves-light btn sky_blue"><i class="material-icons right">send</i>Nuevo</a>
                </div>
                <div class="input-field col s2">
                  <a href="NuevoExcel/ubicacion.php" class="waves-effect waves-light btn green"><i class="material-icons right">print</i>Excel</a>
                </div> 
                <div class="input-field col s2">
                  <a href="word/ubicacion.php" class="waves-effect waves-light btn blue"><i class="material-icons right">print</i>Word</a>
                </div>
                <div class="input-field col s2">
                  <a href="pdf/ubicacion.php" target="_blank" class="waves-effect waves-light btn black"><i class="material-icons right">print</i>Pdf</a>
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
                          <th>Descripción</th>
                          <th class="center">Editar</th>
                          <th class="center">Adicional</th>
                      </tr>
                  </thead>
                  <tbody>
                  <?php foreach($this->model->ListarUbicacionActivos() as $r): ?>
                      <tr>
                          <td><?php echo mb_strtoupper($r->idubicacion); ?></td>
                          <td><?php echo mb_strtoupper($r->nombre); ?></td>
                          <td><?php echo mb_strtoupper($r->descripcion); ?></td>
                          
                          <td class="center">
                              <!-- en la url pasamos parámetros para el controlador -->
                              <!--    controller, metod,id -->
                              <a href="?c=Ubicacion&a=Crud&id=<?php echo $r->idubicacion; ?>" title="Editar Registro" ><i class="small material-icons blue-text">edit</i></a>
                          </td>
                          <td class="center">

                              <!-- en la url pasamos parámetros para el controlador -->
                              <!--    controller, metod,id -->
                              <a href="pdf/ubicacion.php"target="_blank" title="Ver detalles e Imprimir en Pdf" ><i class="small material-icons black-text">archive</i></a><br>
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