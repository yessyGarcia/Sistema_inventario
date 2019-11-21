<?php

/*
    Lo que el controlador hace es interactuar con el usuario
    - Este manda peticiones al servidor 
    - Manda la información al modelo
    - Carga las vistas como respuesta al usuario
*/
require_once 'model/Tipousuario.php';

class TipousuarioController{
    
    private $model;
    
    public function __CONSTRUCT(){
        //inicializa el modelo Alumno
        $this->model = new Tipousuario();
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
        require_once 'view/mostrar_tipousuario.php';
        require_once 'view/include/pie_mostrar.php';
    }

    public function Crud(){
        $tipousuario = new Tipousuario();
        
        if(isset($_REQUEST['id'])){
            //si tiene el parámetro asignado ejecutamos el método
            $tipousuario = $this->model->ObtenerTipousuario($_REQUEST['id']);
        }
        
        //
        //llama todas las partes de la vista guardar
        require_once 'view/include/cabecera_usuario.php';
        require_once 'view/registrar_tipousuario.php';
        require_once 'view/include/pie.php';
    }
    
    public function Guardar(){
        $Tipousuario = new Tipousuario();
        
        //captura todos los datos
        $Tipousuario->idtipousuario = $_REQUEST['txtidtipousuario'];
        $Tipousuario->nombre = $_REQUEST['txtnombre'];
        

        //si el id es mayor que cero Actualiza si no registra
        $Tipousuario->idtipousuario > 0 
            ? $this->model->ActualizarTipousuario($Tipousuario)
            : $this->model->RegistrarTipousuario($Tipousuario);
        
        //redirecciona a la vista index
        header('Location: index.php?c=Tipousuario&a=Consultar');
    }
    
    public function CambiarEstadoTipousuario(){
        $this->model->CambiarEstadoTipousuario($_REQUEST['nuevo_estado'],$_REQUEST['id']);
        header('Location: index.php?c=Tipousuario&a=Consultar');
    }
}