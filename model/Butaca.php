<?php
class Butaca
{
	private $pdo;
    
    public $idbutaca;
    public $nombre;
    public $idsala;
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

	public function ListarButacaActivas()
	{
		try
		{

			$stm = $this->pdo->prepare("SELECT b.idbutaca as idbutaca, b.nombre as nombre, s.nombre as sala, b.estado as estado FROM butaca as b INNER JOIN sala as s ON b.idsala = s.idsala WHERE b.estado = 1");
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

	public function ListarButacaInactivas()
	{
		try
		{

			$stm = $this->pdo->prepare("SELECT b.idbutaca as idbutaca, b.nombre as nombre, s.nombre as sala, b.estado as estado FROM butaca as b INNER JOIN sala as s ON b.idsala = s.idsala WHERE b.estado = 0");
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

	public function ObtenerButaca($id)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM butaca WHERE idbutaca = ?");
			          

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
	

	public function CambiarEstadobutaca($nuevo_estado, $id)
	{
		try 
		{
			$sql = "UPDATE butaca SET 
						estado      = ?
				    WHERE idbutaca  = ?";

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

	public function ActualizarButaca($data)
	{
		try 
		{
			$sql = "UPDATE butaca SET 
						nombre = ?, 
						idsala  = ?
				    WHERE idbutaca = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->nombre, 
                        $data->idsala,
                        $data->idbutaca
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

	public function RegistrarButaca($data)
	{
		try 
		{
		$sql = "INSERT INTO butaca (nombre, idsala) 
		        VALUES (?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(                
                    $data->nombre, 
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

}