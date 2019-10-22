<?php
require_once("Conexion.php");
session_start();
Class Usuario
{

	private $id;
	private $user;
	private $password;

	const TABLE = 'usuarios';

	function __construct($id=null, $user=null, $password=null)
	{
		$this->id=$id;
		$this->user=$user;
		$this->password=$password;
	}



	public function getId()
	{
		return $this->id;
	}

	public function setId($id)
	{
		$this->id=$id;
	}

		public function getUser()
	{
		return $this->user;
	}

	public function setUser($user)
	{
		$this->user=$user;
	}
	public function getPassword()
	{
		return $this->password;
	}

	public function setPassword($password)
	{
		$this->password=$password;
	}



	    public function logIn($user,$password)
        {
            //aquí codificamos las instrucciones del login.

            //3.- realizar declaración de variable para la conexión e instanciar.
            

            $myConexion= new Conexion();


            //4.- realizar una consulta y guardar el resultado en una variable.
            // prepare.- prepara una sentencia para su ejecución y devuelve un objeto sentencia.
            //self.- da acceso a las variables estaticas, constantes de una clase (sin instancia).

            
    
            $consulta= $myConexion->prepare(
                'SELECT * FROM '.self::TABLE.' WHERE user= :user and pass= 
                    :myPassword '
            );

            //4.-asignar valores a los parámetros
            //bindParam.- Vincula un parámetro al nombre de variable especificado.
            $consulta->bindParam(':user',$user);
            $consulta->bindParam(':myPassword',$password);

            $consulta->execute();
            $registro=$consulta->fetch();
            $myConexion=null;

    
            if($registro)
            {
                echo '1';
            }else
            {
                echo '0';
            }
        }

	public static function getAllUsers()
	{
		$myObj=new Conexion();
		$consulta=$myObj->prepare('SELECT * FROM '.self::TABLE);
		$consulta->execute();
		$registros=$consulta->fetchAll();
		$myObj=null;
		return $registros;		
	}

	public function save()
	{
		$conexion= new Conexion();

		
			
			$consulta= $conexion->prepare('INSERT INTO '.self::TABLE.' (user,pass) VALUES (:user,:pass)');

			$consulta->bindParam(':user',$this->user);
			$consulta->bindParam(':pass',$this->password);

			$consulta->execute();
			$conexion=null;
	}


	public function update()
	{
		$conexion= new Conexion();

			$consulta= $conexion->prepare('UPDATE '.self::TABLE.' SET user= :user, pass=:pass WHERE id= :id');

			$consulta->bindParam(':user',$this->user);
			$consulta->bindParam(':pass',$this->password);
			$consulta->bindParam(':id',$this->id);

			$consulta->execute();
			$conexion=null;
	}


	public function delete($id)
	{
		$conexion = new Conexion();
		$consulta = $conexion->prepare('DELETE FROM '.self::TABLE.' WHERE id= :id');
		 $consulta->bindParam(':id',$id);
		 $consulta->execute();
		 $conexion=null;		
	}
	

	public static function getUserByIDUser($idusuario)
	{

$myObj=new Conexion();
		$consulta=$myObj->prepare('SELECT * FROM '.self::TABLE.' WHERE id = :id');
		$consulta->bindParam(':id',$idusuario);
		$consulta->execute();
		$registros=$consulta->fetchAll();
		$myObj=null;
		return $registros;			

	}



}



?>