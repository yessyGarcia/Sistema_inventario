<?php

/*
    Lo que el controlador hace es interactuar con el usuario
    - Este manda peticiones al servidor 
    - Manda la información al modelo
    - Carga las vistas como respuesta al usuario
*/
require_once 'model/Departamento.php';

class DepartamentoController{
    
    private $model;
    
    public function __CONSTRUCT(){
        //inicializa el modelo 
        $this->model = new Departamento();
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
        require_once 'view/mostrar_departamento.php';
        require_once 'view/include/pie_mostrar.php';
    }

    public function Crud(){
          $departamento = new Departamento();
        
        if(isset($_REQUEST['id'])){
            //si tiene el parámetro asignado ejecutamos el método
            $departamento = $this->model->ObtenerDepartamento($_REQUEST['id']);
        }
        
        //llama todas las partes de la vista guardar
        require_once 'view/include/cabecera_usuario.php';
        require_once 'view/registrar_departamento.php';
        require_once 'view/include/pie.php';
    }

     public function Guardar(){
        $departamento = new Departamento();
        
        //captura todos los datos
        $departamento->iddepartamento = $_REQUEST['txtiddepartamento'];
        $departamento->nombre = $_REQUEST['txtnombre'];
        $departamento->codigodepartamento = $_REQUEST['txtcodigodepartamento'];
        
         //si el id es mayor que cero Actualiza si no registra
         $departamento->iddepartamento > 0 
         ? $this->model->ActualizarDepartamento($departamento)
         : $this->model->RegistrarDepartamento($departamento);
         
        //redirecciona a la vista index
        header('Location: index.php?c=Departamento&a=Consultar');
    } 
    
    public function CambiarEstado(){
        $this->model->CambiarEstadodepartamento($_REQUEST['nuevo_estado'],$_REQUEST['id']);
        header('Location: index.php?c=Departamento&a=Consultar');
    }

     public function Update(){
        
        $departamento = new Departamento();
        
        if(isset($_REQUEST['id'])){
            //si tiene el parámetro asignado ejecutamos el método
            $departamento = $this->model->ObtenerDepartamento($_REQUEST['id']);
        }
    }

   

   /* public function Actualizar(){
        $departamento = new Departamento();
        
        //captura todos los datos
       
        $departamento->nombre = $_REQUEST['txtnombre'];
        $departamento->codigodepartamento = $_REQUEST['txtcodigodepartamento'];
        
        //Actualizar
        $this->model->ActualizarDepartamento($departamento);
        
        //redirecciona a la vista index
        header('Location: index.php?c=Departamento&a=Consultar');
    }     
    
    /*public function CambiarImagen(){
        $departamento = new departamento();
        
        if(isset($_REQUEST['id'])){
            //si tiene el parámetro asignado ejecutamos el método
            $departamento = $this->model->Obtenerdepartamento($_REQUEST['id']);
        }
        
        //llama todas las partes de la vista guardar
        require_once 'view/include/cabecera_usuario.php';
        require_once 'view/imagen_departamento.php';
        require_once 'view/include/pie.php';
    } */

   
   
}