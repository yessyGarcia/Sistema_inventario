<?php
class Clasificacionbien
{
	private $pdo;
    
    public $idclasificacionbien;
    public $nombre;
	
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
	}
*/
	public function ListarClasificacionbienActivos()
	{
		try
		{

			$stm = $this->pdo->prepare("SELECT * FROM clasificacionbien WHERE idclasificacionbien");
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

	public function ListarClasificacionbienInactivos()
	{
		try
		{

			$stm = $this->pdo->prepare("SELECT nombre FROM clasificacionbien WHERE idclasificacionbien = 0");
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

	public function ObtenerClasificacionbien($id)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM clasificacionbien WHERE idclasificacionbien = ?");
			          

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

	public function ActualizarClasificacionbien($data)
	{
		try 
		{
			$sql = "UPDATE clasificacionbien SET 
						nombre          	  = ?
                       
				    WHERE idclasificacionbien = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                    $data->nombre,
					$data->idclasificacionbien
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

	public function RegistrarClasificacionbien($data)
	{
		try 
		{
		$sql = "INSERT INTO clasificacionbien (nombre) 
		        VALUES (?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(                
                   $data->nombre
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

    /*public function Actualizaridclasificacionbien($data)
	{
		try 
		{
			$sql = "UPDATE usuario SET  
						idclasificacionbien 	    = MD5(?)
				    WHERE idbien = ?";

			$resultado = $this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->idclasificacionbien,
                        $data->idbien
					)
				);

			return $resultado;
			
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}*/

}