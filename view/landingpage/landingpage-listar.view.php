<!-- Vista para pantalla resultados de la busqueda de landingpages clinicas con aplicacion de filtros -->
<h6 class="page-header">
    TAGLEO - Resultados de la consulta
</h6>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Codigo QR</th>
            <th class="visible-md visible-lg">Nit/Documento</th>
            <th>Nombre mascota</th>
            <th class="visible-md visible-lg">Nombre dueñ@</th>
            <th class="visible-md visible-lg">Direccion</th>
            <th class="visible-md visible-lg">Ciudad</th>
            <th style="width:20px;"></th>
            <th style="width:20px;"></th>
            <th style="width:20px;"></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($this->modelLandingpage->listarConComodin($_REQUEST['filtro'],$this->auth->usuario()->asesor_id) as $r): ?>
        <tr>
            <td><?php echo $r->landingpage_id; ?></td>
            <td class="visible-md visible-lg"><?php echo $r->landingpage_identificacion; ?></td>
            <td><?php echo $r->landingpage_razon_social; ?></td>
            <td class="visible-md visible-lg"><?php echo $r->landingpage_representante_legal; ?></td>
            <td class="visible-md visible-lg"><?php echo $r->landingpage_direccion; ?></td>
            <td class="visible-md visible-lg"><?php echo $r->landingpage_ciudad; ?></td>

            <td><a href="?c=Landingpage&a=Crud&id=<?php echo $r->landingpage_id; ?>&token=<?php echo @$_GET['token']; ?>"><img src="assets/img/abrir.png" width=16px title="Editar ficha"></a></td>
            <td><a target="_blank" href="validacion.php?id=<?php echo $r->landingpage_id; ?>"><img src="assets/img/previo.png" width=16px title="Previsualizar landingpage"></a></td>
            <td><a onclick="javascript:return confirm('¿Seguro de eliminar esta ficha ?');" href="?c=Landingpage&a=Eliminar&id=<?php echo $r->landingpage_id; ?>&filtro=<?php echo $_REQUEST['filtro']; ?>&token=<?php echo @$_GET['token']; ?>"><img src="assets/img/eliminar.png" width=16px title="Eliminar ficha"></a></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table> 
