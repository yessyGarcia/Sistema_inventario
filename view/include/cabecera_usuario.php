<?php
  //validar la sesión
  @session_start();
  if(!isset($_SESSION["id"])){
    header('Location: index.php?c=Login&a=Index');
  }
?>
<!DOCTYPE html>
<html lang="es">
<head>  
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Inventario Zacatecoluca</title>

  <!-- CSS  -->
  <link href="materializecss/css/icon.css" rel="stylesheet">
  <link href="materializecss/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="materializecss/css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="materializecss/css/jquery.dataTables.min.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link rel="shortcut icon" type="../image/x-icon" href="materializecss/img/favicon.ico">
</head>

<body>

<!-- opciones del menú usuario-->
<ul id="usuario" class="dropdown-content">
  <li><a href="index.php" title="<?php echo $_SESSION["email"]; ?>">Salir</a></li>
  <li class="divider"></li>
  <li><a href="?c=Usuario&a=ActualizarClave">Cambiar Clave</a></li>
  <li class="divider"></li>
  <li><a href="?c=Usuario&a=Crud">Usuario</a></li>
  <li class="divider"></li>
  <li><a href="?c=Tipousuario&a=Crud">Tipo usuario</a></li>
</ul>

  <!-- opciones del menú registrar-->
  <ul id="registro" class="dropdown-content">
    <li><a href="?c=Bien&a=Crud">Bien</a></li>
    <li class="divider"></li>
    <li><a href="?c=Clasificacionbien&a=Crud">Clasificación del bien</a></li>
    <li class="divider"></li>
    <li><a href="?c=Fuentefinanciamiento&a=Crud">Fuente de financiamiento</a></li>
    <li class="divider"></li>
    <li><a href="?c=Tipocomprobante&a=Crud">Tipo de Comprobante</a></li>
    <li class="divider"></li>
    <li><a href="?c=Departamento&a=Crud">Departamento</a></li>
    <li class="divider"></li>
    <li><a href="?c=Ubicacion&a=Crud">Ubicación</a></li>
    <li class="divider"></li>
    <li><a href="?c=Estadobien&a=Crud">Estado del bien</a></li>
    <li class="divider"></li>
    <li><a href="?c=Tipomovimiento&a=Crud">Tipo de Movimiento</a></li>
    <li class="divider"></li>
    <li><a href="?c=Movimiento&a=Seleccionar_Custodio">Movimiento</a></li>
  </ul>
  
  <!-- opciones del menú consultar-->
  <ul id="consulta" class="dropdown-content">
    <li><a href="?c=Bien&a=Consultar">Bien</a></li>
    <li class="divider"></li>
    <li><a href="?c=Clasificacionbien&a=Consultar">Clasificación del bien</a></li>
    <li class="divider"></li>
    <li><a href="?c=Fuentefinanciamiento&a=Consultar">Fuente de financiamiento</a></li>
    <li class="divider"></li>
    <li><a href="?c=Tipocomprobante&a=Consultar">Tipo de Comprobante</a></li>
    <li class="divider"></li>
    <li><a href="?c=Departamento&a=Consultar">Departamento</a></li>
    <li class="divider"></li>
    <li><a href="?c=Ubicacion&a=Consultar">Ubicación</a></li>
    <li class="divider"></li>
    <li><a href="?c=Estadobien&a=Consultar">Estado del bien</a></li>
    <li class="divider"></li>
    <li><a href="?c=Tipomovimiento&a=Consultar">Tipo de Movimiento</a></li>
    <li class="divider"></li>
    <li><a href="?c=Movimiento&a=Consultar">Movimiento</a></li>
    <li class="divider"></li>
    <li><a href="?c=Usuario&a=Consultar">Usuario</a></li>
    <li class="divider"></li>
    <li><a href="?c=Tipousuario&a=Consultar">Tipo usuario</a></li>
  </ul>


  <!-- para el nav-bar-->  
<!-- opciones del menú usuario-->
<ul id="usuario-m" class="dropdown-content">
  <li><a href="index.php" title="<?php echo $_SESSION["email"]; ?>">Salir</a></li>
  <li class="divider"></li>
  <li><a href="?c=Usuario&a=ActualizarClave">Cambiar Clave</a></li>
  <li class="divider"></li>
  <li><a href="?c=Usuario&a=Crud">Usuario</a></li>
  <li class="divider"></li>
  <li><a href="?c=Tipousuario&a=Crud">Tipo usuario</a></li>
</ul>
  <!-- opciones del menú registrar-->
