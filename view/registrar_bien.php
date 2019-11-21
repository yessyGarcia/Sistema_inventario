<?php 

  //para todos los select (Listas desplegables)
  require_once 'model/Clasificacionbien.php';
  $clasificacionbien = new Clasificacionbien();
  require_once 'model/Usuario.php';
  $usuario = new Usuario();
  require_once 'model/Estadobien.php';
  $estadobien = new Estadobien();
  require_once 'model/Fuentefinanciamiento.php';
  $fuentefinanciamiento = new Fuentefinanciamiento();
  require_once 'model/Tipocomprobante.php';
  $tipocomprobante = new Tipocomprobante();
  require_once 'model/Departamento.php';
  $departamento = new Departamento();
  require_once 'model/Bien.php';
  $model = new Bien();
  require_once 'model/Ubicacion.php';
  $ubicacion = new Ubicacion();
 ?>
 <!-- cuerpo de registrar_sala -->
  <div class="container">
    <div class="section">

      <!--   Icon Section   -->
      <div class="row">
        <div class="col s12">
            <h3 class="center grey-text text-darken-3"><i class="medium material-icons">book</i> 
              <!--si el atributo objeto->id es diferente de nulo muestra el nombre-->
              <?php echo $bien->idbien != null ? 'Editar '.$bien->tipobien : 'Registrar Bien'; ?>
            </h3>

            <!-- formulario -->
            <div class="row">
              <form class="col s12" action="?c=Bien&a=Guardar" method="post" enctype="multipart/form-data">
            <div class="row">

            <input type="hidden" name="txtidbien" value="<?php echo $bien->idbien; ?>"/>

            <div class="input-field col s6">
              <i class="material-icons prefix">blur_on</i>
              <input id="txtcodigointerno" type="text" class="validate" name="txtcodigointerno" value="<?php echo $bien->codigointerno; ?>" maxlength="80" onkeypress="return letrasynumerosG(event)"  autofocus>
              <label for="txtcodigointerno">Código interno</label>
            </div>
            <div class="input-field col s6">
