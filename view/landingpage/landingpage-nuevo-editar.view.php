<!-- Vista para CRUD a la base de datos Nuevo registro o modo edicion -->
<h6 class="page-header">
    TAGLEO - Crear/Editar placa
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
                    <li><a id="tabLabel2" href="#tabContent2" data-toggle="tab">Datos de contacto</a></li>
                    <li><a id="tabLabel3" href="#tabContent3" data-toggle="tab">Configuracion</a></li>
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

                                    <div class="form-group col-md-2" style="display: block;" title="NIT o documento de identificacion legal">
                                        <label for="identificacion">NIT/Documento</label>
                                        <input onblur="Mayuscula(this);" value="<?php echo $landingpageFicha->landingpage_identificacion; ?>" name="identificacion" id="identificacion" type="number" class="form-control" placeholder="Solo numeros sin puntos o comas">
                                    </div>

                                    <div class="form-group col-md-4" style="display: block;" title="Nombre de la empresa o del dueño del producto o servicio ofrecido">
                                        <label for="razon_social">Nombre de la mascota</label>
                                        <input onblur="Mayuscula(this);" value="<?php echo $landingpageFicha->landingpage_razon_social; ?>" name="razon_social" id="razon_social" type="text" class="form-control" placeholder="Como se llama la mascota que porta el TAG..." >
                                    </div>

                                    <div class="form-group col-md-4" style="display: block;" title="Nombre del representante legal de la empresa">
                                        <label for="representante_legal">Nombre dueñ@</label>
                                        <input onblur="Mayuscula(this);" value="<?php echo $landingpageFicha->landingpage_representante_legal; ?>" name="representante_legal" id="representante_legal" type="text" class="form-control" placeholder="Nombre del dueño o dueña de la mascota">
                                    </div>

                                    <!-- Fila 2 -->
                                    <div class="form-group col-md-6" style="display: block;" title="Direccion comercial">
                                        <label for="direccion">Direccion</label>
                                        <input onblur="Mayuscula(this);" value="<?php echo $landingpageFicha->landingpage_direccion; ?>" name="direccion" id="direccion" type="text" class="form-control" placeholder="Direccion donde reside la mascota...">
                                    </div>

                                    <div class="form-group col-md-3" style="display: block;" title="Ciudad principal donde opera la empresa">
                                        <label for="ciudad">Ciudad</label>
                                        <input onblur="Mayuscula(this);" value="<?php echo $landingpageFicha->landingpage_ciudad; ?>" name="ciudad" id="ciudad" type="text" class="form-control" placeholder="Ciudad a la que pertenece la direccion indicada">
                                    </div>
                                           
                                    <div class="form-group col-md-3" style="display: block;" title="Pais donde opera la empresa">
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

                    <!-- TAB 7 - FORMULARIO DE CONTACTO Y REDES SOCIALES -->
                    <div class="tab-pane" id="tabContent2">
                        <div class="">
                           <div class="row">
                                <div class="col-md-12">
                                    <hr style="border: 2px dashed #B9DC85" color="#FFFFFF"><br>

                                    <!-- Fila 1 -->
                                    <div class="form-group col-md-5" style="display: block;" title="...">
                                        <label for="contacto_titulo_largo">Titulo largo</label>
                                        <input onblur="Mayuscula(this);" value="<?php echo $landingpageFicha->landingpage_contacto_titulo_largo; ?>" name="contacto_titulo_largo" id="contacto_titulo_largo" type="text" class="form-control" placeholder="Titulo largo para el encabezado de la seccion" >
                                    </div>

                                    <div class="form-group col-md-2" style="display: block;" title="...">
                                        <label for="contacto_titulo_corto">Titulo corto</label>
                                        <input onblur="Mayuscula(this);" value="<?php echo $landingpageFicha->landingpage_contacto_titulo_corto; ?>" name="contacto_titulo_corto" id="contacto_titulo_corto" type="text" class="form-control" placeholder="Titulo corto para el menu superior" >
                                    </div>

                                    <div class="form-group col-md-5" style="display: block;" title="...">
                                        <label for="contacto_email">Email a donde seran enviados los mensajes</label>
                                        <input onblur="Mayuscula(this);" value="<?php echo $landingpageFicha->landingpage_contacto_email; ?>" name="contacto_email" id="contacto_email" type="text" class="form-control" placeholder="Correo electronico al que se redireccionara los mensajes de contacto via web" >
                                    </div>

                                    <!-- Fila 2 -->
                                    <hr style="border: 2px dashed #B9DC85" color="#FFFFFF"><br>

                                    <div class="form-group col-md-2" style="display: block;" title="...">
                                        <label for="footer_facebook">Facebook</label>
                                        <input onblur="Mayuscula(this);" value="<?php echo $landingpageFicha->landingpage_footer_facebook; ?>" name="footer_facebook" id="footer_facebook" type="text" class="form-control" placeholder="Perfil de usuario" >
                                    </div>

                                    <div class="form-group col-md-2" style="display: block;" title="...">
                                        <label for="footer_fanpage">Fanpage</label>
                                        <input onblur="Mayuscula(this);" value="<?php echo $landingpageFicha->landingpage_footer_fanpage; ?>" name="footer_fanpage" id="footer_fanpage" type="text" class="form-control" placeholder="Perfil de usuario" >
                                    </div>

                                    <div class="form-group col-md-2" style="display: block;" title="...">
                                        <label for="footer_twitter">Twitter</label>
                                        <input onblur="Mayuscula(this);" value="<?php echo $landingpageFicha->landingpage_footer_twitter; ?>" name="footer_twitter" id="footer_twitter" type="text" class="form-control" placeholder="Perfil de usuario" >
                                    </div>

                                    <div class="form-group col-md-2" style="display: block;" title="...">
                                        <label for="footer_instagram">Instagram</label>
                                        <input onblur="Mayuscula(this);" value="<?php echo $landingpageFicha->landingpage_footer_instagram; ?>" name="footer_instagram" id="footer_instagram" type="text" class="form-control" placeholder="Perfil de usuario" >
                                    </div>

                                    <div class="form-group col-md-2" style="display: block;" title="...">
                                        <label for="footer_linkedin">LinkedIn</label>
                                        <input onblur="Mayuscula(this);" value="<?php echo $landingpageFicha->landingpage_footer_linkedin; ?>" name="footer_linkedin" id="footer_linkedin" type="text" class="form-control" placeholder="Perfil de usuario" >
                                    </div>

                                    <div class="form-group col-md-2" style="display: block;" title="...">
                                        <label for="footer_whatsapp">N° Whatsapp</label>
                                        <input onblur="Mayuscula(this);" value="<?php echo $landingpageFicha->landingpage_footer_whatsapp; ?>" name="footer_whatsapp" id="footer_whatsapp" type="number" class="form-control" placeholder="Perfil de usuario" >
                                    </div>

                                    <!-- Fila 3 -->
                                    <div class="form-group col-md-2" style="display: block;" title="...">
                                        <a target="_blank" href="https://www.facebook.com/<?php echo $landingpageFicha->landingpage_footer_facebook;?>"><img src="assets/img/facebook60x60.png" height="40px"></a>
                                    </div>

                                    <div class="form-group col-md-2" style="display: block;" title="...">
                                        <a target="_blank" href="https://www.facebook.com/<?php echo $landingpageFicha->landingpage_footer_fanpage;?>"><img src="assets/img/fanpage60x120.png" height="40px"></a>
                                    </div>

                                    <div class="form-group col-md-2" style="display: block;" title="...">
                                        <a target="_blank" href="https://www.twitter.com/<?php echo $landingpageFicha->landingpage_footer_twitter;?>"><img src="assets/img/twitter60x60.png" height="40px"></a> 
                                    </div>

                                    <div class="form-group col-md-2" style="display: block;" title="...">
                                        <a target="_blank" href="https://www.instagram.com/<?php echo $landingpageFicha->landingpage_footer_instagram;?>"><img src="assets/img/instagram60x60.png" height="40px"></a>
                                    </div>

                                    <div class="form-group col-md-2" style="display: block;" title="...">
                                        <a target="_blank" href="https://www.linkedin.com/in/<?php echo $landingpageFicha->landingpage_footer_linkedin;?>"><img src="assets/img/linkedin60x60.png" height="40px"></a>
                                    </div>

                                    <div class="form-group col-md-2" style="display: block;" title="...">
                                        <a target="_blank" href="https://api.whatsapp.com/send?phone=57<?php echo $landingpageFicha->landingpage_footer_whatsapp;?>&text=Mensaje%20via%20web%20-%20Hola%20requiero%20informacion..."><img src="assets/img/whatsapp60x60.png" height="40px"></a>
                                    </div>

                                    <!--
                                    <div class="form-group col-md-6" style="display: block;">
                                        <label for="contacto_googlemaps_latitud">Google maps - Latitud</label>
                                        COMENTAR https://www.google.com/maps/dir/
                                        <input onblur="Mayuscula(this);" value="<?php echo $landingpageFicha->landingpage_contacto_googlemaps_latitud; ?>" name="contacto_googlemaps_latitud" id="contacto_googlemaps_latitud" type="number" class="form-control" placeholder="Coordenada LATITUD - Ejemplo : 4.7406173" >
                                    </div>

                                    <div class="form-group col-md-6" style="display: block;">
                                        <label for="contacto_googlemaps_longitud">Google maps - Longitud</label>
                                        COMENTAR https://www.google.com/maps/dir/
                                        <input onblur="Mayuscula(this);" value="<?php echo $landingpageFicha->landingpage_contacto_googlemaps_longitud; ?>" name="contacto_googlemaps_longitud" id="contacto_googlemaps_longitud" type="number" class="form-control" placeholder="Coordenada LONGITUD - Ejemplo : 76.341893" >
                                    </div>
                                    -->

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