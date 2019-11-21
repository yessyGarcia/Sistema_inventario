<?php
class Fuentefinanciamiento
{
	private $pdo;
    
    public $idfuentefinanciamiento;
    public $nombre;
    public $codigofuentefinanciamiento;
    
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
	} */

	public function ListarFuentefinanciamientoActivos()
	{
		try
		{

			$stm = $this->pdo->prepare("SELECT * FROM fuentefinanciamiento WHERE idfuentefinanciamiento");
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

	public function ListarFuentefinanciamientoInactivos()
	{
		try
		{

			$stm = $this->pdo->prepare("SELECT * FROM fuentefinanciamiento WHERE idfuentefinanciamiento = 0");
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

	public function ObtenerFuentefinanciamiento($id)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM fuentefinanciamiento WHERE idfuentefinanciamiento = ?");
			          

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

	public function ActualizarFuentefinanciamiento($data)
	{
		try 
		{
			$sql = "UPDATE fuentefinanciamiento SET 
						nombre           			 = ?, 
						codigofuentefinanciamiento   = ?
                       
				    WHERE idfuentefinanciamiento = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                    $data->nombre, 
                    $data->codigofuentefinanciamiento,
                    $data->idfuentefinanciamiento
					
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

	public function RegistrarFuentefinanciamiento($data)
	{
		try 
		{
		$sql = "INSERT INTO fuentefinanciamiento (nombre, codigofuentefinanciamiento) 
		        VALUES (?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(         
                    $data->nombre,
                    $data->codigofuentefinanciamiento
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