<ul id="registro-m" class="dropdown-content">
    <li><a href="?c=Bien&a=Crud">Bien</a></li>
    <li class="divider"></li>
    <li><a href="?c=Clasificacionbien&a=Crud">Clasificación del bien</a></li>
    <li class="divider"></li>
    <li><a href="?c=Fuentefinanciamiento&a=Crud">Fuente de financiamiento</a></li>
    <hr>
    <li><a href="?c=Tipocomprobante&a=Crud">Tipo de Comprobante</a></li>
    <li class="divider"></li>
    <li><a href="?c=Departamento&a=Crud">Departamento</a></li>
    <li class="divider"></li>
    <li><a href="?c=Ubicacion&a=Crud">Ubicación</a></li>
    <li class="divider"></li>
    <li><a href="?c=Estadobien&a=Crud">Estado del bien</a></li>
    <li class="divider"></li>
    <li><a href="?c=Tipomovimiento&a=Crud">Tipo de Movimiento</a></li>
    <li class="divider"></li>
    <li><a href="?c=Movimiento&a=Seleccionar_Custodio">Movimiento</a></li>
</ul>
  
  <!-- opciones del menú consultar-->
  <ul id="consulta-m" class="dropdown-content">
    <li><a href="?c=Bien&a=Consultar">Bien</a></li>
    <hr>
    <li><a href="?c=Clasificacionbien&a=Consultar">Clasificación del bien</a></li>
    <li class="divider"></li><li class="divider"></li>
    <li><a href="?c=Fuentefinanciamiento&a=Consultar">Fuente de financiamiento</a></li>
    <li class="divider"></li>
    <li><a href="?c=Tipocomprobante&a=Consultar">Tipo de Comprobante</a></li>
    <li class="divider"></li>
    <li><a href="?c=Departamento&a=Consultar">Departamento</a></li>
    <li class="divider"></li>
    <li><a href="?c=Ubicacion&a=Consultar">Ubicación</a></li>
    <li class="divider"></li>
    <li><a href="?c=Estadobien&a=Consultar">Estado del bien</a></li>
    <li class="divider"></li>
    <li><a href="?c=Tipomovimiento&a=Consultar">Tipo de Movimiento</a></li>
    <li class="divider"></li>
    <li><a href="?c=Movimiento&a=Consultar">Movimiento</a></li>
    <li class="divider"></li><li class="divider"></li>
    <li><a href="?c=Usuario&a=Consultar">Usuario</a></li>
    <li class="divider"></li>
    <li><a href="?c=Tipousuario&a=Consultar">Tipo usuario</a></li>
  </ul>
  <nav class="red darken-4" role="navigation">
    <div class="nav-wrapper container"><a id="logo-container" href="?c=Principal&a=Index" class="brand-logo" title="Cine para todos...">
        <i class="large material-icons"><img src="materializecss/img/logo.png"></i></a>
      <ul class="right hide-on-med-and-down">
        <li><a href="?c=Principal&a=Index" title="Inicio"><i class="material-icons">home</i></a></li>
        <!-- para el menú registro -->
        <li><a class="dropdown-trigger" href="#!" data-target="registro">Registrar<i class="material-icons right">arrow_drop_down</i></a></li>
        <!-- para el menú cosulta -->
        <li><a class="dropdown-trigger" href="#!" data-target="consulta">Consultar<i class="material-icons right">arrow_drop_down</i></a></li>      
        <li><a class="dropdown-trigger" href="#!" data-target="usuario" title=""><?php echo $_SESSION["nombre"]." ".$_SESSION["apellido"]; ?><i class="material-icons right">arrow_drop_down</i></a></li>
        
      </ul>

      <ul id="nav-mobile" class="sidenav grey darken-2">
        <li><a href="?c=Principal&a=Index" title="Inicio"><i class="material-icons white-text">home</i></a></li>
        <!-- para el menú registro -->
        <li><a class="dropdown-trigger white-text" href="#!" data-target="registro-m">Registrar<i class="material-icons right white-text">arrow_drop_down</i></a></li>
        <!-- para el menú cosulta -->
        <li><a class="dropdown-trigger white-text" href="#!" data-target="consulta-m">Consultar<i class="material-icons right white-text">arrow_drop_down</i></a></li>       
        <li><a class="dropdown-trigger white-text" href="#!" data-target="usuario-m"><?php echo $_SESSION["nombre"]." ".$_SESSION["apellido"]; ?><i class="material-icons right white-text">arrow_drop_down</i></a></li>
        
      </ul>
      <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
    </div>
  </nav>