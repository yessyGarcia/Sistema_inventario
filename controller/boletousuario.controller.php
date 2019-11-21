<?php

/*
    Lo que el controlador hace es interactuar con el usuario
    - Este manda peticiones al servidor 
    - Manda la información al modelo
    - Carga las vistas como respuesta al usuario
*/
require_once 'model/Boleto.php';
require_once 'model/Horario.php';
require_once 'model/Pelicula.php';
require_once 'model/Sala.php';
require_once 'model/Cliente.php';
require_once 'model/Venta.php';
require_once 'model/Butaca.php';
require_once 'model/Usuario.php';

class BoletousuarioController{
    
    private $modelBoleto;
    private $modelHorario;
    private $modelPelicula;
    private $modelSala;
    private $modelCliente;
    private $modelVenta;
    private $modelUsuario;
    private $modelButaca;
    
    public function __CONSTRUCT(){
        //inicializa el modelo
        $this->modelBoleto = new Boleto();
        $this->modelHorario = new Horario();
        $this->modelPelicula = new Pelicula();
        $this->modelSala = new Sala();
        $this->modelCliente = new Cliente();
        $this->modelVenta = new Venta();
        $this->modelUsuario = new Usuario();
        $this->modelButaca = new Butaca();
    }
    
    public function Index(){
        //llama todas las partes de la vista principal
        require_once 'view/include/cabecera_usuario.php';
        require_once 'view/principal_usuario.php';
        require_once 'view/include/pie.php';
    }

    public function Consultar(){
        //llama todas las partes de la vista 
        require_once 'view/include/cabecera_usuario.php';
        require_once 'view/mostrar_boletos.php';
        require_once 'view/include/pie.php';
    }

    public function MostrarPeliculas(){
        //llama todas las partes de la vista
        require_once 'view/include/cabecera_usuario.php';
        require_once 'view/mostrar_cartelera.php';
        require_once 'view/include/pie.php';
    }

    public function VerHorarios(){
        $pelicula = new Pelicula();
        
        if(isset($_REQUEST['id'])){
            //si tiene el parámetro asignado ejecutamos el método
            $pelicula = $this->modelPelicula->ObtenerPelicula($_REQUEST['id']);
        }
        //llama todas las partes de la vista
        require_once 'view/include/cabecera_usuario.php';
        require_once 'view/mostrar_horario_pelicula.php';
        require_once 'view/include/pie.php';
    }

    public function CantidadBoletos(){
        $horario = new Horario();
        
        if(isset($_REQUEST['id'])){
            //si tiene el parámetro asignado ejecutamos el método
            $horario = $this->modelHorario->ObtenerHorario($_REQUEST['id']);
        }
        //llama todas las partes de la vista
        require_once 'view/include/cabecera_usuario.php';
        require_once 'view/cantidad_boletos.php';
        require_once 'view/include/pie.php';
    }
    
    public function VerButacas(){
        $horario = new Horario();
        $sala = new Sala();
        
        if(isset($_REQUEST['txtIdhorario'])){
            //si tiene el parámetro asignado ejecutamos el método
            $horario = $this->modelHorario->ObtenerHorario($_REQUEST['txtIdhorario']);            
        }
                
        //llama todas las partes de la vista
        require_once 'view/include/cabecera_usuario.php';
        require_once 'view/ver_butacas_sala.php';
        require_once 'view/include/pie.php';
    }
    
    public function DatosPago(){
        $horario = new Horario();
        $sala = new Sala();
        $cliente = new Cliente();
        
        if(isset($_REQUEST['txtIdhorario'])){
            //si tiene el parámetro asignado ejecutamos el método
            $horario = $this->modelHorario->ObtenerHorario($_REQUEST['txtIdhorario']); 
            //obtenemos el usuario en mi caso es el cliente 0 ya que estoy desde las vistas del usuario
            $cliente = $this->modelCliente->ObtenerCliente(0);             
        }
                
        //llama todas las partes de la vista
        require_once 'view/include/cabecera_usuario.php';
        require_once 'view/datos_pago.php';
        require_once 'view/include/pie.php';
    }
    
    //este es el método más relevante de todos
    public function Facturar(){
        $venta = new Venta();
        $boleto = new Boleto();
        
        if(isset($_REQUEST['txtIdhorario'])){
            //si tiene el parámetro asignado ejecutamos el método
            $horario = $this->modelHorario->ObtenerHorario($_REQUEST['txtIdhorario']);            
        }

        //tomar los datos para la venta
        session_start();
        $venta->idusuario = $_SESSION["id"]; #se toma el id del que inició sesión
        $venta->idcliente = 0; #es el cliente que se usa por defecto

        //guardar la venta y tomar el id guardado (usamos la función GuardarVenta creada en la BD)
        $venta = $this->modelVenta->RegistrarVenta($venta);

        //captura todos los datos y guardar los boletos 
        for ($i=1; $i <= $_REQUEST['txtCantidadBoleto']; $i++) { 
            $boleto->idhorario = $_REQUEST['txtIdhorario'];
            $boleto->idventa = $venta->idventa;
            $boleto->idbutaca = $_REQUEST['txtButaca'.$i]; 

            //registrar el boleto
            $this->modelBoleto->RegistrarBoleto($boleto);

            //cambiar el estado de la butaca a 2
            $this->modelButaca->CambiarEstadobutaca(2, $boleto->idbutaca);
        }                     

        //llama todas las partes de la vista
        require_once 'view/include/cabecera_usuario.php';
        require_once 'view/mostrar_codigo_compra.php';
        require_once 'view/include/pie.php';
    }

    public function Busqueda(){
        //llama todas las partes de la vista
        require_once 'view/include/cabecera_usuario.php';
        require_once 'view/buscar_boleto.php';
        require_once 'view/include/pie.php';
    }

    public function ImprimirBoletos(){
        $venta = new Venta();
        $boleto = new Boleto();
        
        if(isset($_REQUEST['txtCodigoCompra'])){
            //si tiene el parámetro asignado ejecutamos el método
            $codigo_compra = $_REQUEST['txtCodigoCompra'];            
        }


        //tomamos los datos de la venta
        $datosventa = $venta->CalcularTotal($codigo_compra);
        
        //llama todas las partes de la vista
        require_once 'view/imprimir.php';
    }
    
    public function CambiarEstado(){
        $this->model->CambiarEstadoHorario($_REQUEST['nuevo_estado'],$_REQUEST['id']);
        header('Location: index.php?c=Horario&a=Consultar');
    }
}