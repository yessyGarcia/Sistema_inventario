<?php

/*
    Lo que el controlador hace es interactuar con el usuario
    - Este manda peticiones al servidor 
    - Manda la información al modelo
    - Carga las vistas como respuesta al usuario
*/
require_once 'model/Ubicacion.php';

class UbicacionController{
    
    private $model;
    
    public function __CONSTRUCT(){
        //inicializa el modelo 
        $this->model = new Ubicacion();
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
        require_once 'view/mostrar_ubicacion.php';
        require_once 'view/include/pie_mostrar.php';
    }

    public function Crud(){
          $ubicacion = new Ubicacion();
        
        if(isset($_REQUEST['id'])){
            //si tiene el parámetro asignado ejecutamos el método
            $ubicacion = $this->model->ObtenerUbicacion($_REQUEST['id']);
        }
        
        //llama todas las partes de la vista guardar
        require_once 'view/include/cabecera_usuario.php';
        require_once 'view/registrar_ubicacion.php';
        require_once 'view/include/pie.php';
    }

     public function Guardar(){
        $ubicacion = new Ubicacion();
        
        //captura todos los datos
        $ubicacion->idubicacion = $_REQUEST['txtidubicacion'];
        $ubicacion->nombre = $_REQUEST['txtnombre'];
        $ubicacion->descripcion = $_REQUEST['txtdescripcion'];
        
         //si el id es mayor que cero Actualiza si no registra
         $ubicacion->idubicacion > 0 
         ? $this->model->ActualizarUbicacion($ubicacion)
         : $this->model->RegistrarUbicacion($ubicacion);
         
        //redirecciona a la vista index
        header('Location: index.php?c=Ubicacion&a=Consultar');
    } 
    
    public function CambiarEstado(){
        $this->model->CambiarEstadoUbicacion($_REQUEST['nuevo_estado'],$_REQUEST['id']);
        header('Location: index.php?c=Ubicacion&a=Consultar');
    }

     public function Update(){
        
        $ubicacion = new Ubicacion();
        
        if(isset($_REQUEST['id'])){
            //si tiene el parámetro asignado ejecutamos el método
            $ubicacion = $this->model->ObtenerUbicacion($_REQUEST['id']);
        }
    }


}