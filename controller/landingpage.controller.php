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
        require_once 'view/landingpage/landingpage-buscar.view.php';
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
        $landingpageFicha->landingpage_identificacion = $_REQUEST['identificacion'];
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

		//TAB 2 - ENCABEZADO
		$landingpageFicha->landingpage_propuesta_valor = $_REQUEST['propuesta_valor'];
		$landingpageFicha->landingpage_apoyo_propuesta_valor = $_REQUEST['apoyo_propuesta_valor'];
		$landingpageFicha->landingpage_header_texto_boton1 = $_REQUEST['header_texto_boton1'];
		$landingpageFicha->landingpage_header_texto_boton2 = $_REQUEST['header_texto_boton2'];
		$landingpageFicha->landingpage_header_enlace_boton1 = $_REQUEST['header_enlace_boton1'];
        $landingpageFicha->landingpage_header_enlace_boton2 = $_REQUEST['header_enlace_boton2'];
        $landingpageFicha->imgFile_banner1 = $_FILES['imagen_banner1']['name']; //Captura datos temporales NAME para cargar una imagen
        $landingpageFicha->tmp_dir_banner1 = $_FILES['imagen_banner1']['tmp_name']; //Captura datos temporales TMP_NAME para cargar una imagen
        $landingpageFicha->imgSize_banner1 = $_FILES['imagen_banner1']['size']; //Captura datos temporales SIZE para cargar una imagen
        $landingpageFicha->imgFile_banner2 = $_FILES['imagen_banner2']['name']; //Captura datos temporales NAME para cargar una imagen
        $landingpageFicha->tmp_dir_banner2 = $_FILES['imagen_banner2']['tmp_name']; //Captura datos temporales TMP_NAME para cargar una imagen
        $landingpageFicha->imgSize_banner2 = $_FILES['imagen_banner2']['size']; //Captura datos temporales SIZE para cargar una imagen
        $landingpageFicha->imgFile_banner3 = $_FILES['imagen_banner3']['name']; //Captura datos temporales NAME para cargar una imagen
        $landingpageFicha->tmp_dir_banner3 = $_FILES['imagen_banner3']['tmp_name']; //Captura datos temporales TMP_NAME para cargar una imagen
        $landingpageFicha->imgSize_banner3 = $_FILES['imagen_banner3']['size']; //Captura datos temporales SIZE para cargar una imagen

		//TAB 3 - SECCION 1 - PARRAFO
		$landingpageFicha->landingpage_seccion1_titulo_largo = $_REQUEST['seccion1_titulo_largo'];
		$landingpageFicha->landingpage_seccion1_titulo_corto = $_REQUEST['seccion1_titulo_corto'];
        $landingpageFicha->imgFile_seccion1_imagen = $_FILES['seccion1_imagen']['name']; //Captura datos temporales NAME para cargar una imagen
        $landingpageFicha->tmp_dir_seccion1_imagen = $_FILES['seccion1_imagen']['tmp_name']; //Captura datos temporales TMP_NAME para cargar una imagen
        $landingpageFicha->imgSize_seccion1_imagen = $_FILES['seccion1_imagen']['size']; //Captura datos temporales SIZE para cargar una imagen
        $landingpageFicha->landingpage_seccion1_contenido = $_REQUEST['seccion1_contenido'];
        $landingpageFicha->landingpage_seccion1_contenido_html = $_REQUEST['seccion1_contenido_html'];
        
		//TAB 4 - SECCION 2 - PORTAFOLIO
		$landingpageFicha->landingpage_seccion2_titulo_largo = $_REQUEST['seccion2_titulo_largo'];
		$landingpageFicha->landingpage_seccion2_titulo_corto = $_REQUEST['seccion2_titulo_corto'];
        $landingpageFicha->imgFile_seccion2_imagen1 = $_FILES['seccion2_imagen1']['name']; //Captura datos temporales NAME para cargar una imagen
        $landingpageFicha->tmp_dir_seccion2_imagen1 = $_FILES['seccion2_imagen1']['tmp_name']; //Captura datos temporales TMP_NAME para cargar una imagen
        $landingpageFicha->imgSize_seccion2_imagen1 = $_FILES['seccion2_imagen1']['size']; //Captura datos temporales SIZE para cargar una imagen
		$landingpageFicha->landingpage_seccion2_titulo1 = $_REQUEST['seccion2_titulo1'];
		$landingpageFicha->landingpage_seccion2_contenido1 = $_REQUEST['seccion2_contenido1'];
        $landingpageFicha->imgFile_seccion2_imagen2 = $_FILES['seccion2_imagen2']['name']; //Captura datos temporales NAME para cargar una imagen
        $landingpageFicha->tmp_dir_seccion2_imagen2 = $_FILES['seccion2_imagen2']['tmp_name']; //Captura datos temporales TMP_NAME para cargar una imagen
        $landingpageFicha->imgSize_seccion2_imagen2 = $_FILES['seccion2_imagen2']['size']; //Captura datos temporales SIZE para cargar una imagen
		$landingpageFicha->landingpage_seccion2_titulo2 = $_REQUEST['seccion2_titulo2'];
		$landingpageFicha->landingpage_seccion2_contenido2 = $_REQUEST['seccion2_contenido2'];
        $landingpageFicha->imgFile_seccion2_imagen3 = $_FILES['seccion2_imagen3']['name']; //Captura datos temporales NAME para cargar una imagen
        $landingpageFicha->tmp_dir_seccion2_imagen3 = $_FILES['seccion2_imagen3']['tmp_name']; //Captura datos temporales TMP_NAME para cargar una imagen
        $landingpageFicha->imgSize_seccion2_imagen3 = $_FILES['seccion2_imagen3']['size']; //Captura datos temporales SIZE para cargar una imagen
		$landingpageFicha->landingpage_seccion2_titulo3 = $_REQUEST['seccion2_titulo3'];
        $landingpageFicha->landingpage_seccion2_contenido3 = $_REQUEST['seccion2_contenido3'];
        $landingpageFicha->landingpage_seccion2_boton1_texto = $_REQUEST['seccion2_boton1_texto'];
        $landingpageFicha->landingpage_seccion2_boton1_enlace = $_REQUEST['seccion2_boton1_enlace'];
        $landingpageFicha->landingpage_seccion2_boton1_url = $_REQUEST['seccion2_boton1_url'];
        $landingpageFicha->landingpage_seccion2_boton2_texto = $_REQUEST['seccion2_boton2_texto'];
        $landingpageFicha->landingpage_seccion2_boton2_enlace = $_REQUEST['seccion2_boton2_enlace'];
        $landingpageFicha->landingpage_seccion2_boton2_url = $_REQUEST['seccion2_boton2_url'];
        $landingpageFicha->landingpage_seccion2_boton3_texto = $_REQUEST['seccion2_boton3_texto'];
        $landingpageFicha->landingpage_seccion2_boton3_enlace = $_REQUEST['seccion2_boton3_enlace'];
        $landingpageFicha->landingpage_seccion2_boton3_url = $_REQUEST['seccion2_boton3_url'];
        
		//TAB 5 - SECCION 3 - PORTAFOLIO
		$landingpageFicha->landingpage_seccion3_titulo_largo = $_REQUEST['seccion3_titulo_largo'];
		$landingpageFicha->landingpage_seccion3_titulo_corto = $_REQUEST['seccion3_titulo_corto'];
        $landingpageFicha->imgFile_seccion3_imagen1 = $_FILES['seccion3_imagen1']['name']; //Captura datos temporales NAME para cargar una imagen
        $landingpageFicha->tmp_dir_seccion3_imagen1 = $_FILES['seccion3_imagen1']['tmp_name']; //Captura datos temporales TMP_NAME para cargar una imagen
        $landingpageFicha->imgSize_seccion3_imagen1 = $_FILES['seccion3_imagen1']['size']; //Captura datos temporales SIZE para cargar una imagen
		$landingpageFicha->landingpage_seccion3_titulo1 = $_REQUEST['seccion3_titulo1'];
		$landingpageFicha->landingpage_seccion3_contenido1 = $_REQUEST['seccion3_contenido1'];
        $landingpageFicha->imgFile_seccion3_imagen2 = $_FILES['seccion3_imagen2']['name']; //Captura datos temporales NAME para cargar una imagen
        $landingpageFicha->tmp_dir_seccion3_imagen2 = $_FILES['seccion3_imagen2']['tmp_name']; //Captura datos temporales TMP_NAME para cargar una imagen
        $landingpageFicha->imgSize_seccion3_imagen2 = $_FILES['seccion3_imagen2']['size']; //Captura datos temporales SIZE para cargar una imagen
		$landingpageFicha->landingpage_seccion3_titulo2 = $_REQUEST['seccion3_titulo2'];
		$landingpageFicha->landingpage_seccion3_contenido2 = $_REQUEST['seccion3_contenido2'];
        $landingpageFicha->imgFile_seccion3_imagen3 = $_FILES['seccion3_imagen3']['name']; //Captura datos temporales NAME para cargar una imagen
        $landingpageFicha->tmp_dir_seccion3_imagen3 = $_FILES['seccion3_imagen3']['tmp_name']; //Captura datos temporales TMP_NAME para cargar una imagen
        $landingpageFicha->imgSize_seccion3_imagen3 = $_FILES['seccion3_imagen3']['size']; //Captura datos temporales SIZE para cargar una imagen
		$landingpageFicha->landingpage_seccion3_titulo3 = $_REQUEST['seccion3_titulo3'];
        $landingpageFicha->landingpage_seccion3_contenido3 = $_REQUEST['seccion3_contenido3'];
        $landingpageFicha->landingpage_seccion3_boton1_texto = $_REQUEST['seccion3_boton1_texto'];
        $landingpageFicha->landingpage_seccion3_boton1_enlace = $_REQUEST['seccion3_boton1_enlace'];
        $landingpageFicha->landingpage_seccion3_boton1_url = $_REQUEST['seccion3_boton1_url'];
        $landingpageFicha->landingpage_seccion3_boton2_texto = $_REQUEST['seccion3_boton2_texto'];
        $landingpageFicha->landingpage_seccion3_boton2_enlace = $_REQUEST['seccion3_boton2_enlace'];
        $landingpageFicha->landingpage_seccion3_boton2_url = $_REQUEST['seccion3_boton2_url'];
        $landingpageFicha->landingpage_seccion3_boton3_texto = $_REQUEST['seccion3_boton3_texto'];
        $landingpageFicha->landingpage_seccion3_boton3_enlace = $_REQUEST['seccion3_boton3_enlace'];
        $landingpageFicha->landingpage_seccion3_boton3_url = $_REQUEST['seccion3_boton3_url'];
        
		//TAB 6 - SECCION 4 - PARRAFO
		$landingpageFicha->landingpage_seccion4_titulo_largo = $_REQUEST['seccion4_titulo_largo'];
		$landingpageFicha->landingpage_seccion4_titulo_corto = $_REQUEST['seccion4_titulo_corto'];
        $landingpageFicha->imgFile_seccion4_imagen = $_FILES['seccion4_imagen']['name']; //Captura datos temporales NAME para cargar una imagen
        $landingpageFicha->tmp_dir_seccion4_imagen = $_FILES['seccion4_imagen']['tmp_name']; //Captura datos temporales TMP_NAME para cargar una imagen
        $landingpageFicha->imgSize_seccion4_imagen = $_FILES['seccion4_imagen']['size']; //Captura datos temporales SIZE para cargar una imagen
        $landingpageFicha->landingpage_seccion4_contenido = $_REQUEST['seccion4_contenido'];
        $landingpageFicha->landingpage_seccion4_contenido_html = $_REQUEST['seccion4_contenido_html'];
        
		//TAB 7 - FORMULARIO DE CONTACTO
		$landingpageFicha->landingpage_contacto_titulo_largo = $_REQUEST['contacto_titulo_largo'];
		$landingpageFicha->landingpage_contacto_titulo_corto = $_REQUEST['contacto_titulo_corto'];
		$landingpageFicha->landingpage_contacto_email = $_REQUEST['contacto_email'];
		$landingpageFicha->landingpage_contacto_googlemaps_latitud = $_REQUEST['contacto_googlemaps_latitud'];
		$landingpageFicha->landingpage_contacto_googlemaps_longitud = $_REQUEST['contacto_googlemaps_longitud'];
        
        //TAB 8 - PIE DE PAGINA
		$landingpageFicha->landingpage_footer_facebook = $_REQUEST['footer_facebook'];
		$landingpageFicha->landingpage_footer_fanpage = $_REQUEST['footer_fanpage'];
		$landingpageFicha->landingpage_footer_twitter = $_REQUEST['footer_twitter'];
		$landingpageFicha->landingpage_footer_instagram = $_REQUEST['footer_instagram'];
		$landingpageFicha->landingpage_footer_linkedin = $_REQUEST['footer_linkedin'];
		$landingpageFicha->landingpage_footer_whatsapp = $_REQUEST['footer_whatsapp'];
        
        //TAB 9 - ENTORNO VISUAL
		$landingpageFicha->landingpage_fondo_navbar = $_REQUEST['fondo_navbar'];
        $landingpageFicha->landingpage_fondo_footer = $_REQUEST['fondo_footer'];
		$landingpageFicha->landingpage_texto_navbar = $_REQUEST['texto_navbar'];
        $landingpageFicha->landingpage_texto_footer = $_REQUEST['texto_footer'];
        $landingpageFicha->landingpage_texto_banner = $_REQUEST['texto_banner'];
        $landingpageFicha->landingpage_fondo_banner = $_REQUEST['fondo_banner'];
        $landingpageFicha->landingpage_color_botones = $_REQUEST['color_botones'];
		$landingpageFicha->landingpage_mostrar_botones_header = $_REQUEST['mostrar_botones_header'];
        $landingpageFicha->landingpage_mostrar_contactanos_header = $_REQUEST['mostrar_contactanos_header'];
        $landingpageFicha->landingpage_nombre_link1 = $_REQUEST['nombre_link1'];
        $landingpageFicha->landingpage_url_link1 = $_REQUEST['url_link1'];
        $landingpageFicha->landingpage_nombre_link2 = $_REQUEST['nombre_link2'];
        $landingpageFicha->landingpage_url_link2 = $_REQUEST['url_link2'];
        $landingpageFicha->landingpage_img_border_sec1 = $_REQUEST['img_border_sec1'];
        $landingpageFicha->landingpage_img_border_sec2 = $_REQUEST['img_border_sec2'];
        $landingpageFicha->landingpage_img_border_sec3 = $_REQUEST['img_border_sec3'];
        $landingpageFicha->landingpage_img_border_sec4 = $_REQUEST['img_border_sec4'];

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