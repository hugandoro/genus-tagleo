<!-- Vista para CRUD a la base de datos Nuevo registro o modo edicion -->
<h6 class="page-header">
    TAGLEA - Crear/Editar placa
</h6>

<ol class="breadcrumb">
  <li><a href="?c=Landingpage&token=<?php echo @$_GET['token']; ?>">Menu de busqueda</a></li>
  <li class="active"><?php echo $landingpageFicha->landingpage_id != null ? ('Codigo N° ' . $landingpageFicha->landingpage_id ) : 'Nueva ficha de producto'; ?></li> <!-- ORGANIZAR -->
  <a target="_blank" href="validacion.php?id=<?php echo $landingpageFicha->landingpage_id; ?>"> <img src="assets/img/previo.png" width=24px title="Previsualizar landingpage"></a>
</ol>

<form class="col-md-12" id="frm-landingpage" action="?c=Landingpage&a=Guardar&token=<?php echo @$_GET['token']; ?>" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $landingpageFicha->landingpage_id; ?>" />
        
    <div class="container-fluid shadow">
        <div class="row">     
            <div class="row" id="tab0" data-role="tab">
                <!-- Coleccion menu pestañas de TAB -->
                <ul class="nav nav-tabs">
                    <li class="active"><a id="tabLabel1" href="#tabContent1" data-toggle="tab">Ficha tecnica</a></li>
                    <li><a id="tabLabel3" href="#tabContent3" data-toggle="tab">Configuración</a></li>
                </ul>

                <div class="tab-content">
                    <!-- TAB 1 - DATOS GENERALES -->
                    <div class="tab-pane active" id="tabContent1">
                        <div class="">
                            <div class="row">
                                <div class="col-md-12">
                                    <hr style="border: 2px dashed #B9DC85" color="#FFFFFF"><br>

                                    <!-- Fila 1 -->
                                    <div class="form-group col-md-2" style="display: block;" title="Fecha de creacion de la landingpage">
                                        <label for="fecha">Fecha de registro</label>
                                        <input onblur="Mayuscula(this);" readonly value="<?php echo $landingpageFicha->landingpage_fecha; ?>" name="fecha" id="fecha" type="text" class="form-control" placeholder="">
                                    </div>

                                    <div class="form-group col-md-5" style="display: block;" title="Nombre de la empresa o del dueño del producto o servicio ofrecido">
                                        <label for="razon_social">Nombre de la mascota</label>
                                        <input onblur="Mayuscula(this);" value="<?php echo $landingpageFicha->landingpage_razon_social; ?>" name="razon_social" id="razon_social" type="text" class="form-control" placeholder="Como se llama la mascota que porta el TAG..." >
                                    </div>

                                    <div class="form-group col-md-5" style="display: block;" title="Nombre del representante legal de la empresa">
                                        <label for="representante_legal">Nombre dueñ@</label>
                                        <input onblur="Mayuscula(this);" value="<?php echo $landingpageFicha->landingpage_representante_legal; ?>" name="representante_legal" id="representante_legal" type="text" class="form-control" placeholder="Nombre del dueño o dueña de la mascota">
                                    </div>

                                    <!-- Fila 2 -->
                                    <div class="form-group col-md-4" style="display: block;" title="Direccion comercial">
                                        <label for="direccion">Direccion</label>
                                        <input onblur="Mayuscula(this);" value="<?php echo $landingpageFicha->landingpage_direccion; ?>" name="direccion" id="direccion" type="text" class="form-control" placeholder="Direccion donde reside la mascota...">
                                    </div>

                                    <div class="form-group col-md-4" style="display: block;" title="Ciudad principal donde opera la empresa">
                                        <label for="ciudad">Ciudad</label>
                                        <input onblur="Mayuscula(this);" value="<?php echo $landingpageFicha->landingpage_ciudad; ?>" name="ciudad" id="ciudad" type="text" class="form-control" placeholder="Ciudad a la que pertenece la direccion indicada">
                                    </div>
                                           
                                    <div class="form-group col-md-4" style="display: block;" title="Pais donde opera la empresa">
                                        <label for="pais">Pais</label>
                                        <input onblur="Mayuscula(this);" value="<?php echo $landingpageFicha->landingpage_pais; ?>" name="pais" id="pais" type="text" class="form-control" placeholder="Pais al que pertenece la ciudad mencionada">
                                    </div>

                                    <!-- Fila 3 -->
                                    <div class="form-group col-md-3" style="display: block;" title="Numero de telefon fijo">
                                        <label for="telefono_fijo">Telefono fijo de emergencia</label>
                                        <input onblur="Mayuscula(this);" value="<?php echo $landingpageFicha->landingpage_telefono_fijo; ?>" name="telefono_fijo" id="telefono_fijo" type="number" class="form-control" placeholder="Numero telefonico fijo">
                                    </div>

                                    <div class="form-group col-md-3" style="display: block;" title="Numero de telefono celular">
                                        <label for="telefono_celular">N° Celular de para emergencias</label>
                                        <input onblur="Mayuscula(this);" value="<?php echo $landingpageFicha->landingpage_telefono_celular; ?>" name="telefono_celular" id="telefono_celular" type="number" class="form-control" placeholder="Numero de movil o celular">
                                    </div>

                                    <div class="form-group col-md-6" style="display: block;" title="Direccion de correo electronico para contacto interno">
                                        <label for="email">Email</label>
                                        <input onblur="Mayuscula(this);" value="<?php echo $landingpageFicha->landingpage_email; ?>" name="email" id="email" type="text" class="form-control" placeholder="Correo electronico de contacto">
                                    </div>

                                    <!-- Fila 4 -->
                                    <hr style="border: 2px dashed #B9DC85" color="#FFFFFF"><br>

                                    <div class="form-group col-md-9" style="display: block;" title="Logotipo a mostra de la entidad o servicio">
                                        <label for="imagen_logo_350x60">Foto de la mascota que porta el TAG - Resolucion recomendada 400 x 400 pixeles</label>
                                        <input name="imagen_logo_350x60" type="file" id="imagen_logo_350x60" class='form-control'/>
                                    </div>

                                    <div class="form-group col-md-3" style="display: block;">
                                        <?php echo $landingpageFicha->landingpage_logo_350x60_img != '' ?
                                        "<img style='border-radius: 0%;' src='img_upload/".$landingpageFicha->landingpage_logo_350x60_img."' width=100px>": 
                                        "<img style='border-radius: 0%;' src='img_upload/logo.png' width=100%>"; 
                                        ?>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- TAB 10 - CONFIGURACION -->
                    <div class="tab-pane" id="tabContent3">
                        <div class="">
                           <div class="row">
                                <div class="col-md-12">
                                    <hr style="border: 2px dashed #B9DC85" color="#FFFFFF"><br>

                                    <!-- Fila 1 -->
                                    <div class="form-group col-md-12 <?php if($this->auth->usuario()->asesor_nivel != '3') echo 'hidden'; ?>" style="display: block;" title="Estado de la landinpage">
                                        <label for="estado">Estado de la placa | </label>

                                        <div class="btn-group">
                                            <label class="btn btn-warning">
                                                <input type="radio" name="estado" id="option0" value="0" autocomplete="off" <?php if($landingpageFicha->landingpage_estado=='0') echo "checked"; ?>> Inactivada
                                            </label>
                                            <label class="btn btn-info">
                                                <input type="radio" name="estado" id="option1" value="1" autocomplete="off" <?php if($landingpageFicha->landingpage_estado=='1') echo "checked"; ?>> Modo prueba
                                            </label>
                                            <label class="btn btn-success">
                                                <input type="radio" name="estado" id="option2" value="2" autocomplete="off" <?php if($landingpageFicha->landingpage_estado=='2') echo "checked"; ?>> Activada
                                            </label>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12 <?php if($this->auth->usuario()->asesor_nivel != '3') echo 'hidden'; ?>" style="display: block;" title="Dias habilitados demostracion">
                                        <label for="dias_demo">PLACA dias habilitada en MODO PRUEBA</label>
                                        <input onblur="Mayuscula(this);" value="<?php echo $landingpageFicha->landingpage_dias_demo; ?>" name="dias_demo" id="dias_demo" type="number" class="form-control" placeholder="Dias habilitados demo">
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

    <div class="form-group col-md-12 text-right" style="display: block;">
        <div class="form-group col-md-12" style="display: block;"><hr></div>
        <button class="btn btn-warning btn-block" name="btn-guardar" id="btn-guardar">Guardar cambios en la ficha</button>
    </div>
</form>

<script>
    $(document).ready(function(){
        $("#frm-landingpage").submit(function(){
            return $(this).validate();
        });

        //Validar alteraciones a valores originales y aviso al usuario de pendiente guardar cambios
        $('#frm-landingpage').on('input', ':input', function() { 
            var value = $(this).val(); 
            if (value.length > 0){ 
                //$(this).removeClass('lost');
                $(this).addClass('btn-success');
                $('#btn-guardar').addClass('btn-danger');
            }
        });
    })

    function Mayuscula(caracter) {
        //caracter.value = caracter.value.toUpperCase();
    }
</script>