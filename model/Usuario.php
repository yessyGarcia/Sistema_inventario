<?php
class Usuario 
{
	private $pdo;
    
    public $idusuario;
    public $nombre;
    public $apellido;
    public $email;
	public $clave;
	public $idtipousuario;
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

	public function Entrar($email, $clave)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM usuario WHERE email = ? AND clave = MD5(?) AND estado = 1");
			          

			$stm->execute(array($email, $clave));
			
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

	public function ListarUsuarioActivas()
	{
		try
		{

			$stm = $this->pdo->prepare("SELECT idusuario, nombre, apellido, email FROM usuario WHERE estado = 1");
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

	public function ListarUsuarioInactivos()
	{
		try
		{

			$stm = $this->pdo->prepare("SELECT idusuario, nombre, apellido, email FROM usuario WHERE estado = 0");
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

	public function ObtenerUsuario($id)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM usuario WHERE idusuario = ?");
			          

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
	

	public function CambiarEstadoUsuario($nuevo_estado, $id)
	{
		try 
		{
			$sql = "UPDATE usuario SET 
						estado      = ?
				    WHERE idusuario = ?";

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

	public function ActualizarUsuario($data)
	{
		try 
		{
			$sql = "UPDATE usuario SET 
						nombre            = ?, 
						apellido          = ?,
                        email             = ?
				    WHERE idusuario = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->nombre, 
                        $data->apellido,
                        $data->email,
                        $data->idusuario
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

	public function RegistrarUsuario($data)
	{
		try 
		{
		$sql = "INSERT INTO usuario (nombre, apellido, email, clave, idtipousuario) 
		        VALUES (?, ?, ?, MD5(?), ?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(                
                    $data->nombre, 
                    $data->apellido,
                    $data->email,
					$data->clave,
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

    public function ActualizarClave($data)
	{
		try 
		{
			$sql = "UPDATE usuario SET  
						clave 	    = MD5(?)
				    WHERE idusuario = ?";

			$resultado = $this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->clave,
                        $data->idusuario
					)
				);

			return $resultado;
			
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}


}