<!-- Vista para pantalla de login --> 
<h1 class="page-header" align="Center">TAGLEO</h1>

<div class="row">
    <div class="col-sm-4"></div>
    <div class="col-sm-4">

        <!-- El form de logueo hace un llamado al controlador Auth con la accion/metodo Autenticar --> 
        <div class="panel panel-secondary">
            <div class="panel-heading">
              <h3 class="panel-title" align="Center">Ingreso usuario registrado</h3>
            </div>
            <div class="panel-body">
                <form method="post" action="?c=Auth&a=Autenticar" role="login">
                    <input type="email" name="usuario" placeholder="Email" required class="form-control" value="" autocomplete="off" />
                    <br>
                    <input type="password" name="password" class="form-control" id="password" placeholder="Password" required autocomplete="off" />
                    <hr />
                    <button type="submit" name="go" class="btn btn-lg btn-warning btn-block">Ingresar</button>
                </form>
            </div>

            <!--
            <div class="panel-heading">
              <a href="index.php?c=Auth&a=indexRegistro"><h3 class="panel-title" align="Center">Usuario nuevo - Registrarse</h3></a>
            </div>
            -->

          </div>

        
    </div>
</div>