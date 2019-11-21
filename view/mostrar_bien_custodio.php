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
                  <li class="tab col s12"><a  class="active" href="#activas">Buenos</a></li>
                </ul>
              </div>
              <!-- tabla de activos -->
              <div id="activas" class="col s12">
                <table id="tabla-activos" class="striped responsive-table">
                  <thead>
                      <tr>
                          <th>Código Interno</th>
                          <th>Código MINED</th>
                          <th>Código ITCA</th>
                          <th>Clasificación bien</th>
                          <th>Tipo bien</th>
                          <th>Descripción bien</th>
                          <th>Marca</th>
                          <th>Modelo</th>
                          <th>Serie</th>
                          <th>Usuario custodio</th>
                          <th>Ubicación</th>
                          <th>Costo bien</th>
                          <th>Fuente financiamiento</th>
                          <th>Tipo comprobante</th>
                          <th>Número comprobante</th>
                          <th>Fecha adquisición</th>
                          <th>Departamento</th>
                          <th>Observaciones</th>
                      </tr>
                  </thead>
                  <tbody>
                  <?php foreach($this->model->ListarBienActivosCustodio($_SESSION['id']) as $r): ?>
                      <tr>
                          <td><?php echo $r->codigointerno; ?></td>
                          <td><?php echo $r->codigomined; ?></td>
                          <td><?php echo $r->codigoitca; ?></td>
                          <td><?php echo $r->idclasificacionbien; ?></td>
                          <td><?php echo $r->tipobien; ?></td>
                          <td><?php echo $r->descripcionbien; ?></td>
                          <td><?php echo $r->marca; ?></td>
                          <td><?php echo $r->modelo; ?></td>
                          <td><?php echo $r->serie; ?></td>
                          <td><?php echo $r->idusuariocustodio; ?></td>
                          <td><?php echo $r->idubicacion; ?></td>
                          <td>$ <?php echo $r->costobien; ?></td>
                          <td><?php echo $r->idfuentefinanciamiento; ?></td>
                          <td><?php echo $r->idtipocomprobante; ?></td>
                          <td><?php echo $r->numerocomprobante; ?></td>
                          <td><?php echo $r->fechaadquisicion; ?></td>
                          <td><?php echo $r->iddepartamento; ?></td>
                          <td><?php echo $r->observaciones; ?></td>
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