<?php
class Venta
{
	private $pdo;
    
    public $idventa;
    public $fechaventa;
    public $idusuario;
    public $idcliente;
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

	public function ListarVentaActivas()
	{
		try
		{

			$stm = $this->pdo->prepare("SELECT * FROM venta WHERE estado = 1");
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

	public function ListarVentaInactivas()
	{
		try
		{

			$stm = $this->pdo->prepare("SELECT * FROM venta WHERE estado = 0");
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

	public function ObtenerVenta($id)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM venta WHERE idventa = ?");
			          

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
	

	public function CambiarEstadoVenta($nuevo_estado, $id)
	{
		try 
		{
			$sql = "UPDATE venta SET 
						estado    = ?
				    WHERE idventa = ?";

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

	public function ActualizarVenta($data)
	{
		try 
		{
			$sql = "UPDATE venta SET 
						fechaventa = ?, 
						idusuario   = ?,
                        idcliente    = ?
				    WHERE idventa  = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->fechaventa, 
                        $data->idusuario,
                        $data->idcliente,
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

	public function RegistrarVenta($data)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT GuardarVenta(?,?) as idventa");
			          

			$stm->execute(array(
						$data->idusuario,
						$data->idcliente
					));
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

	public function CalcularTotal($idventa)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT Date_format(v.fechaventa,'%d-%m-%Y') as fechaventa, u.nombre as cajero, concat(c.nombre, ' ', c.apellido) as cliente, p.nombre as pelicula, COUNT(bu.idbutaca) as cantidad, p.precio as precio, SUM(p.precio) as total
						FROM venta as v INNER JOIN boleto as b ON v.idventa = b.idventa
							INNER JOIN horario as h ON b.idhorario = h.idhorario
							INNER JOIN pelicula as p ON h.idpelicula = p.idpelicula
							INNER JOIN butaca as bu ON b.idbutaca = bu.idbutaca
							INNER JOIN usuario as u ON v.idusuario = u.idusuario
							INNER JOIN cliente as c ON v.idcliente = c.idcliente
						WHERE v.idventa = ? AND v.estado = 1");
			          

			$stm->execute(array($idventa));
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

}