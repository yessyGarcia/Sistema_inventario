<?php
class Detallemovimiento
{
	private $pdo;
    
    public $iddetallemovimiento;
    public $idmovimiento;
	public $idbien;
	//se borrara esto
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
/*
	public function ListarSalaActivas()
	{
		try
		{

			$stm = $this->pdo->prepare("SELECT * FROM sala WHERE estado = 1");
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

	/*public function ListarSalaInactivas()
	{
		try
		{

			$stm = $this->pdo->prepare("SELECT * FROM sala WHERE estado = 0");
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

	/*public function ObtenerSala($id)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM sala WHERE iddetallemovimiento = ?");
			          

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
			          ->prepare("SELECT * FROM butaca as b WHERE b.iddetallemovimiento = ?");
			          

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
				    WHERE iddetallemovimiento  = ?";

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

	/*public function ActualizarSala($data)
	{
		try 
		{
			$sql = "UPDATE sala SET 
						idmovimiento = ?, 
						idbien  = ?
				    WHERE iddetallemovimiento = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->idmovimiento, 
                        $data->idbien,
                        $data->iddetallemovimiento
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

	public function RegistrarDetallemovimiento($data)
	{
		try 
		{
		$sql = "INSERT INTO detallemovimiento (idmovimiento, idbien) 
		        VALUES (?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(          
				    $data->idmovimiento, 
                    $data->idbien
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