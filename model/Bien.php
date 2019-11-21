<?php
class Bien
{
	private $pdo;
    
    public $idbien;
    public $codigointerno;
    public $codigomined;
    public $codigoitca;
	public $idclasificacionbien;
	public $tipobien;
	public $descripcionbien;
	public $marca;
    public $modelo;
    public $serie;
    public $idusuariocustodio;
	public $idubicacion;
	public $idestadobien;
	public $costobien;
	public $idfuentefinanciamiento;
	public $idtipocomprobante;
	public $numerocomprobante;
    public $fechaadquisicion;
    public $iddepartamento;
	public $observaciones;
	public $idusuarioregistro;
	public $fecharegistro;
	
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

	public function ListarBienActivos()
	{
		try
		{

			$stm = $this->pdo->prepare("SELECT b.idbien as idbien, codigointerno, codigomined, codigoitca, c.nombre as idclasificacionbien, tipobien, descripcionbien, marca, modelo, serie, ub.nombre as idubicacion, costobien, u.nombre as idusuariocustodio, e.nombre as estadobien, f.nombre as idfuentefinanciamiento, t.nombre as idtipocomprobante, numerocomprobante, fechaadquisicion, d.nombre as iddepartamento, observaciones, u.nombre as nombre FROM bien as b INNER JOIN usuario AS u ON b.idusuariocustodio = u.idusuario INNER JOIN departamento AS d ON b.iddepartamento = d.iddepartamento INNER JOIN tipocomprobante AS t ON b.idtipocomprobante = t.idtipocomprobante INNER JOIN fuentefinanciamiento AS f ON b.idfuentefinanciamiento = f.idfuentefinanciamiento INNER JOIN estadobien AS e ON b.idestadobien = e.idestadobien INNER JOIN ubicacion AS ub ON b.idubicacion = ub.idubicacion INNER JOIN clasificacionbien AS c ON b.idclasificacionbien = c.idclasificacionbien ORDER BY b.idestadobien <> 4 and idbien");
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

	public function ListarBienInactivos()
	{
		try
		{

			$stm = $this->pdo->prepare("SELECT * FROM bien WHERE idestadobien = 4");
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
	public function ListarBienActivosCustodio($idbien)
	{
		try
		{

			$stm = $this->pdo->prepare("SELECT b.idbien as idbien, codigointerno, codigomined, codigoitca, c.nombre as idclasificacionbien, tipobien, descripcionbien, marca, modelo, serie, ub.nombre as idubicacion, costobien, u.nombre as idusuariocustodio, e.nombre as estadobien, f.nombre as idfuentefinanciamiento, t.nombre as idtipocomprobante, numerocomprobante, fechaadquisicion, d.nombre as iddepartamento, observaciones, u.nombre as nombre FROM bien as b INNER JOIN usuario AS u ON b.idusuarioregistro = u.idusuario and b.idusuariocustodio = u.idusuario INNER JOIN departamento AS d ON b.iddepartamento = d.iddepartamento INNER JOIN tipocomprobante AS t ON b.idtipocomprobante = t.idtipocomprobante INNER JOIN fuentefinanciamiento AS f ON b.idfuentefinanciamiento = f.idfuentefinanciamiento INNER JOIN estadobien AS e ON b.idestadobien = e.idestadobien INNER JOIN ubicacion AS ub ON b.idubicacion = ub.idubicacion INNER JOIN clasificacionbien AS c ON b.idclasificacionbien = c.idclasificacionbien WHERE b.idusuariocustodio = ? AND b.idestadobien <> 4");	

		
			$stm->execute(array($idbien));
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


      public function ObtenerBien($id)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM bien WHERE idbien = ?");
			          

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
	

	public function CambiarEstado($nuevo_estado, $id)
	{
		try 
		{
			$sql = "UPDATE bien SET 
						idestadobien  = ?
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
	}

	public function ActualizarBien($data)
	{
		try 
		{
			$sql = "UPDATE bien SET 
						codigointerno            = ?, 
						codigomined              = ?,
						codigoitca               = ?, 
					   idclasificacionbien       = ?,
					   tipobien                  = ?,
					   descripcionbien           = ?,
					   marca					 = ?,
					   modelo					 = ?,
					   serie					 = ?,
					   idusuariocustodio		 = ?,
					   idubicacion                 = ?,
					   idestadobien			     = ?,
					   costobien				 = ?,
					   idfuentefinanciamiento	 = ?,
					   idtipocomprobante         = ?,
					   numerocomprobante		 = ?,
					   fechaadquisicion			 = ?,
					   iddepartamento			 = ?,
					   observaciones			 = ?,
					   idusuarioregistro		 = ?,
					   fecharegistro			 = ?
				    WHERE idbien = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                    $data->codigointerno, 
                    $data->codigomined,
                    $data->codigoitca,
					$data->idclasificacionbien,
					$data->tipobien,
					$data->descripcionbien,
					$data->marca,
					$data->modelo,
					$data->serie,
					$data->idusuariocustodio,
					$data->idubicacion,
					$data->idestadobien,
					$data->costobien,
					$data->idfuentefinanciamiento,
					$data->idtipocomprobante,
					$data->numerocomprobante,
					$data->fechaadquisicion,
					$data->iddepartamento,
					$data->observaciones,
					$data->idusuarioregistro,
					$data->fecharegistro,
					$data->idbien
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

	public function RegistrarBien($data)
	{
		try 
		{
		$sql = "INSERT INTO bien(codigointerno, codigomined, codigoitca, idclasificacionbien, tipobien, descripcionbien, marca, modelo,
		 serie, idusuariocustodio, idubicacion, idestadobien, costobien, idfuentefinanciamiento, idtipocomprobante, numerocomprobante, 
		 fechaadquisicion, iddepartamento, observaciones, idusuarioregistro) 
		        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(      
					          
                    $data->codigointerno, 
                    $data->codigomined,
                    $data->codigoitca,
					$data->idclasificacionbien,
					$data->tipobien,
					$data->descripcionbien,
					$data->marca,
					$data->modelo,
					$data->serie,
					$data->idusuariocustodio,
					$data->idubicacion,
					$data->idestadobien,
					$data->costobien,
					$data->idfuentefinanciamiento,
					$data->idtipocomprobante,
					$data->numerocomprobante,
					$data->fechaadquisicion,
					$data->iddepartamento,
					$data->observaciones,
					$data->idusuarioregistro
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

	public function ObtenerBienesPorUsuario($idbien,$idubicacion)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT idbien, codigointerno, codigomined, codigoitca, tipobien, descripcionbien, marca, modelo, serie, ub.nombre as idubicacion, costobien FROM bien as b INNER JOIN ubicacion AS ub ON b.idubicacion = ub.idubicacion  WHERE b.idusuariocustodio = ? AND b.idestadobien <> 4 AND b.idubicacion = ?");	

		
			$stm->execute(array($idbien,$idubicacion));
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


}