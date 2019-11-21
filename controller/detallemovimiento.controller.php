<?php

/*
    Lo que el controlador hace es interactuar con el usuario
    - Este manda peticiones al servidor 
    - Manda la información al modelo
    - Carga las vistas como respuesta al usuario
*/
require_once 'model/Detallemovimiento.php';

class DetallemovimientoController{
    
    private $model;
    
    public function __CONSTRUCT(){
        //inicializa el modelo Alumno
        $this->model = new Detallemovimiento();
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
        require_once 'view/mostrar_detallemovimiento.php';
        require_once 'view/include/pie_mostrar.php';
    }

    public function Crud(){
        $detallemovimiento = new Detallemovimiento();
        
        if(isset($_REQUEST['id'])){
            //si tiene el parámetro asignado ejecutamos el método
            $sala = $this->model->ObtenerSala($_REQUEST['id']);
        }
        
        //
        //llama todas las partes de la vista guardar
        require_once 'view/include/cabecera_usuario.php';
        require_once 'view/registrar_detallemovimiento.php';
        require_once 'view/include/pie.php';
    }
    public function CrudCustodio(){
        $detallemovimiento = new Detallemovimiento();
        
        if(isset($_REQUEST['id'])){
            //si tiene el parámetro asignado ejecutamos el método
            $sala = $this->model->ObtenerSala($_REQUEST['id']);
        }
        
        //
        //llama todas las partes de la vista guardar
        require_once 'view/include/cabecera_custodio.php';
        require_once 'view/registrar_detallemovimiento.php';
        require_once 'view/include/pie.php';
    }
    
    public function Guardar(){
        $detallemovimiento = new Detallemovimiento();
        
        //captura todos los datos
        $detallemovimiento->idmovimiento = $_REQUEST['selidmovimiento'];
        $detallemovimiento->idbien = $_REQUEST['selidbien'];
       

        //si el id es mayor que cero Actualiza si no registra
        $detallemovimiento->iddetallemovimiento > 0 
            ? $this->model->ActualizarDetallemovimiento($detallemovimiento)
            : $this->model->RegistrarDetallemovimiento($detallemovimiento);
        
        //redirecciona a la vista index
        header('Location: index.php?c=Detallemovimiento&a=Consultar');
    }
    
    public function CambiarEstado(){
        $this->model->CambiarEstadoDetallemovimiento($_REQUEST['nuevo_estado'],$_REQUEST['id']);
        header('Location: index.php?c=Detallemovimiento&a=Consultar');
    }
}