<?php
//Descomentar para produccion
//$id = "000000";
if (isset($_GET['id'])) $id = $_GET['id'];

//Descomentar para pruebas o para produccion
$data = json_decode(file_get_contents('http://127.0.0.1:8080/genus-tagleo/api-rest-ful/post.php?id=' . $id));
//$data = json_decode( file_get_contents('https://www.qr.genusgroupsas.com/api-rest-ful/post.php?id='.$id) );

//$data = json_decode( file_get_contents('https://www.imoxweb.com/backend/api-rest-ful/post.php?id='.$id) );

//https://qr.genusgroupsas.com/validacion.php?cod=1

if ($data->landingpage_estado == 0) {
  echo "<h3><center><span class='label label-warning'>PLACA en estado SUSPENDIDA</span></center></h3>";
  echo "<center><span class='label label-warning'>Su periodo de prueba ha caducado o su servicio ha vencido, para mayor informacion comunicarse con</span></center>";
  echo "<center><span class='label label-warning'>soporte@tagleo.com | Citando el siguiente codigo de placa - N° $id</span></center>";
  echo "<center><span class='label label-warning'>www.tagleo.com - 2021</span></center>";
  exit();
}
?>
<!DOCTYPE html>
<html>

<head>
  <link rel="shortcut icon" href="./favicon.ico" type="image/x-icon">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="TAGLEO | Seguridad digital para tu mascota | Codigos QR">
  <meta name="author" content="Genus Group SAS | Arte Grabana">
  <meta name="keywords" content="Codigo QR, seguridad, identificacion">

  <title>TAGLEO - Colombia</title>

  <!-- Bootstrap core CSS -->
  <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="assets/css/modern-business.css" rel="stylesheet">

</head>

