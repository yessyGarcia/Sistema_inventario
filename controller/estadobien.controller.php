<?php

/*
    Lo que el controlador hace es interactuar con el usuario
    - Este manda peticiones al servidor 
    - Manda la información al modelo
    - Carga las vistas como respuesta al usuario
*/
require_once 'model/Estadobien.php';

class EstadobienController{
    
    private $model;
    
    public function __CONSTRUCT(){
        //inicializa el modelo Alumno
        $this->model = new Estadobien();
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
        require_once 'view/mostrar_estadobien.php';
        require_once 'view/include/pie_mostrar.php';
    }

    public function Crud(){
        $estadobien = new Estadobien();
        
        if(isset($_REQUEST['id'])){
            //si tiene el parámetro asignado ejecutamos el método
            $estadobien = $this->model->ObtenerEstadobien($_REQUEST['id']);
        }
        
        //
        //llama todas las partes de la vista guardar
        require_once 'view/include/cabecera_usuario.php';
        require_once 'view/registrar_estadobien.php';
        require_once 'view/include/pie.php';
    }
    
    public function Guardar(){
        $estadobien = new Estadobien();
        
        //captura todos los datos
        $estadobien->idestadobien = $_REQUEST['txtidestadobien'];
        $estadobien->nombre = $_REQUEST['txtnombre'];
      
        //si el id es mayor que cero Actualiza si no registra
        $estadobien->idestadobien > 0 
            ? $this->model->ActualizarEstadobien($estadobien)
            : $this->model->RegistrarEstadobien($estadobien);
        
        //redirecciona a la vista index
        header('Location: index.php?c=Estadobien&a=Consultar');
    }
    
    public function CambiarEstado(){
        $this->model->CambiarEstadobien($_REQUEST['nuevo_estado'],$_REQUEST['id']);
        header('Location: index.php?c=Estadobien&a=Consultar');
    }

    public function Update(){
        
        $estadobien = new Estadobien();
        
        if(isset($_REQUEST['id'])){
            //si tiene el parámetro asignado ejecutamos el método
            $estadobien = $this->model->ObtenerEstadobien($_REQUEST['id']);
        }
    }
}