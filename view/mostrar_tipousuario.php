  <div class="container">
    <div class="section">

      <!--   Icon Section   -->
      <div class="row">
        <div class="col s12">
            <h2 class="center grey-text text-darken-4"><i class="medium material-icons">bookmark</i> Tipos de usuarios Registrados</h2>
        </div>

            <!-- datos -->
            <div class="row">
              <div class="col s12">
                <ul class="tabs">
                  <li class="tab col s12"><a  class="active" href="#activas">Activos</a></li>
                </ul>
                <div class="input-field col s2">
                  <a href="?c=Tipousuario&a=Crud" class="waves-effect waves-light btn sky_blue"><i class="material-icons right">send</i>Nuevo</a>
                </div>
                <div class="input-field col s2">
                  <a href="NuevoExcel/tipousuario.php" class="waves-effect waves-light btn green"><i class="material-icons right">print</i>Excel</a>
                </div> 
                <div class="input-field col s2">
                  <a href="word/tipousuario.php" class="waves-effect waves-light btn blue"><i class="material-icons right">print</i>Word</a>
                </div>
                <div class="input-field col s2">
                  <a href="pdf/tipousuario.php" target="_blank" class="waves-effect waves-light btn black"><i class="material-icons right">print</i>Pdf</a>
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
                          <th class="center">Editar</th>
                          <th class="center"></th>
                      </tr>
                  </thead>
                  <tbody>
                  <?php foreach($this->model->ListarTipousuarioActivas() as $r): ?>
                      <tr>
                          <td><?php echo mb_strtoupper($r->idtipousuario); ?></td>
                          <td><?php echo mb_strtoupper($r->nombre); ?></td>
                          
                          <td class="center">
                              <!-- en la url pasamos parámetros para el controlador -->
                              <!--    controller, metod,id -->
                              <a href="?c=Tipousuario&a=Crud&id=<?php echo $r->idtipousuario; ?>" title="Editar Registro" ><i class="small material-icons blue-text">edit</i></a>
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