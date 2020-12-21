<?php
class Asesor
{
	private $pdo;
    
    public $asesor_id;
    public $asesor_usuario;
    public $asesor_password;
    public $asesor_token;
	public $asesor_token_caducidad;
	public $asesor_nivel;
	public $asesor_nombres;
	public $asesor_apellidos;

	public function __CONSTRUCT(){
		try{
			$this->pdo = Database::StartUp();     
		}
		catch(Exception $e){
			die($e->getMessage());
		}
	}

	public function registrarNuevo(Asesor $data){
		try{
			$sql = "INSERT INTO asesor (asesor_usuario,asesor_password,asesor_nombres,asesor_apellidos)
			VALUES (?, ?, ?, ?)";

		$this->pdo->prepare($sql)
			->execute(
			array(
				$data->asesor_usuario,
				$data->asesor_password, 
				$data->asesor_nombres,
				$data->asesor_apellidos
				)
			);
		} 
		catch (Exception $e){
			//die($e->getMessage());
			require_once 'view/header.view.php';
			require_once 'view/auth/auth-registro.view.php';
			echo "<h3><center><span class='label label-warning'>Ya existe una cuenta con este correo</span></center></h3>";
			require_once 'view/footer.view.php';
			exit();
		}
	}

	public function Acceder($usuario, $password){
		try 
		{
			$stm = $this->pdo->prepare(
                "SELECT * FROM asesor WHERE asesor_usuario = ? AND asesor_password = ?"
            );

			$stm->execute(array($usuario,sha1($password)));
            
			$result = $stm->fetch(PDO::FETCH_OBJ);
            
            if(!is_object($result)){
                return new Asesor;
			} 
			else{
				return $result;
            }
		} 
		catch(Exception $e){
			die($e->getMessage());
		}
	}
}