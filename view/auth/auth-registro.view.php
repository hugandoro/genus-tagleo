<!-- Vista para pantalla de login --> 
<h1 class="page-header" align="Center">IMOX constructor web</h1>

<div class="row">
    <div class="col-sm-4"></div>
    <div class="col-sm-4">

        <!-- El form de logueo hace un llamado al controlador Auth con la accion/metodo Autenticar --> 
        <div class="panel panel-danger">
            <div class="panel-heading">
              <h3 class="panel-title" align="Center">Registrarse como nuevo usuario</h3>
            </div>
            <div class="panel-body">
                <form method="post" action="?c=Auth&a=Registrar" role="login">
                    <input type="text" name="nombres" placeholder="Nombres" required class="form-control" value="" autocomplete="off" />
                    <br>
                    <input type="text" name="apellidos" placeholder="Apellidos" required class="form-control" value="" autocomplete="off" />
                    <br>
                    <input type="email" name="usuario" placeholder="Email" required class="form-control" value="" autocomplete="off" />
                    <br>
                    <input type="password" name="password" class="form-control" id="password" placeholder="Password" required autocomplete="off" />
                    <hr />
                    <button type="submit" name="go" class="btn btn-lg btn-danger btn-block">Registrar</button>
                </form>
            </div>

            <div class="panel-heading">
              <a href="index.php"><h3 class="panel-title" align="Center">Ya tengo un usuario - Ingresar</h3></a>
            </div>
          </div>

        
    </div>
</div>