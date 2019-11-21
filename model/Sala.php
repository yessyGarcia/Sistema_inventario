<?php
class Sala
{
	private $pdo;
    
    public $idsala;
    public $nombre;
    public $tipo;
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

	public function ListarSalaInactivas()
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

	public function ObtenerSala($id)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM sala WHERE idsala = ?");
			          

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

	public function ListarButacaSala($id)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM butaca as b WHERE b.idsala = ?");
			          

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
	

	public function CambiarEstadoSala($nuevo_estado, $id)
	{
		try 
		{
			$sql = "UPDATE sala SET 
						estado      = ?
				    WHERE idsala  = ?";

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

	public function ActualizarSala($data)
	{
		try 
		{
			$sql = "UPDATE sala SET 
						nombre = ?, 
						tipo  = ?
				    WHERE idsala = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->nombre, 
                        $data->tipo,
                        $data->idsala
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

	public function Registrarsala($data)
	{
		try 
		{
		$sql = "INSERT INTO sala (nombre, tipo) 
		        VALUES (?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(                
                    $data->nombre, 
                    $data->tipo
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