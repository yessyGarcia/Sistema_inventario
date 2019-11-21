<?php
class Horario
{
	private $pdo;
    
    public $idhorario;
    public $fechapelicula;  
    public $horapelicula;
    public $idpelicula;
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

	public function ListarHorarioActivos()
	{
		try
		{

			$stm = $this->pdo->prepare("SELECT h.idhorario as idhorario, h.fechapelicula as fechapelicula, h.horapelicula as horapelicula, s.idsala as idsala, s.nombre as sala, p.idpelicula as idpelicula, p.nombre as nombrepelicula, p.imagen as imagen, p.precio as precio FROM horario as h INNER JOIN sala AS s ON h.idsala = s.idsala INNER JOIN pelicula as p ON h.idpelicula = p.idpelicula WHERE h.estado = 1 ORDER BY fechapelicula");
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

	public function ListarPeliculasHorario()
	{
		try
		{

			$stm = $this->pdo->prepare("SELECT DISTINCT p.idpelicula as idpelicula, p.nombre as nombrepelicula, p.imagen as imagen FROM horario as h INNER JOIN pelicula as p ON h.idpelicula = p.idpelicula WHERE h.estado = 1 ORDER BY fechapelicula DESC");
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

	public function ListarHorarioPorPelicula($idpelicula)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT h.idhorario as idhorario, Date_format(h.fechapelicula,'%d-%m-%Y') as fechapelicula, h.horapelicula as horapelicula, s.nombre as sala FROM horario as h INNER JOIN sala AS s ON h.idsala = s.idsala INNER JOIN pelicula as p ON h.idpelicula = p.idpelicula WHERE h.idpelicula = ? ORDER BY fechapelicula");
			          
			$stm->execute(array($idpelicula));
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

	public function ListarHorarioInactivos()
	{
		try
		{

			$stm = $this->pdo->prepare("SELECT h.idhorario as idhorario, h.fechapelicula as fechapelicula, h.horapelicula as horapelicula, s.nombre as sala, p.idpelicula as idpelicula, p.nombre as nombrepelicula, p.imagen as imagen, p.precio as precio FROM horario as h INNER JOIN sala AS s ON h.idsala = s.idsala INNER JOIN pelicula as p ON h.idpelicula = p.idpelicula WHERE h.estado = 0 ORDER BY fechapelicula");
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

	public function ObtenerHorario($id)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT h.idhorario as idhorario, Date_format(h.fechapelicula,'%d-%m-%Y') as fechapelicula, h.horapelicula as horapelicula, s.nombre as sala, s.idsala as idsala, p.idpelicula as idpelicula, p.nombre as nombrepelicula, p.imagen as imagen, p.precio as precio FROM horario as h INNER JOIN sala AS s ON h.idsala = s.idsala INNER JOIN pelicula as p ON h.idpelicula = p.idpelicula WHERE h.estado = 1 AND h.idhorario = ? ORDER BY fechapelicula");
			          
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
	
	public function CambiarEstadoHorario($nuevo_estado, $id)
	{
		try 
		{
			$sql = "UPDATE horario SET 
						estado    = ?
				    WHERE idhorario = ?";

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

	public function ActualizarHorario($data)
	{
		try 
		{
			$sql = "UPDATE horario SET 
						fechapelicula = ?, 
						horapelicula  = ?,
                        idpelicula    = ?,
                        idsala        = ?
				    WHERE idhorario   = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->fechapelicula, 
                        $data->horapelicula,
						$data->idpelicula,
						$data->idsala,
                        $data->idhorario
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

	public function RegistrarHorario($data)
	{
		try 
		{
		$sql = "INSERT INTO horario (fechapelicula, horapelicula, idpelicula, idsala) 
		        VALUES (?, ?, ?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
					$data->fechapelicula, 
					$data->horapelicula,
					$data->idpelicula,
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