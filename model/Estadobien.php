<?php
class Estadobien
{
	private $pdo;
    
    public $idestadobien;
	public $nombre;
	//se borraran estos
   
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

	public function ListarEstadobienActivas()
	{
		try
		{

			$stm = $this->pdo->prepare("SELECT * FROM estadobien WHERE idestadobien");
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

	public function ListarEstadobienInactivas()
	{
		try
		{

			$stm = $this->pdo->prepare("SELECT * FROM estadobien WHERE idestadobien = 0");
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

	public function ObtenerEstadobien($id)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM estadobien WHERE idestadobien = ?");
			          

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

	/*public function ListarButacaSala($id)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM butaca as b WHERE b.idestadobien = ?");
			          

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
	

	/*public function CambiarEstadoSala($nuevo_estado, $id)
	{
		try 
		{
			$sql = "UPDATE sala SET 
						estado      = ?
				    WHERE idestadobien  = ?";

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

	public function ActualizarEstadobien($data)
	{
		try 
		{
			$sql = "UPDATE estadobien SET 
							nombre = ? 
					WHERE idestadobien = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                    	$data->nombre, 
                        $data->idestadobien
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

	public function RegistrarEstadobien($data)
	{
		try 
		{
		$sql = "INSERT INTO estadobien (idestadobien, nombre) 
		        VALUES (?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(                
                    $data->idestadobien, 
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