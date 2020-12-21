<?php
require_once 'model/asesor.model.php';

class AuthController{
    
    private $model,
            $auth;
    
    // Metodo constructor
    public function __CONSTRUCT(){
        $this->model = new Asesor();
        $this->auth  = FactoryAuth::getInstance();
    }
    
    // Metodo que estructura la pagina por defecto de la pantalla de logueo
    public function Index(){
        require_once 'view/header.view.php';
        require_once 'view/auth/auth-index.view.php';
        require_once 'view/footer.view.php';
    }

    // Metodo que estructura la pagina para registro
    public function indexRegistro(){
        require_once 'view/header.view.php';
        require_once 'view/auth/auth-registro.view.php';
        require_once 'view/footer.view.php';
    }

    // Metodo para validar y registrar los datos del nuevo usuario
    public function Registrar(){
        $asesorFicha = new Asesor();
        $asesorFicha->asesor_nombres = $_REQUEST['nombres'];
        $asesorFicha->asesor_apellidos = $_REQUEST['apellidos'];
        $asesorFicha->asesor_usuario = $_REQUEST['usuario'];
        $asesorFicha->asesor_password = sha1($_REQUEST['password']);

        $this->model->registrarNuevo($asesorFicha);
        //header('Location: index.php'); 
        require_once 'view/header.view.php';
        require_once 'view/auth/auth-index.view.php';
        echo "<h3><center><span class='label label-success'>Cuenta creada exitosamente</span></center></h3>";
        require_once 'view/footer.view.php';
    }
    
    // Metodo para validar los datos ingresados por el usuario
    public function Autenticar(){
        try {
            $r = $this->auth->autenticar(
                $this->model->Acceder(
                    $_POST['usuario'],
                    $_POST['password']
                )
            );
            
            // Valida modelo de autenticacion definido
            if(__AUTH__ === 'token'){
                header("Location: ?c=Landingpage&token=$r"); // Si fuera token, redirecciona al controlador por defecto anexando el N° de token generado
            } 
            else{
                header('Location: ?c=Landingpage'); // En caso contrario, redireccion al controlador por defecto            
            }
        } 
        catch(Exception $e){
            header('Location: index.php'); // En caso de error remite a pagina inicial por defecto para validar credenciales de acceso
        }
    }
    
    // Metodo para cerrar sesion de un usuario
    public function Desconectarse(){
        $this->auth->destruir();
        header('Location: index.php'); // Remite a pagina inicial por defecto para validar credenciales de acceso
    }
}