</i>
              <i class="material-icons prefix">blur_circular</i>
              <input id="txtcodigomined" type="text" class="validate" name="txtcodigomined" maxlength="80" onkeypress="return letrasynumerosG(event)" value="<?php echo $bien->codigomined; ?>">
              <label for="txtcodigomined">Código MINED</label>
            </div>
            <div class="input-field col s6">
              <i class="material-icons prefix">blur_linear </i>
              <input id="txtcodigoitca" type="text" class="validate" name="txtcodigoitca" maxlength="80" onkeypress="return letrasynumerosG(event)"value="<?php echo $bien->codigoitca; ?>">
              <label for="txtcodigoitca">Código ITCA</label>
            </div>
            <div class="input-field col s6">
              <i class="material-icons prefix">bookmark</i>
              <select name="selidclasificacionbien" id="selidclasificacionbien" required>
              <?php 
              if ($bien->idclasificacionbien != null) {
                         
                  $objClasificacionbien = $clasificacionbien->ObtenerClasificacionbien($bien->idclasificacionbien);
                           
                  echo '<option value="'.$objClasificacionbien->idclasificacionbien.'" selected>'.$objClasificacionbien->nombre.'</option>';
                    }
                   ?> 
                   <?php foreach($clasificacionbien->ListarClasificacionbienActivos() as $r): ?>
                      <option value="<?php echo $r->idclasificacionbien; ?>"><?php echo $r->idclasificacionbien; ?>-<?php echo $r->nombre; ?></option>
                  <?php endforeach; ?>
              </select>
              <label for="selidclasificacionbien">Clasificación</label>
            </div>

            <div class="input-field col s6">
              <i class="material-icons prefix">book</i>
              <input id="txttipobien" type="text" class="validate" name="txttipobien" maxlength="30" onkeypress="return sololetras(event)" value="<?php echo $bien->tipobien; ?>"  required>
              <label for="txttipobien">Tipo de bien</label>
            </div>

            <div class="input-field col s6">
              <i class="material-icons prefix">message</i>
              <input id="txtdescripcionbien" type="text" class="validate" name="txtdescripcionbien" maxlength="75" onkeypress="return letrasynumeros(event)" value="<?php echo $bien->descripcionbien; ?>"required>
              <label for="txtdescripcionbien">Descripción</label>
            </div>

            <div class="input-field col s6">
              <i class="material-icons prefix">beenhere</i>
              <input id="txtmarca" type="text" class="validate" name="txtmarca" maxlength="20" onkeypress="return letrasynumeros(event)" value="<?php echo $bien->marca; ?>">
              <label for="txtmarca">Marca</label>
            </div>

            <div class="input-field col s6">
              <i class="material-icons prefix">date_range</i>
              <input id="txtmodelo" type="text" class="validate" name="txtmodelo" maxlength="20" onkeypress="return letrasynumerosG(event)" value="<?php echo $bien->modelo; ?>">
              <label for="txtmodelo">Modelo</label>
            </div>

            <div class="input-field col s6">
              <i class="material-icons prefix">content_paste</i>
              <input id="txtserie" type="text" class="validate" name="txtserie" maxlength="30" onkeypress="return letrasynumerosG(event)"value="<?php echo $bien->serie; ?>">
              <label for="txtserie">Serie</label>
            </div>

            <div class="input-field col s6">
              <i class="material-icons prefix">perm_identity</i>
              <select name="selidusuariocustodio" id="selidusuariocustodio" required>
              <?php 
                        if ($bien->idusuario != null) {
                         
                          $objUsuario = $usuario->ObtenerUsuario($bien->idusuario);
                           
                          echo '<option value="'.$objUsuario->idusuario.'" selected>'.$objUsuario->nombre.' '.$objUsuario->apellido.'</option>';
                    }
                   ?> 
                   <?php foreach($usuario->ListarUsuarioActivas() as $r): ?>
                      <option value="<?php echo $r->idusuario; ?>"><?php echo $r->idusuario; ?>-<?php echo $r->nombre.' '.$r->apellido; ?></option>
                  <?php endforeach; ?>
              </select>
              <label for="selidusuariocustodio">Custodio</label>
            </div>

            <div class="input-field col s6">
              <i class="material-icons prefix">location_on</i>
              <select name="selidubicacion" id="selidubicacion" required>
              <?php 
                        if ($bien->idubicacion != null) {
                         
                          $objUbicacion = $ubicacion->ObtenerUbicacion($bien->idubicacion);
                           
                          echo '<option value="'.$objUbicacion->idubicacion.'" selected>'.$objUbicacion->nombre.'</option>';
                    }
                   ?> 
                   <?php foreach($ubicacion->ListarUbicacionActivos() as $r): ?>
                      <option value="<?php echo $r->idubicacion; ?>"><?php echo $r->nombre; ?></option>
                  <?php endforeach; ?>
                </select>
              <label for="selidubicacion">Ubicación</label>
            </div>

            <div class="input-field col s6">
              <i class="material-icons prefix">bookmark_border</i>
              <select name="selidestadobien" id="selidestadobien" required>
              <?php 
                if ($bien->idestadobien != null) {
                         
                  $objEstadobien = $estadobien->ObtenerEstadobien($bien->idestadobien);
                           
                     echo '<option value="'.$objEstadobien->idestadobien.'" selected>'.$objEstadobien->nombre.'</option>';
                    }
                   ?> 
                   <?php foreach($estadobien->ListarEstadobienActivas() as $r): ?>
                      <option value="<?php echo $r->idestadobien; ?>"><?php echo $r->idestadobien; ?>-<?php echo $r->nombre; ?></option>
                  <?php endforeach; ?>
              </select>
              <label for="selidestadobien">Estado del bien</label>
            </div>

            <div class="input-field col s6">
              <i class="material-icons prefix">monetization_on</i>
              <input id="txtcostobien" type="text" class="validate" name="txtcostobien" maxlength="7,2" onkeypress="return numerosypuntos(event)" value="<?php echo $bien->costobien; ?>" required>
              <label for="txtcostobien">Costo del bien</label>
             
            </div>

            <div class="input-field col s6">
              <i class="material-icons prefix">account_balance </i>
              <select name="selidfuentefinanciamiento" id="selidfuentefinanciamiento" required>
              <?php 
                if ($bien->idfuentefinanciamiento != null) {
                         
                  $objFuentefinanciamiento = $fuentefinanciamiento->ObtenerFuentefinanciamiento($bien->idfuentefinanciamiento);
                           
                     echo '<option value="'.$objFuentefinanciamiento->idfuentefinanciamiento.'" selected>'.$objFuentefinanciamiento->nombre.'</option>';
                    }
                   ?> 
                   <?php foreach($fuentefinanciamiento->ListarFuentefinanciamientoActivos() as $r): ?>
                      <option value="<?php echo $r->idfuentefinanciamiento; ?>"><?php echo $r->codigofuentefinanciamiento; ?>-<?php echo $r->nombre; ?></option>
                  <?php endforeach; ?>
              </select>
              <label for="selidfuentefinanciamiento">Fuente financiamiento</label>
            </div>

            <div class="input-field col s6">
              <i class="material-icons prefix">branding_watermark </i>
              <select  name="selidtipocomprobante" id="selidtipocomprobante" required>
              <?php 
                if ($bien->idtipocomprobante != null) {
                         
                  $objTipocomprobante = $tipocomprobante->ObtenerTipocomprobante($bien->idtipocomprobante);
                           
                     echo '<option value="'.$objTipocomprobante->idtipocomprobante.'" selected>'.$objTipocomprobante->nombre.'</option>';
                    }
                   ?> 
                   <?php foreach($tipocomprobante->ListarTipocomprobanteActivas() as $r): ?>
                      <option value="<?php echo $r->idtipocomprobante; ?>"><?php echo $r->idtipocomprobante; ?>-<?php echo $r->nombre; ?></option>
                  <?php endforeach; ?>
              </select>
              <label for="selidtipocomprobante">Tipo de comprobante</label>
            </div>

            <div class="input-field col s6">
              <i class="material-icons prefix">filter_1</i>
              <input id="txtnumerocomprobante" type="text" class="validate" name="txtnumerocomprobante" maxlength="20" onkeypress="return solonumeros(event)" value="<?php echo $bien->numerocomprobante; ?>"  required>
              <label for="txtnumerocomprobante">Número de comprobante</label>
            </div>

            <div class="input-field col s6">
               <i class="material-icons prefix">event_note</i>
               <input id="txtfechaadquisicion" type="date" class="validate" name="txtfechaadquisicion"value="<?php echo $bien->fechaadquisicion; ?>" required>
               <label for="txtfechaadquisicion">Fecha de adqusición</label>
            </div>

            <div class="input-field col s6">
              <i class="material-icons prefix">home</i>
              <select name="seliddepartamento"id="seliddepartamento" required>
              <?php 
                if ($bien->iddepartamento != null) {
                         
                  $objDepartamento = $departamento->ObtenerDepartamento($bien->iddepartamento);
                           
                     echo '<option value="'.$objDepartamento->iddepartamento.'" selected>'.$objDepartamento->nombre.'</option>';
                    }
                   ?> 
                   <?php foreach($departamento->ListarDepartamentoActivos() as $r): ?>
                      <option value="<?php echo $r->iddepartamento; ?>"><?php echo $r->codigodepartamento; ?>-<?php echo $r->nombre; ?></option>
                  <?php endforeach; ?>
              </select>
              <label for="seliddepartamento">Departamento</label>
            </div>

            <div class="input-field col s12">
               <i class="material-icons prefix">remove_red_eye</i>
               <input id="txtobservaciones" type="text" class="validate" name="txtobservaciones" maxlength="500" onkeypress="return letrasynumeros(event)"value="<?php echo $bien->observaciones; ?>">
               <label for="txtobservaciones">Observaciones</label>
            </div>
            
            <div class="input-field col s6">
                  <div class="input-field col s12 center">
                  <button type="submit" class="waves-effect waves-light btn grey darken-2"><i class="material-icons right">send</i>Guardar</button>
                  </div>
            </div>
        </div>
            </form>
            </div>

        </div>

      </div>

    </div>
    <br><br><br>
  </div>
