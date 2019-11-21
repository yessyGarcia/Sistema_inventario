<?php

/*
    Lo que el controlador hace es interactuar con el usuario
    - Este manda peticiones al servidor 
    - Manda la información al modelo
    - Carga las vistas como respuesta al usuario
*/
require_once 'model/Tipomovimiento.php';

class TipomovimientoController{
    
    private $model;
    
    public function __CONSTRUCT(){
        //inicializa el modelo Alumno
        $this->model = new  Tipomovimiento();
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
        require_once 'view/mostrar_tipomovimiento.php';
        require_once 'view/include/pie_mostrar.php';
    }

    public function Crud(){
        $tipomovimiento = new  Tipomovimiento();
        
        if(isset($_REQUEST['id'])){
            //si tiene el parámetro asignado ejecutamos el método
            $tipomovimiento = $this->model->ObtenerTipomovimiento($_REQUEST['id']);
        }
        
        //
        //llama todas las partes de la vista guardar
        require_once 'view/include/cabecera_usuario.php';
        require_once 'view/registrar_tipomovimiento.php';
        require_once 'view/include/pie.php';
    }
    
    public function Guardar(){
        $tipomovimiento = new  Tipomovimiento();
        
        //captura todos los datos 
        $tipomovimiento->idtipomovimiento = $_REQUEST['txtidtipomovimiento'];
        $tipomovimiento->nombre = $_REQUEST['txtnombre'];  
      
        
        //si el id es mayor que cero Actualiza si no registra
        $tipomovimiento->idtipomovimiento > 0 
            ? $this->model->ActualizarTipomovimiento($tipomovimiento)
            : $this->model->RegistrarTipomovimiento($tipomovimiento);
        
        //redirecciona a la vista index
        header('Location: index.php?c=Tipomovimiento&a=Consultar');
    }
    
    public function CambiarEstado(){
        $this->model->CambiarEstadoTipomovimiento($_REQUEST['nuevo_estado'],$_REQUEST['id']);
        header('Location: index.php?c=Tipomovimiento&a=Consultar');
    }
}