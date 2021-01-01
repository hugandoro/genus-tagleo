<!-- Vista para pantalla buscar una landingpage clinica por filtro -->
<h6 class="page-header">
    TAGLEA - Buscar placa activada...
</h6>

<div class="well well-sm text-right">
    <form id="frm-landingpage" action="?c=Landingpage&a=listar&token=<?php echo @$_GET['token']; ?>" method="post" enctype="multipart/form-data"> 
        <div class="form-group">
            <label>Filtro de busqueda</label>
            <input type="text" name="filtro" class="form-control" placeholder="Buscar por codigo de placa..." />
        </div>

        <div class="text-right">
            <button class="btn btn-warning">Buscar</button>
        </div>
</div>

<script>
    $(document).ready(function(){
        $("#frm-landingpage").submit(function(){
            return $(this).validate();
        });
    })


</script>