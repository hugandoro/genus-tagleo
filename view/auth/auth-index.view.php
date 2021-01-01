<!-- Vista para pantalla de login --> 

<div class="row">
  <div class="col-xs-12">
    <center><img src="assets/img/portada.png" width=50%></center>
  </div>
</div>

<h1 align="Center">TAGLEA</h1>
<h3 align="Center">Identificación digital para tu mascota</h3><br>

<div class="row">
    <div class="col-sm-4"></div>
    <div class="col-sm-4">

        <!-- El form de logueo hace un llamado al controlador Auth con la accion/metodo Autenticar --> 
        <div class="panel panel-secondary">
            <div class="panel-heading">
              <h4 class="panel-title" align="Center">Administra y configura tu placa QR</h4>
            </div>
            <div class="panel-body">
                <form method="post" action="?c=Auth&a=Autenticar" role="login">
                    <input type="text" name="usuario" placeholder="Digital el ID placa" required class="form-control" value="" autocomplete="off" />
                    <br>
                    <input type="password" name="password" class="form-control" id="password" placeholder="Digita el codigo unico de la placa..." required autocomplete="off" />
                    <hr />
                    <button type="submit" name="go" class="btn btn-lg btn-warning btn-block">Ingresar</button>
                </form>
            </div>

          </div>

        
    </div>
</div>