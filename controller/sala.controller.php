<?php

/*
    Lo que el controlador hace es interactuar con el usuario
    - Este manda peticiones al servidor 
    - Manda la información al modelo
    - Carga las vistas como respuesta al usuario
*/
require_once 'model/Sala.php';

class SalaController{
    
    private $model;
    
    public function __CONSTRUCT(){
        //inicializa el modelo Alumno
        $this->model = new Sala();
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
        require_once 'view/mostrar_sala.php';
        require_once 'view/include/pie.php';
    }

    public function Crud(){
        $sala = new Sala();
        
        if(isset($_REQUEST['id'])){
            //si tiene el parámetro asignado ejecutamos el método
            $sala = $this->model->ObtenerSala($_REQUEST['id']);
        }
        
        //
        //llama todas las partes de la vista guardar
        require_once 'view/include/cabecera_usuario.php';
        require_once 'view/registrar_bien.php';
        require_once 'view/include/pie.php';
    }
    
    public function Guardar(){
        $sala = new Sala();
        
        //captura todos los datos
        $sala->idsala = $_REQUEST['txtIdsala'];
        $sala->nombre = $_REQUEST['txtNombre'];
        $sala->tipo = $_REQUEST['txtTipo'];

        //si el id es mayor que cero Actualiza si no registra
        $sala->idsala > 0 
            ? $this->model->ActualizarSala($sala)
            : $this->model->RegistrarSala($sala);
        
        //redirecciona a la vista index
        header('Location: index.php?c=Sala&a=Consultar');
    }
    
    public function CambiarEstado(){
        $this->model->CambiarEstadoSala($_REQUEST['nuevo_estado'],$_REQUEST['id']);
        header('Location: index.php?c=Sala&a=Consultar');
    }
}