<?php

/*
    Lo que el controlador hace es interactuar con el usuario
    - Este manda peticiones al servidor 
    - Manda la información al modelo
    - Carga las vistas como respuesta al usuario
*/
require_once 'model/Horario.php';

class HorarioController{
    
    private $model;
    
    public function __CONSTRUCT(){
        //inicializa el modelo Alumno
        $this->model = new Horario();
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
        require_once 'view/mostrar_horario.php';
        require_once 'view/include/pie.php';
    }

    public function Crud(){
        $horario = new Horario();
        
        if(isset($_REQUEST['id'])){
            //si tiene el parámetro asignado ejecutamos el método
            $horario = $this->model->ObtenerHorario($_REQUEST['id']);
        }
        
        //llama todas las partes de la vista guardar
        require_once 'view/include/cabecera_usuario.php';
        require_once 'view/registrar_fuentefinanciamiento.php';
        require_once 'view/include/pie.php';
    }
    
    public function Guardar(){
        $horario = new Horario();
        
        //captura todos los datos
        $horario->idhorario = $_REQUEST['txtIdhorario'];
        $horario->fechapelicula = $_REQUEST['txtFechaPelicula'];
        $horario->horapelicula = $_REQUEST['txtHoraPelicula'];
        $horario->idpelicula = $_REQUEST['selPelicula'];
        $horario->idsala = $_REQUEST['selSala'];

        //si el id es mayor que cero Actualiza si no registra
        $horario->idhorario > 0 
            ? $this->model->ActualizarHorario($horario)
            : $this->model->RegistrarHorario($horario);
        
        //redirecciona a la vista index
        header('Location: index.php?c=Horario&a=Consultar');
    }
    
    public function CambiarEstado(){
        $this->model->CambiarEstadoHorario($_REQUEST['nuevo_estado'],$_REQUEST['id']);
        header('Location: index.php?c=Horario&a=Consultar');
    }
}