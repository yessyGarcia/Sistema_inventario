<?php
class Movimiento
{
	private $pdo;
    
	public $idmovimiento;
	public $fechatraslado;
	public $idbien;
	public $idusuariocustodio;
	public $idusuarionuevocustodio;
	public $idubicacion;
	public $destino;
	public $idtipomovimiento;
	public $justificacion;
	public $centrocostosenvia;
	public $centrocostosrecibe;
	
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

	public function ListarMovimientoActivas()
	{
		try
		{

			$stm = $this->pdo->prepare("SELECT * FROM movimiento WHERE idmovimiento");
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

	public function ObtenerMovimiento($id)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM movimiento WHERE idmovimiento = ?");
			          

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


	public function ActualizarMovimiento($data)
	{
		try 
		{
			$sql = "UPDATE movimiento SET 
						fechatraslado		    = ?, 
						idbien				    = ?, 
						idusuariocustodio  		= ?,
						idusuarionuevocustodio  = ?,
						destino  				= ?,
						idtipomovimiento 		 = ?,
						justificacion  			= ?,
						centrocostosenvia 		 = ?,
						centrocostosrecibe 		 = ?
				    WHERE idmovimiento 		= ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
						$data->fechatraslado,
						$data->idbien,		    
						$data->idusuariocustodio, 		
						$data->idusuarionuevocustodio, 
						$data->destino,  				
						$data->idtipomovimiento, 		
						$data->justificacion,  			
						$data->centrocostosenvia, 		
						$data->centrocostosrecibe, 	
						$data->idmovimiento
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

	public function RegistrarMovimiento($data)
	{
		try 
		{
		$sql = "INSERT INTO movimiento (fechatraslado, idbien, idusuariocustodio, idusuarionuevocustodio, destino, idtipomovimiento, justificacion, centrocostosenvia, centrocostosrecibe) 
		        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(                
                    
					$data->fechatraslado,
					$data->idbien,
					$data->idusuariocustodio, 
					$data->idusuarionuevocustodio,
					$data->destino,
					$data->idtipomovimiento, 
					$data->justificacion,
					$data->centrocostosenvia,
					$data->centrocostosrecibe
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