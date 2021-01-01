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

  <title>TAGLEA - Colombia</title>

  <!-- CDN - JS - Bootstrap --> 
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


</head>

<body>

  <!-- Navigation -->
  <!-- 100%—FF 95%—F2 90%—E6 85%—D9 80%—CC 75%—BF 70%—B3 65%—A6 60%—99 55%—8C 50%—80 45%—73 40%—66 35%—59 30%—4D 25%—40 20%—33 15%—26 10%—1A 5%—0D 0%—00 -->
  <nav class="navbar fixed-top navbar-expand-lg navbar-dark fixed-top" style="background:#000000BF;">
    <div class="container">
      <a class="navbar-brand" href="#">TAGLEA | Placa digital</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">

          <li class="nav-item">
            <a class="nav-link" href="https://qr.genusgroupsas.com/">Administrar placa</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="https://api.whatsapp.com/send?phone=573118284183&text=Mensaje%20TAGLEA%20-%20Hola...">Soporte tecnico y ventas</a>
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

    </div>
    <!-- /.row -->


    <!-- CONTACTA CON MI DUEÑO -->
    <h4 align="center" id="bloque_contactanos">Mi cuidador(a)...</h4>
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
            </div>
          </div>
          <div class="card">
            <div class="card-body">
              <img src="assets/img/telefonos.png" height="60px" alt="Card image cap">
              <h5 class="card-title">Telefonos de emergencia</h5>
              <p class="card-text">
                <?php echo $data->landingpage_telefono_fijo; ?> - <?php echo $data->landingpage_telefono_celular; ?>
              </p>
            </div>
          </div>
        </div>

      </div>
    </div>

    <div class="row">
      <div class="col-lg-12 mb-12" align="center">
        <br><a target="_blank" href="https://api.whatsapp.com/send?phone=57<?php echo $data->landingpage_telefono_celular; ?>&text=Mensaje%20TAGLEA%20-%20Hola..."><img src="assets/img/whatsapp_logo_color.png" height="80px" alt="Whatsapp"></a>
      </div>
    </div>

  </div>
  <!-- /.container -->

  <!-- Footer -->
  <footer class="py-5">
    <div class="row">
      <div class="col-lg-4"></div>
      <div class="col-lg-4">
        <hr>
        <p class="m-0 text-center" style="font-size:12px;">TAGLEA - Copyright &copy; - Un servicio Genus Group SAS<br>Distribuidores autorizados en Colombia - Arte Grabana - Ecoroji</p>
        <p class="m-0 text-center" style="font-size:12px;">Soportes y ventas <a class="nav-link" href="https://api.whatsapp.com/send?phone=573118284183&text=Mensaje%20TAGLEA%20-%20Hola...">+57 311 828 4183</a></p>
        <p class="m-0 text-center" style="font-size:12px;"><a href="https://www.genusgroupsas.com">www.genusgroupsas.com</a></p>
      </div>
      <div class="col-lg-4"></div>
    </div>
    <!-- /.container -->
  </footer>


  <!-- CDN - JS - Bootstrap --> 
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>