<body>

  <!-- Navigation -->
  <!-- 100%—FF 95%—F2 90%—E6 85%—D9 80%—CC 75%—BF 70%—B3 65%—A6 60%—99 55%—8C 50%—80 45%—73 40%—66 35%—59 30%—4D 25%—40 20%—33 15%—26 10%—1A 5%—0D 0%—00 -->
  <nav class="navbar fixed-top navbar-expand-lg navbar-dark fixed-top" style="background:#000000BF;">
    <div class="container">
      <a class="navbar-brand" href="#">TAGLEO</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="#">TAGLEO | </a>
          </li>

          <!--
          <li class="nav-item">
            <a class="nav-link" href="#">Adquirir una placa | </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Activar una Placa | </a>
          </li>
          -->

          <li class="nav-item">
            <a class="nav-link" href="https://qr.genusgroupsas.com/">Administrar esta placa</a>
          </li>

        </ul>
      </div>
    </div>
  </nav>

  <header>

  </header>

  <!-- Page Content -->
  <div class="container">

    <!-- SECCION 1 - PARRAFO -->
    <div class="row">
      <div class="col-md-12 mb-12">
        <center>

          <br>
          <hr>
          <img src="<?php echo $data->landingpage_ruta_img; ?><?php echo $data->landingpage_logo_350x60_img; ?>" style="border-radius: 15px 15px 15px 15px;" alt="" height="260px">
          <hr>

        </center>
      </div>

      <div class="col-md-12 mb-12">
        <center>
          <label for="identificacion">
            <h3>Hola me llamo ... </h3>
            <h1><b><?php echo $data->landingpage_razon_social; ?></b></h1>
          </label>
        </center>
      </div>

      <div class="col-md-12 mb-12">
        <hr>
      </div>


      <!--<div class="col-md-4 mb-4">
        <center>
          <button type="submit" class="btn btn-warning btn-block" id="sendMessageButton">Ficha de nacimiento</button>
        </center>
      </div>-->

      <!--<div class="col-md-4 mb-4">
        <center>
          <button type="submit" class="btn btn-warning btn-block" id="sendMessageButton">Habitos alimenticios</button>
        </center>
      </div>-->

      <!--<div class="col-md-4 mb-4">
        <center>
          <button type="submit" class="btn btn-warning btn-block" id="sendMessageButton">Tratamiento medico especiales</button>
        </center>
      </div>-->

      <!--<div class="col-md-12 mb-12"><hr></div>-->

    </div>
    <!-- /.row -->



    <!-- CONTACTANOS -->
    <!--<br>
    <h3 align="center" id="bloque_contactanos">Enviar un correo electronico a mi dueño...<br><br></h3>
    <div class="row">
      <div class="col-lg-12 mb-6">
        <form name="sentMessage" id="contactForm" novalidate>
          <input type="hidden" id="destino" value="<?php echo $data->landingpage_contacto_email; ?>" />
          <div class="control-group form-group">
            <div class="controls">
              <label style="color:#4A4A4A;">Nombre</label>
              <input type="text" class="form-control" id="name" required data-validation-required-message="Ingrese un nombre valido">
              <p class="help-block"></p>
            </div>
          </div>
          <div class="control-group form-group">
            <div class="controls">
              <label style="color:#4A4A4A;">N° de Telefono</label>
              <input type="tel" class="form-control" id="phone" required data-validation-required-message="Ingrese un numero de contacto">
            </div>
          </div>
          <div class="control-group form-group">
            <div class="controls">
              <label style="color:#4A4A4A;">Correo electronico</label>
              <input type="email" class="form-control" id="email" required data-validation-required-message="Ingrese una direccion de correo valida">
            </div>
          </div>
          <div class="control-group form-group">
            <div class="controls">
              <label style="color:#4A4A4A;">Tu mensaje...</label>
              <textarea rows="3" cols="100" class="form-control" id="message" required data-validation-required-message="Ingrese un mensaje" maxlength="300" style="resize:none"></textarea>
            </div>
          </div>
          <div id="success"></div>-->
    <!-- For success/fail messages -->
    <!--<button type="submit" class="btn btn-warning btn-block" id="sendMessageButton">Enviar</button><br><br>
        </form>
      </div>
    </div>-->
    <!-- /.row -->


    <!-- MAPA
    <br>
    <h4 align="center" id="bloque_contactanos">Mi Hogar</h4>
    <div class="row">
      <div class="col-lg-12 mb-6" align="center">
        <img src="assets/img/mapa.png" width="100%" alt="Mapa"></a>
      </div>
    </div>

    <div class="col-md-12 mb-12"><hr></div>-->

    <!-- CONTACTA CON MI DUEÑO -->
    <h4 align="center" id="bloque_contactanos">Mi cuidador...</h4>
    <h3 align="center" id="bloque_contactanos"><b><?php echo $data->landingpage_representante_legal; ?></b></h3><br>

    <div class="row">

      <div class="col-lg-12 mb-12" align="center">

        <div class="card-group">
          <div class="card">
            <div class="card-body">
              <img src="assets/img/direccion.png" height="60px" alt="Card image cap">
              <h5 class="card-title">Mi dirección</h5>
              <p class="card-text">
                <?php echo $data->landingpage_direccion; ?> - <?php echo $data->landingpage_ciudad; ?> - <?php echo $data->landingpage_pais; ?>
              </p>
              <!--<p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>-->
            </div>
          </div>
          <div class="card">
            <div class="card-body">
              <img src="assets/img/telefonos.png" height="60px" alt="Card image cap">
              <h5 class="card-title">Telefonos de emergencia</h5>
              <p class="card-text">
                <?php echo $data->landingpage_telefono_fijo; ?> - <?php echo $data->landingpage_telefono_celular; ?>
              </p>
              <!--<p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>-->
            </div>
          </div>
        </div>

      </div>
    </div>

    <div class="row">
      <div class="col-lg-12 mb-12" align="center">
        <br><a target="_blank" href="https://api.whatsapp.com/send?phone=57<?php echo $data->landingpage_telefono_celular; ?>&text=Mensaje%20via%20TAGLEO%20-%20Hola..."><img src="assets/img/whatsapp_logo_color.png" height="80px" alt="Whatsapp"></a>
      </div>
    </div>





  </div>
  <!-- /.container -->

  <!-- Footer -->
  <footer class="py-5">
    <div class="row">
      <div class="col-lg-4"></div>
      <div class="col-lg-4">
        <p class="m-0 text-center" style="font-size:12px;">TAGLEO - Copyright &copy; - Un producto Genus Group SAS & Arte Grabana</p>
        <p class="m-0 text-center" style="font-size:12px;"><a href="https://www.genusgroupsas.com">www.genusgroupsas.com</a></p>
      </div>
      <div class="col-lg-4"></div>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="assets/jquery/jquery.min.js"></script>
  <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- JS FILES VALIDAD RUTA DEL CONTACT_ME.JS POR SI NO FUNCIONA AL ENVIAR CORREO-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
  <script src="./assets/js/jqBootstrapValidation.js"></script>
  <script src="./assets/js/contact_me.js"></script>

</body>

</html>