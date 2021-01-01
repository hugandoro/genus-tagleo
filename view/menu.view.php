<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="?c=Landingpage&token=<?php echo @$_GET['token']; ?>">TAGLEA | Identificación digital para tu mascota</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <!-- <li><a href="?c=Landingpage&a=Crud&token=<?php echo @$_GET['token']; ?>">Crear nueva placa</a></li> -->
        <!-- <li><a href="?c=Landingpage&token=<?php echo @$_GET['token']; ?>">Buscar placas</a></li> -->
      </ul>

      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
            <?php echo $this->auth->usuario()->asesor_nombres ." ". $this->auth->usuario()->asesor_apellidos; ?> <span class="caret"></span>
          </a>
          <ul class="dropdown-menu">
            <li><a href="?c=auth&a=desconectarse">Desconectarse</a></li>
          </ul>
        </li>
      </ul>

    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>