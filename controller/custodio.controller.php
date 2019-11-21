<?php

/*
    Lo que el controlador hace es interactuar con el usuario
    - Este manda peticiones al servidor 
    - Manda la información al modelo
    - Carga las vistas como respuesta al usuario
*/
require_once 'model/Custodio.php';

class CustodioController{
    
    private $model;
    
    public function __CONSTRUCT(){
        //inicializa el modelo Alumno
        $this->model = new Custodio();
    }
    
    public function Index(){
        //llama todas las partes de la vista principal
        require_once 'view/include/cabecera_custodio.php';
        require_once 'view/principal_custodio.php';
        require_once 'view/include/pie.php';
   
    }

    public function Consultar(){
        //llama todas las partes de la vista principal
        require_once 'view/include/cabecera_custodio.php';
        require_once 'view/mostrar_custodio.php';
        require_once 'view/include/pie_mostrar.php';
    }

    public function Crud(){
        $custodio = new Custodio(); 
        
        
        if(isset($_REQUEST['id'])){
            //si tiene el parámetro asignado ejecutamos el método
            $custodio = $this->model->ObtenerCustodio($_REQUEST['id']);
           
        }
        
        //
        //llama todas las partes de la vista guardar
        require_once 'view/include/cabecera_custodio.php';
        require_once 'view/registrar_custodio.php';
        require_once 'view/include/pie.php';
    }
    
    public function Guardar(){
        $custodio = new Custodio();
        
        //captura todos los datos
     
        $custodio->nombre = $_REQUEST['txtnombre'];
        $custodio->apellido = $_REQUEST['txtapellido'];
        $custodio->email = $_REQUEST['txtemail'];
        $custodio->clave = $_REQUEST['txtclave'];
        $custodio->idtipocustodio = $_REQUEST['selidtipocustodio'];
       

        //si el id es mayor que cero Actualiza si no registra
        $custodio->idcustodio > 0 
            ? $this->model->ActualizarCustodio($custodio)
            : $this->model->RegistrarCustodio($custodio);
        
        //redirecciona a la vista index
        header('Location: index.php?c=Custodio&a=Consultar');
    }
          
    
    public function CambiarEstado(){
        $this->model->CambiarEstadocustodio($_REQUEST['nuevo_estado'],$_REQUEST['id']);
        header('Location: index.php?c=Custodio&a=Consultar');
    }
    
    public function Update(){
        $custodio = new Custodio();
        
        if(isset($_REQUEST['id'])){
            //si tiene el parámetro asignado ejecutamos el método
            $usuario = $this->model->ObtenerUsuario($_REQUEST['id']);
        }
        
        //
        //llama todas las partes de la vista guardar
        require_once 'view/include/cabecera_usuario.php';
        require_once 'view/actualizar_usuario.php';
        require_once 'view/include/pie.php';
    }

    public function ActualizarClave(){
        //llama todas las partes de la vista cambiar clave
        require_once 'view/include/cabecera_usuario.php';
        require_once 'view/actualizar_clave.php';
        require_once 'view/include/pie.php';
    }
    
    public function EditarClave(){
        $usuario = new Usuario();
        
        //captura todos los datos
        $usuario->idusuario = $_REQUEST['txtIdusuario'];
        $usuario->clave = $_REQUEST['txtContrasena1'];

        //Actualizar
        $r = $this->model->ActualizarClave($usuario);

        if ($r == 1) {  
            //redirecciona a la vista index
            header('Location: index.php?c=Usuario&a=ClaveEditada');
        } else {            
            # mensaje de éxito 
            echo '<script>alert("ERROR: La clave no se editó.\nIntentelo nuevamente.");</script>';
        }
    }

    public function ClaveEditada(){
        //llama todas las partes de la vista cambiar clave
        require_once 'view/include/cabecera_usuario.php';
        require_once 'view/clave_editada.php';
        require_once 'view/include/pie.php';
    }
    
    public function ActualizarUsuario(){
        $usuario = new Usuario();
        
        //captura todos los datos
        $usuario->idusuario = $_REQUEST['txtidusuario'];
        $usuario->nombre = $_REQUEST['txtnombre'];
        $usuario->apellido = $_REQUEST['txtapellido'];
        $usuario->email = $_REQUEST['txtemail'];

        //Actualizar
        $this->model->ActualizarUsuario($usuario);
        
        //redirecciona a la vista index
        header('Location: index.php?c=Usuario&a=Consultar');
    }
}
?>
   

