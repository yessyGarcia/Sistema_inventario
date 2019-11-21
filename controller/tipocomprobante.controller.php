<?php

/*
    Lo que el controlador hace es interactuar con el usuario
    - Este manda peticiones al servidor 
    - Manda la información al modelo
    - Carga las vistas como respuesta al usuario
*/
require_once 'model/Tipocomprobante.php';

class TipocomprobanteController{
    
    private $model;
    
    public function __CONSTRUCT(){
        //inicializa el modelo Alumno
        $this->model = new Tipocomprobante();
    }
    
    public function Index(){
        //llama todas las partes de la vista principal
        require_once 'view/include/cabecera_usuario.php';
        require_once 'view/principal_usuario.php';
        require_once 'view/include/pie.php';
    }

    public function Consultar(){
        //llama todas las partes de la vista principal
        require_once 'view/include/cabecera_usuario.php';
        require_once 'view/mostrar_tipocomprobante.php';
        require_once 'view/include/pie_mostrar.php';
    }

    public function Crud(){
        $tipocomprobante = new Tipocomprobante();
        
        if(isset($_REQUEST['id'])){
            //si tiene el parámetro asignado ejecutamos el método
            $tipocomprobante = $this->model->ObtenerTipocomprobante($_REQUEST['id']);
        }
        
        //
        //llama todas las partes de la vista guardar
        require_once 'view/include/cabecera_usuario.php';
        require_once 'view/registrar_tipocomprobante.php';
        require_once 'view/include/pie.php';
    }
    
    public function Guardar(){
        $tipocomprobante = new Tipocomprobante();
        
        //captura todos los datos
        $tipocomprobante->idtipocomprobante = $_REQUEST['txtidtipocomprobante'];
        $tipocomprobante->nombre = $_REQUEST['txtnombre'];
      
        //si el id es mayor que cero Actualiza si no registra
        $tipocomprobante->idtipocomprobante > 0 
            ? $this->model->ActualizarTipocomprobante($tipocomprobante)
            : $this->model->RegistrarTipocomprobante($tipocomprobante);
        
        //redirecciona a la vista index
        header('Location: index.php?c=Tipocomprobante&a=Consultar');
    }
    
    public function CambiarEstado(){
        $this->model->CambiarEstadoTipocomprobante($_REQUEST['nuevo_estado'],$_REQUEST['id']);
        header('Location: index.php?c=Tipocomprobante&a=Consultar');
    }
}