<?php

class Conexion extends PDO
{
	private $db_type='mysql';
	private $host='localhost';
	private $db_name='testrest';
	private $user='root';
	private $clave='root';

	function __construct()
	{
		try
		{
			parent::__construct
			(
				$this->db_type.':host='.$this->host.';dbname='.$this->db_name, $this->user,$this->clave
			);
		}catch(PDOException $ex)
		{
			echo "Algo anda mal en la conexión, vuelve más tarde. Detalles: ".$ex->getMessage();
		}
	}
}



?>