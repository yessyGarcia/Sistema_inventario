<?php
class Boleto
{
	private $pdo;
    
    public $idboleto;
    public $idhorario;
    public $idbutaca;
    public $idventa;
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

	public function ListarBoletoActivos()
	{
		try
		{

			$stm = $this->pdo->prepare("SELECT * FROM boleto WHERE estado = 1");
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

	public function ListarBoletoInactivos()
	{
		try
		{

			$stm = $this->pdo->prepare("SELECT * FROM boleto WHERE estado = 0");
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

	public function ObtenerBoleto($id)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM boleto WHERE idboleto = ?");
			          

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

	public function BuscarBoleto($id)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT p.nombre as pelicula, s.nombre as sala, Date_format(h.fechapelicula,'%d-%m-%Y') as fechapelicula, h.horapelicula as horapelicula, bu.nombre as butaca, p.precio as precio
					  FROM boleto as b INNER JOIN horario as h ON b.idhorario = h.idhorario
									   INNER JOIN sala as s ON h.idsala = s.idsala
									   INNER JOIN pelicula as p ON h.idpelicula = p.idpelicula
									   INNER JOIN butaca as bu ON b.idbutaca = bu.idbutaca
					  WHERE b.idventa = ? AND b.estado = 1");
			          

			$stm->execute(array($id));
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
	

	public function CambiarEstadoBoleto($nuevo_estado, $id)
	{
		try 
		{
			$sql = "UPDATE boleto SET 
						estado      = ?
				    WHERE idboleto = ?";

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

	public function ActualizarBoleto($data)
	{
		try 
		{
			$sql = "UPDATE boleto SET 
						idhorario = ?, 
						idbutaca  = ?,
                        idventa   = ?
				    WHERE idboleto = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->idhorario, 
                        $data->idbutaca,
                        $data->idventa,
                        $data->idboleto
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

	public function RegistrarBoleto($data)
	{
		try 
		{
		$sql = "INSERT INTO boleto (idhorario, idbutaca, idventa) 
		        VALUES (?, ?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(                
                    $data->idhorario, 
                    $data->idbutaca,
                    $data->idventa
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

	public function GenerarDetalle($idhorario)
	{
		try 
		{
			//para mostrar todos los detalles del boleto
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