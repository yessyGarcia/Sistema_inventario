<?php

/*
    Lo que el controlador hace es interactuar con el usuario
    - Este manda peticiones al servidor 
    - Manda la información al modelo
    - Carga las vistas como respuesta al usuario
*/
require_once 'model/Movimiento.php';
require_once 'model/Usuario.php';
require_once 'model/Ubicacion.php';

class MovimientoController{
    
    private $model;
    private $modelUsuario;
    private $modelUbicacion;
    private $modelMovimiento;
    
    public function __CONSTRUCT(){
        //inicializa el modelo
        $this->model = new Movimiento();
        $this->modelUsuario = new Usuario();
        $this->modelUbicacion = new Ubicacion();
        $this->modelMovimiento = new Movimiento();
    }
    
    public function Index(){
        //llama todas las partes de la vista principal
        require_once 'view/include/cabecera_usuario.php';
        require_once 'view/principal_usuario.php';
        require_once 'view/include/pie_mostrar.php';
    }

    public function Consultar(){
        //llama todas las partes de la vista principal
        require_once 'view/include/cabecera_usuario.php';
        require_once 'view/mostrar_movimiento.php';
        require_once 'view/include/pie_mostrar.php';
    }
    
    public function ConsultarCustodio(){
        //llama todas las partes de la vista principal
        require_once 'view/include/cabecera_custodio.php';
        require_once 'view/mostrar_movimiento_custodio.php';
        require_once 'view/include/pie_mostrar.php';
    }

    public function Seleccionar_Custodio(){
        //llama todas las partes de la vista principal
        require_once 'view/include/cabecera_usuario.php';
        require_once 'view/seleccionar_custodio_movimiento.php';
        require_once 'view/include/pie.php';
    }

    public function Seleccionar_Ubicacion(){
        //llama todas las partes de la vista principal
        require_once 'view/include/cabecera_usuario.php';
        require_once 'view/seleccionar_ubicacion_movimiento.php';
        require_once 'view/include/pie.php';
    }

    public function Crud(){
        $usuario = new Usuario();
        $ubicacion = new Ubicacion();
      
        if(isset($_REQUEST['selidusuariocustodio'])){
            //si tiene el parámetro asignado ejecutamos el método
            $usuario = $this->modelUsuario->ObtenerUsuario($_REQUEST['selidusuariocustodio']);
            $ubicacion = $this->modelUbicacion->ObtenerUbicacion($_REQUEST['selidubicacion']);
          
        }
        
        //
        //llama todas las partes de la vista guardar
        require_once 'view/include/cabecera_usuario.php';
        require_once 'view/registrar_movimiento.php';
        require_once 'view/include/pie.php';
    }

    public function CrudCustodio(){
        $usuario = new Usuario();
        $ubicacion = new Ubicacion();
        
        session_start();
            //si tiene el parámetro asignado ejecutamos el método
            $usuario = $this->modelUsuario->ObtenerUsuario($_SESSION['id']);

            if(isset($_REQUEST['selidubicacion'])){
            $ubicacion = $this->modelUbicacion->ObtenerUbicacion($_REQUEST['selidubicacion']);
           
        }
        
        //
        //llama todas las partes de la vista guardar
        require_once 'view/include/cabecera_custodio.php';
        require_once 'view/registrar_movimiento.php';
        require_once 'view/include/pie.php';
    }
    
    public function Guardar(){
        $movimiento = new Movimiento();
        
        //captura todos los datos según el número de bienes
        for ($i=1; $i <= $_REQUEST['txtCantidadBien']; $i++) { 

            $movimiento->idmovimiento = $_REQUEST['txtidmovimiento'];
            $movimiento->fechatraslado = $_REQUEST['txtfechatraslado'];
            $movimiento->idbien = $_REQUEST['idbien'+$i];
            $movimiento->idusuariocustodio = $_REQUEST['selidusuariocustodio'];
            $movimiento->idusuarionuevocustodio = $_REQUEST['selidusuarionuevocustodio'];
            $movimiento->destino = $_REQUEST['seldestino'];
            $movimiento->idtipomovimiento = $_REQUEST['selidtipomovimiento'];
            $movimiento->justificacion = $_REQUEST['txtjustificacion'];
            $movimiento->centrocostosenvia = $_REQUEST['selenvia'];
            $movimiento->centrocostosrecibe = $_REQUEST['selrecibe'];

            //si el id es mayor que cero Actualiza si no registra
            $movimiento->idmovimiento > 0 
                ? $this->model->ActualizarMovimiento($movimiento)
                : $this->model->RegistrarMovimiento($movimiento);

        }
        
        //redirecciona a la vista index
        header('Location: index.php?c=Movimiento&a=Consultar');
    }
 }
    
