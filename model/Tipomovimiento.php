<?php
class Tipomovimiento
{
	private $pdo;
    
    public $idtipomovimiento;
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

	public function ListarTipomovimientoActivas()
	{
		try
		{

			$stm = $this->pdo->prepare("SELECT * FROM tipomovimiento WHERE idtipomovimiento");
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

	public function ListarTipomovimientoInactivas()
	{
		try
		{

			$stm = $this->pdo->prepare("SELECT * FROM tipomovimiento WHERE idtipomovimiento = 0");
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

	public function ObtenerTipomovimiento($id)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM tipomovimiento WHERE idtipomovimiento = ?");
			          

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

	/*public function ListarButacaTipomovimiento($id)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM butaca as b WHERE b.idtipomovimiento = ?");
			          

			$stm->execute(array($id));
			return $stm->fetchall(PDO::FETCH_OBJ);
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
	

	/*public function CambiarEstadoTipomovimiento($nuevo_estado, $id)
	{
		try 
		{
			$sql = "UPDATE Tipomovimiento SET 
						estado      = ?
				    WHERE idtipomovimiento  = ?";

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

	public function ActualizarTipomovimiento($data)
	{
		try 
		{
			$sql = "UPDATE tipomovimiento SET 
						nombre = ?
						
				    WHERE idtipomovimiento = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->nombre, 
                        $data->idtipomovimiento
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

	public function RegistrarTipomovimiento($data)
	{
		try 
		{
		$sql = "INSERT INTO tipomovimiento (idtipomovimiento, nombre) 
		        VALUES (?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(  
					$data->idtipomovimiento,               
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

}