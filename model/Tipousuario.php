<?php
class Tipousuario
{
	private $pdo;
    
    public $idtipousuario;
	public $nombre;
	//se borrará
   // public $tipo;
    //public $estado;

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

	public function ListarTipousuarioActivas()
	{
		try
		{

			$stm = $this->pdo->prepare("SELECT * FROM tipousuario WHERE idtipousuario");
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

	public function ListarTipousuarioInactivas()
	{
		try
		{

			$stm = $this->pdo->prepare("SELECT * FROM tipousuario WHERE idtipousuario = 0");
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

	public function ObtenerTipousuario($id)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM tipousuario WHERE idtipousuario = ?");
			          

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
			          ->prepare("SELECT * FROM butaca as b WHERE b.idtipousuario = ?");
			          

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
	*/

	public function CambiarEstadoTipousuario($nuevo_estado, $id)
	{
		try 
		{
			$sql = "UPDATE tipousuario SET 
						nombre      = ?
				    WHERE idtipousuario  = ?";

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

	public function ActualizarTipousuario($data)
	{
		try 
		{
			$sql = "UPDATE tipousuario SET 
						nombre = ? 
					
				    WHERE idtipousuario = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->nombre, 
                       $data->idtipousuario
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

	public function RegistrarTipousuario($data)
	{
		try 
		{
		$sql = "INSERT INTO tipousuario (nombre) 
		        VALUES (?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(                
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