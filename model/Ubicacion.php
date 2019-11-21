<?php
class Ubicacion
{
	private $pdo;
    
    public $idubicacion;
    public $nombre;
    public $descripcion;
    
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

	/*public function Entrar($codigoitca, $idclasificacionbien)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM usuario WHERE codigoitca = ? AND idclasificacionbien = MD5(?) AND estado = 1");
			          

			$stm->execute(array($codigoitca, $idclasificacionbien));
			
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
	}*/

	public function ListarUbicacionActivos()
	{
		try
		{

			$stm = $this->pdo->prepare("SELECT * FROM ubicacion WHERE idubicacion ORDER BY nombre");
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

	public function ListarUbicacionCustodioActivos($idcustodio)
	{
		try
		{

			$stm = $this->pdo->prepare("SELECT * FROM ubicacion WHERE idubicacion in(select idubicacion from bien where idusuariocustodio = $idcustodio) ORDER BY nombre");
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

	public function ListarUbicacionInactivos()
	{
		try
		{

			$stm = $this->pdo->prepare("SELECT * FROM ubicacion WHERE idubicacion = 0");
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

	public function ObtenerUbicacion($id)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM ubicacion WHERE idubicacion = ?");
			          

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
	

	/*public function CambiarEstadoUsuario($nuevo_estado, $id)
	{
		try 
		{
			$sql = "UPDATE usuario SET 
						estado      = ?
				    WHERE idbien = ?";

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
	}*/

	public function ActualizarUbicacion($data)
	{
		try 
		{
			$sql = "UPDATE ubicacion SET 
						nombre              = ?, 
						descripcion  = ?
                        
				    WHERE idubicacion = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                    $data->nombre, 
                    $data->descripcion,
					$data->idubicacion
					
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

	public function RegistrarUbicacion($data)
	{
		try 
		{
		$sql = "INSERT INTO ubicacion (nombre, descripcion) 
		        VALUES (?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(                
                    $data->nombre, 
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