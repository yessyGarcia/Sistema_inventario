<!-- cuerpo del index -->
  <div class="section no-pad-bot" id="index-banner">
    <div class="container">
      <br><br>
      <div class="center"><i class="large material-icons grey-text text-darken-2"><img src="materializecss/img/logo.png"></i></div>
      <h2 class="header center grey-text text-darken-2">Bienvenid@</h2>
      <h3 class="header center grey-text text-darken-2"><?php echo $_SESSION["nombre"]." ".$_SESSION["apellido"];?></h3>
    </div>
  </div>

  <div class="container">
    <div class="section">

      <!--   Icon Section   -->
      <div class="row">
      <div class="col s12 m6">
          <div class="icon-block hoverable">
                <a href="?c=Bien&a=CrudCustodio" class="red-text text-darken-4"><h2 class="center"><i class="material-icons">book</i></h2>
            <h5 class="center">Registrar bien</h5></a>

          </div>
        </div>
        
        <div class="col s12 m6">
          <div class="icon-block hoverable">
            <a href="?c=Movimiento&a=CrudCustodio" class="red-text text-darken-4"><h2 class="center"><i class="material-icons">loop</i></h2>
            <h5 class="center">Realizar Movimiento</h5></a>

          </div>
        </div>
  </div>

    </div>
    <br><br>
  </div>