<!-- Modelo de datos para las landingpages clinicas-->
<?php
class Landingpage
{
	private $pdo;
	
	// Inicializa variables para campos que conforman la landingpage
	public $landingpage_id;
	public $landingpage_identificacion;
	public $landingpage_razon_social; 
	public $landingpage_representante_legal;
	public $landingpage_direccion;
	public $landingpage_ciudad;
	public $landingpage_pais;
	public $landingpage_telefono_fijo;
	public $landingpage_telefono_celular;
	public $landingpage_email;
	public $landingpage_categoria;
	public $imgFile_logo_350x60; //Imagen Logo_350x60
	public $tmp_dir_logo_350x60; //Imagen Logo_350x60
	public $imgSize_logo_350x60; //Imagen Logo_350x60
	

	public $landingpage_contacto_titulo_largo;
	public $landingpage_contacto_titulo_corto;
	public $landingpage_contacto_email;
	public $landingpage_footer_facebook;
	public $landingpage_footer_fanpage;
	public $landingpage_footer_twitter;
	public $landingpage_footer_instagram;
	public $landingpage_footer_linkedin;
	public $landingpage_footer_whatsapp;
	

	public $landingpage_estado;
	public $landingpage_dias_demo;

	// Metodo para iniciar el constructor
	public function __CONSTRUCT(){
		try{
			$this->pdo = Database::StartUp();     
		}
		catch(Exception $e) {
			die($e->getMessage());
		}
	}

