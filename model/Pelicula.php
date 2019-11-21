<?php
class Pelicula
{
	private $pdo;
    
    public $idpelicula;
    public $nombre;
    public $imagen;
    public $duracion;
    public $tipo;
    public $clasificacion;
    public $director;
    public $reparto;
    public $descripcion;
    public $precio;
    public $estado;

	public function __CONSTRUCT()
	{
		try
		{
			$this->pdo = Conexion::Conectar();     
		}
        catch (Throwable $t)//php7
        {
			die($t->getMessage());
        }
		catch(Exception $e)//php5
		{
			die($e->getMessage());
		}
	}

	public function ListarPeliculaActivas()
	{
		try
		{

			$stm = $this->pdo->prepare("SELECT * FROM pelicula WHERE estado = 1");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
        catch (Throwable $t)//php7
        {
			die($t->getMessage());
        }
		catch(Exception $e)//php5
		{
			die($e->getMessage());
		}
	}

	public function ListarPeliculaInactivas()
	{
		try
		{

			$stm = $this->pdo->prepare("SELECT * FROM pelicula WHERE estado = 0");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
        catch (Throwable $t)//php7
        {
			die($t->getMessage());
        }
		catch(Exception $e)//php5
		{
			die($e->getMessage());
		}
	}

	public function ObtenerPelicula($id)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM pelicula WHERE idpelicula = ?");
			          

			$stm->execute(array($id));
			return $stm->fetch(PDO::FETCH_OBJ);
		}
        catch (Throwable $t)//php7
        {
			die($t->getMessage());
        }
		catch(Exception $e)//php5
		{
			die($e->getMessage());
		}
	}
	

	public function CambiarEstadoPelicula($nuevo_estado, $id)
	{
		try 
		{
			$sql = "UPDATE pelicula SET 
						estado      = ?
				    WHERE idpelicula = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $nuevo_estado,
                        $id
					)
				);
		}
        catch (Throwable $t)//php7
        {
			die($t->getMessage());
        }
		catch(Exception $e)//php5
		{
			die($e->getMessage());
		}
	}

	public function ActualizarPelicula($data)
	{
		try 
		{
			$sql = "UPDATE pelicula SET 
						nombre        = ?, 
						duracion      = ?,
                        tipo          = ?, 
						clasificacion = ?,
						precio        = ?,
                        director      = ?, 
						reparto       = ?,
                        descripcion   = ?
				    WHERE idpelicula = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->nombre, 
                        $data->duracion,
                        $data->tipo,
                        $data->clasificacion,
                        $data->precio,
                        $data->director,
                        $data->reparto,
                        $data->descripcion,
                        $data->idpelicula
					)
				);
		}
        catch (Throwable $t)//php7
        {
			die($t->getMessage());
        }
		catch(Exception $e)//php5
		{
			die($e->getMessage());
		}
	}

	public function CambiarImagen($data)
	{
		try 
		{
			$sql = "UPDATE pelicula SET 
                        imagen   = ?
				    WHERE idpelicula = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->imagen,
                        $data->idpelicula
					)
				);
		}
        catch (Throwable $t)//php7
        {
			die($t->getMessage());
        }
		catch(Exception $e)//php5
		{
			die($e->getMessage());
		}
	}

	public function Registrarpelicula($data)
	{
		try 
		{
		$sql = "INSERT INTO pelicula (nombre, imagen, duracion, tipo, clasificacion, precio, director, reparto, descripcion) 
		        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(             
                    $data->nombre,
                    $data->imagen,  
                    $data->duracion,
                    $data->tipo,
                    $data->clasificacion,
                    $data->precio,
                    $data->director,
                    $data->reparto,
                    $data->descripcion
                )
			);
		}
        catch (Throwable $t)//php7
        {
			die($t->getMessage());
        }
		catch(Exception $e)//php5
		{
			die($e->getMessage());
		}
	}

}