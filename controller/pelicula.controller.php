<?php

/*
    Lo que el controlador hace es interactuar con el usuario
    - Este manda peticiones al servidor 
    - Manda la información al modelo
    - Carga las vistas como respuesta al usuario
*/
require_once 'model/Pelicula.php';

class PeliculaController{
    
    private $model;
    
    public function __CONSTRUCT(){
        //inicializa el modelo 
        $this->model = new Pelicula();
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
        require_once 'view/mostrar_pelicula.php';
        require_once 'view/include/pie.php';
    }

    public function Crud(){
        
        //llama todas las partes de la vista guardar
        require_once 'view/include/cabecera_usuario.php';
        require_once 'view/registrar_departamento.php';
        require_once 'view/include/pie.php';
    }

    public function Update(){
        $pelicula = new Pelicula();
        
        if(isset($_REQUEST['id'])){
            //si tiene el parámetro asignado ejecutamos el método
            $pelicula = $this->model->ObtenerPelicula($_REQUEST['id']);
        }
        
        //llama todas las partes de la vista 
        require_once 'view/include/cabecera_usuario.php';
        require_once 'view/actualizar_pelicula.php';
        require_once 'view/include/pie.php';
    }
    
    public function Guardar(){
        $pelicula = new Pelicula();
        
        //captura todos los datos
        $pelicula->nombre = $_REQUEST['txtNombre'];
        $pelicula->duracion = $_REQUEST['txtDuracion'];
        $pelicula->tipo = $_REQUEST['txtTipo'];
        $pelicula->clasificacion = $_REQUEST['txtClasificacion'];
        $pelicula->director = $_REQUEST['txtDirector'];
        $pelicula->reparto = $_REQUEST['txtReparto'];
        $pelicula->descripcion = $_REQUEST['txtDescripcion'];
        $pelicula->precio = $_REQUEST['txtPrecio'];

        //subir la imagen
        //capturamos los datos del fichero subido    
        $type=$_FILES['txtImagen']['type'];
        $tmp_name = $_FILES['txtImagen']["tmp_name"];
        $name = $_FILES['txtImagen']["name"];
        //Creamos una nueva ruta (nuevo path)
        //Así guardaremos nuestra imagen en la carpeta "peliculas"
        $nuevo_path="view/include/peliculas/".$name;
        //Movemos el archivo desde su ubicación temporal hacia la nueva ruta
        # $tmp_name: la ruta temporal del fichero
        # $nuevo_path: la nueva ruta que creamos
        move_uploaded_file($tmp_name,$nuevo_path);
                
        //asignamos el nombre de la imagen al atributo.
        $pelicula->imagen = $name; 

        // registra la película
        $this->model->RegistrarPelicula($pelicula);
        
        //redirecciona a la vista index
        header('Location: index.php?c=Pelicula&a=Consultar');
    } 
    
    public function Actualizar(){
        $pelicula = new Pelicula();
        
        //captura todos los datos
        $pelicula->idpelicula = $_REQUEST['txtIdpelicula'];
        $pelicula->nombre = $_REQUEST['txtNombre'];
        $pelicula->duracion = $_REQUEST['txtDuracion'];
        $pelicula->tipo = $_REQUEST['txtTipo'];
        $pelicula->clasificacion = $_REQUEST['txtClasificacion'];
        $pelicula->director = $_REQUEST['txtDirector'];
        $pelicula->reparto = $_REQUEST['txtReparto'];
        $pelicula->descripcion = $_REQUEST['txtDescripcion'];
        $pelicula->precio = $_REQUEST['txtPrecio'];

        //Actualizar
        $this->model->ActualizarPelicula($pelicula);
        
        //redirecciona a la vista index
        header('Location: index.php?c=Pelicula&a=Consultar');
    }     
    
    public function CambiarImagen(){
        $pelicula = new Pelicula();
        
        if(isset($_REQUEST['id'])){
            //si tiene el parámetro asignado ejecutamos el método
            $pelicula = $this->model->ObtenerPelicula($_REQUEST['id']);
        }
        
        //llama todas las partes de la vista guardar
        require_once 'view/include/cabecera_usuario.php';
        require_once 'view/imagen_pelicula.php';
        require_once 'view/include/pie.php';
    }

    public function ActualizarImagen(){
        $pelicula = new Pelicula();
        
        //captura todos los datos        
        $pelicula->idpelicula = $_REQUEST['txtIdpelicula'];
        $pelicula->imagen = $_REQUEST['txtNombreImagen'];

        //borrar la imagen existente
        unlink("view/include/peliculas/".$pelicula->imagen);

        //subir la imagen
        $tmp_name = $_FILES['txtImagen']["tmp_name"];
        $name = $_FILES['txtImagen']["name"];
        //Creamos una nueva ruta (nuevo path)
        $nuevo_path="view/include/peliculas/".$name;
        //Movemos el archivo desde su ubicación temporal hacia la nueva ruta
        move_uploaded_file($tmp_name,$nuevo_path);
                
        //asignamos el nombre de la imagen al atributo.
        $pelicula->imagen = $name; 

        // registra la película
        $this->model->CambiarImagen($pelicula);
        
        //redirecciona a la vista index
        header('Location: index.php?c=Pelicula&a=Consultar');
    } 
    
    public function CambiarEstado(){
        $this->model->CambiarEstadopelicula($_REQUEST['nuevo_estado'],$_REQUEST['id']);
        header('Location: index.php?c=Pelicula&a=Consultar');
    }
}