	// Metodo para listar resultados de una consulta de landingpages CON FILTRO COMODIN
	public function listarConComodin($filtro,$idAsesor){
		try{
			$result = array();

			if (strtolower($filtro)!=''){
				$stm = $this->pdo->prepare("SELECT * FROM landingpage t1 
				INNER JOIN asesor_landingpage t2 ON (t1.landingpage_id = t2.landingpage_id) 
				WHERE (t2.asesor_id = '$idAsesor') AND ((t1.landingpage_razon_social LIKE '%$filtro%') OR (t1.landingpage_representante_legal LIKE '%$filtro%')  OR (t1.landingpage_id LIKE '%$filtro%') OR (t1.landingpage_identificacion LIKE '%$filtro%'))");
			}

			elseif (strtolower($filtro)==''){
				$stm = $this->pdo->prepare("SELECT * FROM landingpage t1 INNER JOIN asesor_landingpage t2 ON (t1.landingpage_id = t2.landingpage_id) WHERE (t2.asesor_id = '$idAsesor')");
			}

			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e){
			die($e->getMessage());
		}
	}

	// Metodo para listar resultados de una consulta de landingpages SIN FILTRO COMODIN
	public function listarSinComodin($identificacionLandingpage,$idAsesor){
		try{
			$result = array();
			$stm = $this->pdo->prepare("SELECT * FROM landingpage t1 
			INNER JOIN asesor_landingpage t2 ON (t1.landingpage_id = t2.landingpage_id) 
			WHERE (t2.asesor_id = '$idAsesor') AND (t1.landingpage_identificacion = '$identificacionLandingpage')");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e){
			die($e->getMessage());
		}
	}

	// Metodo para obtener el ID de una landingpage especificada (N° Identficiacion Paciente - Asesor propietario)
	// Solo puede existir una landingpage registrada con un numero de identificacion por asesor - Pero pueden existir varias landingpages con la misma identificacion con diferente asesor
	public function obtenerID($identificacionLandingpage,$idAsesor){
		try{
			$result = array();
			$stm = $this->pdo->prepare("SELECT * FROM landingpage t1 
			INNER JOIN asesor_landingpage t2 ON (t1.landingpage_id = t2.landingpage_id) 
			WHERE (t2.asesor_id = '$idAsesor') AND (t1.landingpage_identificacion = '$identificacionLandingpage')");
			$stm->execute();

			return $stm->fetch(PDO::FETCH_OBJ); //Retorna el objeto HISTORIA encontrada con todas sus propiemailes 
		}
		catch(Exception $e){
			die($e->getMessage());
		}
	}

	// Metodo para obtener los datos puntuales de un registro
	public function Obtener($idLandingpage){
		try{
			$stm = $this->pdo
			            ->prepare("SELECT * FROM landingpage WHERE landingpage_id = ?");

			$stm->execute(array($idLandingpage));
			return $stm->fetch(PDO::FETCH_OBJ);
		} 
		catch (Exception $e){
			die($e->getMessage());
		}
	}

	// Metodo para eliminar un registro
	public function Eliminar($idAsesor,$idLandingpage){
		try{
			//Borrar relaciones Asesor - Landingpages
			$stm = $this->pdo
			            ->prepare("DELETE FROM asesor_landingpage WHERE (landingpage_id = ?) AND (asesor_id = ?) ");			          
			$stm->execute(array($idLandingpage,$idAsesor));

			//Borra las imagenes relacionadas
			$stm = $this->pdo
			            ->prepare("SELECT * FROM landingpage WHERE landingpage_id = ?");
			$stm->execute(array($idLandingpage));
			$data = $stm->fetch(PDO::FETCH_OBJ);
			//Borra las imagenes salvo las precargadas identificadas porque inican con "demo"
			if (substr($data->landingpage_logo_350x60_img,0,4) != "demo") unlink("img_upload/".$data->landingpage_logo_350x60_img); //Borra el archivo vinculado

			//Borrar landingpage
			$stm = $this->pdo
			            ->prepare("DELETE FROM landingpage WHERE landingpage_id = ?");			          
			$stm->execute(array($idLandingpage));
		} 
		catch (Exception $e){
			die($e->getMessage());
		}
	}

	// Metodo para actualizar un registro
	public function Actualizar($data){
		try{
			$data->landingpage_identificacion == "" ? $data->landingpage_identificacion = "0" : $data->landingpage_identificacion;
			$data->landingpage_footer_whatsapp == "" ? $data->landingpage_footer_whatsapp = "0" : $data->landingpage_footer_whatsapp;

			$sql = "UPDATE landingpage SET 
						landingpage_identificacion					= ?,
						landingpage_razon_social					= ?,
						landingpage_representante_legal				= ?,
						landingpage_direccion						= ?,
						landingpage_ciudad							= ?,
						landingpage_pais							= ?,
						landingpage_telefono_fijo					= ?,
						landingpage_telefono_celular				= ?,
						landingpage_email							= ?,

						landingpage_contacto_titulo_largo			= ?,
						landingpage_contacto_titulo_corto			= ?,
						landingpage_contacto_email					= ?,
						landingpage_footer_facebook					= ?,
						landingpage_footer_fanpage					= ?,
						landingpage_footer_twitter					= ?,
						landingpage_footer_instagram				= ?,
						landingpage_footer_linkedin					= ?,
						landingpage_footer_whatsapp					= ?,

						landingpage_estado							= ?,
						landingpage_dias_demo						= ?

				    WHERE landingpage_id = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
						//TAB 1 - DATOS GENERALES
						$data->landingpage_identificacion,
						$data->landingpage_razon_social, 
						$data->landingpage_representante_legal,
						$data->landingpage_direccion,
						$data->landingpage_ciudad,
						$data->landingpage_pais, 
						$data->landingpage_telefono_fijo,
						$data->landingpage_telefono_celular,
						$data->landingpage_email,
						//TAB 7 - FORMULARIO DE CONTACTO
						$data->landingpage_contacto_titulo_largo,
						$data->landingpage_contacto_titulo_corto,
						$data->landingpage_contacto_email,
						$data->landingpage_footer_facebook,
						$data->landingpage_footer_fanpage,
						$data->landingpage_footer_twitter,
						$data->landingpage_footer_instagram,
						$data->landingpage_footer_linkedin,
						$data->landingpage_footer_whatsapp,
						//TAB 10 - ADMINISTRACION
						$data->landingpage_estado,
						$data->landingpage_dias_demo,
						//No se debe sobreescribir, se usa para ubicar el registro a modificar
            			$data->landingpage_id
					)
				);
		} 
		catch (Exception $e){
			die($e->getMessage());
		}
	}

	//Metodo para crear la relacion UNO a MUCHOS entre usuario - landingpage
	public function Relacion($idAsesor,$idLandingpage){
		try{
			$sql = "INSERT INTO asesor_landingpage (asesor_id,landingpage_id) VALUES (?, ?)";
			$this->pdo->prepare($sql)
				 ->execute(array($idAsesor,$idLandingpage));
		}
		catch (Exception $e){
			die($e->getMessage());
			//break;
		}
	}

	// Metodo para crear un nuevo registro solo DATOS GENERALES Y PRECARGADOS POR DEFECTO
	public function registrarNuevo(Landingpage $data){
		try{
		$data->landingpage_identificacion == "" ? $data->landingpage_identificacion = "0" : $data->landingpage_identificacion;

		if ($data->landingpage_categoria == "cat00") //00 - GENERAL
		{
			$demoLogo = "demo_cat00_logo_350x60.png";
		}

		$sql = "INSERT INTO landingpage (landingpage_identificacion,landingpage_razon_social,landingpage_representante_legal,landingpage_direccion,landingpage_ciudad,landingpage_pais,
				landingpage_telefono_fijo,landingpage_telefono_celular,landingpage_email,landingpage_categoria,landingpage_logo_350x60_img)
				VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

		$this->pdo->prepare($sql)
			->execute(
			array(
				//TAB 1 - DATOS GENERALES
				$data->landingpage_identificacion,
				$data->landingpage_razon_social, 
				$data->landingpage_representante_legal,
				$data->landingpage_direccion,
				$data->landingpage_ciudad,
				$data->landingpage_pais, 
				$data->landingpage_telefono_fijo,
				$data->landingpage_telefono_celular,
				$data->landingpage_email,
				$data->landingpage_categoria,
				$demoLogo,
				//------------------------------------------
				)
			);
		} 
		catch (Exception $e){
			die($e->getMessage());
		}

		return $this->pdo->lastInsertId(); //Retorna el ID (Autoincremental) del registro que se acaba de crear
	}

