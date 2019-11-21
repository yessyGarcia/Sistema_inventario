<?php
class Tipocomprobante
{
	private $pdo;
    
    public $idtipocomprobante;
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

	public function ListarTipocomprobanteActivas()
	{
		try
		{

			$stm = $this->pdo->prepare("SELECT * FROM tipocomprobante WHERE idtipocomprobante");
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

	public function ListarTipocomprobanteInactivas()
	{
		try
		{

			$stm = $this->pdo->prepare("SELECT * FROM tipocomprobante WHERE idtipocomprobante = 0");
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

	public function ObtenerTipocomprobante($id)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM tipocomprobante WHERE idtipocomprobante = ?");
			          

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



	/*public function CambiarEstadoSala($nuevo_estado, $id)
	{
		try 
		{
			$sql = "UPDATE sala SET 
						estado      = ?
				    WHERE idtipocomprobante  = ?";

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
*/
	public function ActualizarTipocomprobante($data)
	{
		try 
		{
			$sql = "UPDATE tipocomprobante SET 
						nombre = ?
				    WHERE idtipocomprobante = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->nombre, 
                        $data->idtipocomprobante
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

	public function RegistrarTipocomprobante($data)
	{
		try 
		{
		$sql = "INSERT INTO tipocomprobante (idtipocomprobante, nombre) 
		        VALUES (?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(                
                    $data->idtipocomprobante, 
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