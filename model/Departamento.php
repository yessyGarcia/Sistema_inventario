<?php
class Departamento
{
	private $pdo;
    
    public $iddepartamento;
    public $nombre;
    public $codigodepartamento;
    
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

	/*public function Entrar($codigoitca, $idclasificacionbien)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM usuario WHERE codigoitca = ? AND idclasificacionbien = MD5(?) AND estado = 1");
			          

			$stm->execute(array($codigoitca, $idclasificacionbien));
			
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
	}*/

	public function ListarDepartamentoActivos()
	{
		try
		{

			$stm = $this->pdo->prepare("SELECT * FROM departamento WHERE iddepartamento");
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

	public function ListarDepartamentoInactivos()
	{
		try
		{

			$stm = $this->pdo->prepare("SELECT * FROM departamento WHERE iddepartamento = 0");
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

	public function ObtenerDepartamento($id)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM departamento WHERE iddepartamento = ?");
			          

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
	

	/*public function CambiarEstadoUsuario($nuevo_estado, $id)
	{
		try 
		{
			$sql = "UPDATE usuario SET 
						estado      = ?
				    WHERE idbien = ?";

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

	public function ActualizarDepartamento($data)
	{
		try 
		{
			$sql = "UPDATE departamento SET 
						nombre              = ?, 
						codigodepartamento  = ?
                        
				    WHERE iddepartamento = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                    $data->nombre, 
                    $data->codigodepartamento,
					$data->iddepartamento
					
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

	public function RegistrarDepartamento($data)
	{
		try 
		{
		$sql = "INSERT INTO departamento (nombre, codigodepartamento) 
		        VALUES (?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(                
                    $data->nombre, 
                    $data->codigodepartamento
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
/*
    public function Actualizaridclasificacionbien($data)
	{
		try 
		{
			$sql = "UPDATE usuario SET  
						idclasificacionbien 	    = MD5(?)
				    WHERE idbien = ?";

			$resultado = $this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->idclasificacionbien,
                        $data->idbien
					)
				);

			return $resultado;
			
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}*/

}