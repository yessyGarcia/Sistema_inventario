<?php

require_once 'model/Fuentefinanciamiento.php';

class FuentefinanciamientoController{
    
    private $model;
    
    public function __CONSTRUCT(){
        //inicializa el modelo Alumno
        $this->model = new Fuentefinanciamiento();
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
        require_once 'view/mostrar_fuentefinanciamiento.php';
        require_once 'view/include/pie_mostrar.php';
    }

    public function Crud(){
        $fuentefinanciamiento = new Fuentefinanciamiento();
        
        if(isset($_REQUEST['id'])){
            //si tiene el parámetro asignado ejecutamos el método
            $fuentefinanciamiento = $this->model->ObtenerFuentefinanciamiento($_REQUEST['id']);
        }
        
        //llama todas las partes de la vista guardar
        require_once 'view/include/cabecera_usuario.php';
        require_once 'view/registrar_fuentefinanciamiento.php';
        require_once 'view/include/pie.php';
    }
    
    public function Guardar(){
        $fuentefinanciamiento = new Fuentefinanciamiento();
        
        //captura todos los datos
        $fuentefinanciamiento->idfuentefinanciamiento = $_REQUEST['txtidfuentefinanciamiento'];
        $fuentefinanciamiento->nombre = $_REQUEST['txtnombre'];
        $fuentefinanciamiento->codigofuentefinanciamiento = $_REQUEST['txtcodigofuentefinanciamiento'];
      

        //si el id es mayor que cero Actualiza si no registra
        $fuentefinanciamiento->idfuentefinanciamiento > 0 
            ? $this->model->ActualizarFuentefinanciamiento($fuentefinanciamiento)
            : $this->model->RegistrarFuentefinanciamiento($fuentefinanciamiento);
        
        //redirecciona a la vista index
        header('Location: index.php?c=Fuentefinanciamiento&a=Consultar');
    }
    
    public function CambiarEstado(){
        $this->model->CambiarEstadoFuentefinanciamiento($_REQUEST['nuevo_estado'],$_REQUEST['id']);
        header('Location: index.php?c=Fuentefinanciamiento&a=Consultar');
    }
}