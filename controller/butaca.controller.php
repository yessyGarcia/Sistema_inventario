<?php

/*
    Lo que el controlador hace es interactuar con el usuario
    - Este manda peticiones al servidor 
    - Manda la información al modelo
    - Carga las vistas como respuesta al usuario
*/
require_once 'model/Clasificacionbien.php';

class ButacaController{
    
    private $model;
    
    public function __CONSTRUCT(){
        //inicializa el modelo Alumno
        $this->model = new Clasificacionbien();
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
        require_once 'view/mostrar_butaca.php';
        require_once 'view/include/pie.php';
    }

    public function Crud(){
        $clasificacionbien = new clasificacionbien();
        
        if(isset($_REQUEST['id'])){
            //si tiene el parámetro asignado ejecutamos el método
            $clasificacionbien = $this->model->Obtenerclasificacionbien($_REQUEST['id']);
        }
        
        //
        //llama todas las partes de la vista guardar
        require_once 'view/include/cabecera_usuario.php';
        require_once 'view/registrar_clasificacionbien.php';
        require_once 'view/include/pie.php';
    }
    
    public function Guardar(){
        $clasificacionbien = new Clasificacionbien();
        
        //captura todos los datos
        //$clasificacionbien->idclasificacionbien = $_REQUEST['txtIdclasificacionbien'];
        $clasificacionbien->nombre = $_REQUEST['txtnombre'];
        
        //si el id es mayor que cero Actualiza si no registra
        $clasificacionbien->idclasificacionbien > 0 
            ? $this->model->ActualizarButaca($clasificacionbien)
            : $this->model->RegistrarClasificacionbien($clasificacionbien);
        
        //redirecciona a la vista index
        header('Location: index.php?c=Butaca&a=Consultar');
    }
    
    public function CambiarEstado(){
        $this->model->CambiarEstadoButaca($_REQUEST['nuevo_estado'],$_REQUEST['id']);
        header('Location: index.php?c=Butaca&a=Consultar');
    }
}