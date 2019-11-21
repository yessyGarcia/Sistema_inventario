<?php

require_once 'model/Bien.php';

class BienController{
    
    private $model;
    
    public function __CONSTRUCT(){
        //inicializa el modelo Alumno
        $this->model = new Bien();
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
        require_once 'view/mostrar_bien.php';
        require_once 'view/include/pie_mostrar.php';
    }
    public function ConsultarCustodio(){
        //llama todas las partes de la vista principal
        require_once 'view/include/cabecera_custodio.php';
        require_once 'view/mostrar_bien_custodio.php';
        require_once 'view/include/pie_mostrar.php';
    }

    public function Crud(){
        $bien = new Bien();
        
        if(isset($_REQUEST['id'])){
            //si tiene el parámetro asignado ejecutamos el método
            $bien = $this->model->ObtenerBien($_REQUEST['id']);
        }
        
        //
        //llama todas las partes de la vista guardar
        require_once 'view/include/cabecera_usuario.php';
        require_once 'view/registrar_bien.php';
        require_once 'view/include/pie.php';
    }
    public function CrudCustodio(){
        $bien = new Bien();
        
        if(isset($_REQUEST['id'])){
            //si tiene el parámetro asignado ejecutamos el método
            $bien = $this->model->ObtenerBien($_REQUEST['id']);
        }
        
        //
        //llama todas las partes de la vista guardar
        require_once 'view/include/cabecera_custodio.php';
        require_once 'view/registrar_bien.php';
        require_once 'view/include/pie.php';
    }
    
    public function Guardar(){
        $bien = new Bien();
        
        //captura todos los datos
        $bien->idbien = $_REQUEST['txtidbien'];
        $bien->codigointerno = $_REQUEST['txtcodigointerno'];
        $bien->codigomined = $_REQUEST['txtcodigomined'];
        $bien->codigoitca = $_REQUEST['txtcodigoitca'];
        $bien->idclasificacionbien = $_REQUEST['selidclasificacionbien'];
        $bien->tipobien = $_REQUEST['txttipobien'];
        $bien->descripcionbien = $_REQUEST['txtdescripcionbien'];
        $bien->marca = $_REQUEST['txtmarca'];
        $bien->modelo = $_REQUEST['txtmodelo'];
        $bien->serie = $_REQUEST['txtserie'];
        $bien->idusuariocustodio = $_REQUEST['selidusuariocustodio'];
        $bien->idubicacion = $_REQUEST['selidubicacion'];
        $bien->idestadobien = $_REQUEST['selidestadobien'];
        $bien->costobien = $_REQUEST['txtcostobien'];
        $bien->idfuentefinanciamiento = $_REQUEST['selidfuentefinanciamiento'];
        $bien->idtipocomprobante = $_REQUEST['selidtipocomprobante'];
        $bien->numerocomprobante = $_REQUEST['txtnumerocomprobante'];
        $bien->fechaadquisicion = $_REQUEST['txtfechaadquisicion'];
        $bien->iddepartamento = $_REQUEST['seliddepartamento'];
        $bien->observaciones = $_REQUEST['txtobservaciones'];
        //hecho por el profe Armando
        session_start();
        $bien->idusuarioregistro = $_SESSION["id"];
        

        //si el id es mayor que cero Actualiza si no registra
        $bien->idbien > 0 
            ? $this->model->ActualizarBien($bien)
            : $this->model->RegistrarBien($bien);
        
        //redirecciona a la vista index
        header('Location: index.php?c=Bien&a=Consultar');
    }
    
    public function CambiarEstado(){
        $this->model->CambiarEstado($_REQUEST['nuevo_estado'],$_REQUEST['id']);
        header('Location: index.php?c=Bien&a=Consultar');
    }

    public function Update(){
        $bien = new Bien();
        
        if(isset($_REQUEST['id'])){
            //si tiene el parámetro asignado ejecutamos el método
            $bien = $this->model->ObtenerBien($_REQUEST['id']);
        }
        
        //
        //llama todas las partes de la vista guardar
        require_once 'view/include/cabecera_usuario.php';
        require_once 'view/include/pie.php';
    }
    public function ActualizarUsuario(){
        $usuario = new Usuario();
        
        //captura todos los datos
        $bien->idbien = $_REQUEST['txtidbien'];
        $bien->codigointerno = $_REQUEST['txtcodigointerno'];
        $bien->codigomined = $_REQUEST['txtcodigomined'];
        $bien->codigoitca = $_REQUEST['txtcodigoitca'];
        $bien->idclasificacionbien = $_REQUEST['selidclasificacionbien'];
        $bien->tipobien = $_REQUEST['txttipobien'];
        $bien->descripcionbien = $_REQUEST['txtdescripcionbien'];
        $bien->marca = $_REQUEST['txtmarca'];
        $bien->modelo = $_REQUEST['txtmodelo'];
        $bien->serie = $_REQUEST['txtserie'];
        $bien->idusuariocustodio = $_REQUEST['selidusuariocustodio'];
        $bien->ubicacion = $_REQUEST['selidubicacion'];
        $bien->idestadobien = $_REQUEST['selidestadobien'];
        $bien->costobien = $_REQUEST['txtcostobien'];
        $bien->idfuentefinanciamiento = $_REQUEST['selidfuentefinanciamiento'];
        $bien->idtipocomprobante = $_REQUEST['selidtipocomprobante'];
        $bien->numerocomprobante = $_REQUEST['txtnumerocomprobante'];
        $bien->fechaadquisicion = $_REQUEST['txtfechaadquisicion'];
        $bien->iddepartamento = $_REQUEST['seliddepartamento'];
        $bien->observaciones = $_REQUEST['txtobservaciones'];

        //Actualizar
        $this->model->ActualizarBien($bien);
        
        //redirecciona a la vista index
        header('Location: index.php?c=Bien&a=Consultar');
    }
}