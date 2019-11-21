<?php
class Cliente
{
	private $pdo;
    
    public $idcliente;
    public $nombre;
    public $apellido;
    public $email;
    public $clave;
    public $identificacion;
    public $tarjeta;
    public $fechavencimientotarjeta;
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
			          ->prepare("SELECT * FROM cliente WHERE email = ? AND clave = MD5(?) AND estado = 1");
			          

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

	public function ListarClienteActivos()
	{
		try
		{

			$stm = $this->pdo->prepare("SELECT idcliente, nombre, apellido, email, identificacion, tarjeta, DATE_FORMAT(fechavencimientotarjeta, '%d-%m-%Y') as fechavencimientotarjeta FROM cliente WHERE estado = 1");
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

	public function ListarClienteInactivos()
	{
		try
		{

			$stm = $this->pdo->prepare("SELECT idcliente, nombre, apellido, email, identificacion,  tarjeta, DATE_FORMAT(fechavencimientotarjeta, '%d-%m-%Y') as fechavencimientotarjeta FROM cliente WHERE estado = 0");
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

	public function Obtenercliente($id)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM cliente WHERE idcliente = ?");
			          

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
	

	public function CambiarEstadoCliente($nuevo_estado, $id)
	{
		try 
		{
			$sql = "UPDATE cliente SET 
						estado      = ?
				    WHERE idcliente = ?";

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

	public function ActualizarCliente($data)
	{
		try 
		{
			$sql = "UPDATE cliente SET 
						nombre                  = ?, 
						apellido                = ?,
                        email                   = ?, 
						clave 			        = MD5(?),
						identificacion          = ?,
                        tarjeta                 = ?, 
						fechavencimientotarjeta = ?
				    WHERE idcliente = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->nombre, 
                        $data->apellido,
                        $data->email,
                        $data->clave,
                        $data->identificacion,
                        $data->tarjeta,
                        $data->fechavencimientotarjeta,
                        $data->idcliente
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

	public function RegistrarCliente($data)
	{
		try 
		{
		$sql = "INSERT INTO cliente (nombre, apellido, email, clave, identificacion, tarjeta, fechavencimientotarjeta) 
		        VALUES (?, ?, ?, MD5(?), ?, ?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(                
                    $data->nombre, 
                    $data->apellido,
                    $data->email,
                    $data->clave,
                    $data->identificacion,
                    $data->tarjeta,
                    $data->fechavencimientotarjeta
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