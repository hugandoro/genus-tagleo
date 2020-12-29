<?php
require_once 'model/landingpage.model.php';
error_reporting(0);

class LandingpageController{
    
    private $modelLandingpage,
            $auth;
    
    // Metodo constructor de la clase
    public function __CONSTRUCT(){
        $this->modelLandingpage = new Landingpage();
        $this->auth  = FactoryAuth::getInstance();
        
        // Hace un llamado al metodo estaAutenticado para validar si es una sesion registrada
        try{
            $this->auth->estaAutenticado();
        } 
        catch(Exception $e){
            header('Location: index.php');
        }
    }
    
    // Metodo que estructura la pagina por defecto
    public function Index(){
        //Carga las vistas para presentar al usuario
        require_once 'view/header.view.php';
        require_once 'view/menu.view.php';
        require_once 'view/landingpage/landingpage-listar.view.php';
        require_once 'view/footer.view.php';
    }
    
    // Metodo que permite hacer CRUD con la base de datos
    public function Crud(){
        $landingpageFicha = new Landingpage();
        
        // Valida si se recibe un ID - si existe es modo edicion y hace un llamado a obtener los datos del modelo
        if(isset($_REQUEST['id'])){
            $landingpageFicha = $this->modelLandingpage->Obtener($_REQUEST['id']); 
            //Carga las vistas para presentar al usuario - FICHA YA EXISTENTE MODO EDICION
            require_once 'view/header.view.php';
            require_once 'view/menu.view.php';
            require_once 'view/landingpage/landingpage-nuevo-editar.view.php';
            require_once 'view/footer.view.php';
        }
        else{
            //Carga las vistas para presentar al usuario - FICHA NUEVA
            require_once 'view/header.view.php';
            require_once 'view/menu.view.php';
            require_once 'view/landingpage/landingpage-nuevo.view.php';
            require_once 'view/footer.view.php';
        }
        
    }

    // Metodo para listar resultados de una busqueda
    public function listar(){
          //Carga las vistas para presentar al usuario
        require_once 'view/header.view.php';
        require_once 'view/menu.view.php';
        require_once 'view/landingpage/landingpage-listar.view.php';
        require_once 'view/footer.view.php';
    }

    // Metodo para guardar una nueva landingpage o los cambios realizados a una ya existente
    public function Guardar(){
        $landingpageFicha = new Landingpage();
        $registrosEncontrados = 0;
        
        ////TAB 1 - DATOS GENERALES
        $landingpageFicha->landingpage_id = $_REQUEST['id'];
        $landingpageFicha->landingpage_fecha = $_REQUEST['fecha'];
        $landingpageFicha->landingpage_razon_social = $_REQUEST['razon_social'];
        $landingpageFicha->landingpage_representante_legal = $_REQUEST['representante_legal'];
        $landingpageFicha->landingpage_direccion = $_REQUEST['direccion'];
        $landingpageFicha->landingpage_ciudad = $_REQUEST['ciudad'];
        $landingpageFicha->landingpage_pais = $_REQUEST['pais'];
        $landingpageFicha->landingpage_telefono_fijo = $_REQUEST['telefono_fijo'];
        $landingpageFicha->landingpage_telefono_celular = $_REQUEST['telefono_celular'];
        $landingpageFicha->landingpage_email = $_REQUEST['email'];
        $landingpageFicha->landingpage_categoria = $_REQUEST['categoria']; //CATEGORIA de la landingpage - Para precargue de imagenes
        $landingpageFicha->imgFile_logo_350x60 = $_FILES['imagen_logo_350x60']['name']; //Captura datos temporales NAME para cargar una imagen
        $landingpageFicha->tmp_dir_logo_350x60 = $_FILES['imagen_logo_350x60']['tmp_name']; //Captura datos temporales TMP_NAME para cargar una imagen
        $landingpageFicha->imgSize_logo_350x60 = $_FILES['imagen_logo_350x60']['size']; //Captura datos temporales SIZE para cargar una imagen

        //TAB 10 - ADMINISTRACION
        $landingpageFicha->landingpage_estado = $_REQUEST['estado'];
        $landingpageFicha->landingpage_dias_demo = $_REQUEST['dias_demo'];

        // Si existe un ID estamos editando y llama al metodo actualizar del modelo, de lo contrario hace un llamado al metodo registrar del modelo
        if ($landingpageFicha->landingpage_id > 0 ){
            $this->modelLandingpage->Actualizar($landingpageFicha);
            $this->modelLandingpage->cargarImagenes($landingpageFicha);
        }else{
            //$landingpageFicha->landingpage_id=$this->modelLandingpage->Registrar($landingpageFicha); //Registra y recibe el ID del nuevo registro
            $landingpageFicha->landingpage_id=$this->modelLandingpage->registrarNuevo($landingpageFicha); //Registra y recibe el ID del nuevo registro
            $this->modelLandingpage->Relacion($this->auth->usuario()->asesor_id,$landingpageFicha->landingpage_id); //Crea la relacion Asesor - ID landingpage recien creada
            //$this->modelLandingpage->cargarImagenes($landingpageFicha); //Renombra las imagenes con el nuevo ID y las carga a la carpeta web, enviamos el objeto ya con el nuevo ID
        }

        // Vuelve a la vista por de la landingpage con los cambios realizados
        header('Location: index.php?c=Landingpage&a=Crud&id='.$landingpageFicha->landingpage_id.'&token=' . @$_GET['token']);
    }
    
    // Metodo para eliminar una landingpage
    public function Eliminar(){
        // Hace un llamado al metodo eliminar del modelo enviando el ID del asesor y ID de la landingpage
        $this->modelLandingpage->Eliminar($this->auth->usuario()->asesor_id,$_REQUEST['id']);
        
        // Vuelve a la vista por defecto
        header('Location: index.php?c=landingpage&a=listar&filtro='.$_REQUEST['filtro'].'&token=' . @$_GET['token']);
    }
}