	//Metodo para validar, renombrar y cargar las imagenes
	public function cargarImagenes($data){

		//Parametros generales
		$rutaCarga = 'img_upload/';
		$extensionesValidas = array('jpg', 'png'); 
		
		//IMAGEN LOGO 350 x 60 ----------------------
		if ($data->imgFile_logo_350x60!='')
		{
			$imgExtension = strtolower(pathinfo($data->imgFile_logo_350x60,PATHINFO_EXTENSION));
			$imgNombre = $data->landingpage_id."_logo_350x60.".$imgExtension;
			
			if(in_array($imgExtension, $extensionesValidas)){   
				if($data->imgSize_logo_350x60 < 2000000) {
					unlink($rutaCarga.$data->landingpage_id."_logo_350x60.jpg"); //Borra trazas de JPG
					unlink($rutaCarga.$data->landingpage_id."_logo_350x60.png"); //Borra trazas de PNG
					move_uploaded_file($data->tmp_dir_logo_350x60,$rutaCarga.$imgNombre);
				}
				else $errMSG = "Lo sentimos fichero demasiado grande...";
			}
			else $errMSG = "Lo sentimos, solo archivos JPG, PNG son permitidos...";  
			
			if(!isset($errMSG)){
				$sql = "UPDATE landingpage SET landingpage_logo_350x60_img = ? WHERE landingpage_id = ?";
				$stm = $this->pdo->prepare($sql);
				if($stm->execute(array($imgNombre,$data->landingpage_id))) $successMSG = "new record succesfully inserted ...";
				else $errMSG = "error while inserting....";
			}
		}
		//Fin cargue de LOGO 350 x 60 ---------------

	}

}