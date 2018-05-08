<?php include "includes/header.php"; ?>
<?php include "includes/navbar.php"; ?>
<?php include "includes/barraSuperior.php"; ?>

<?php 
    if (isset($_SESSION['gp'])) {
        $alerta = $_SESSION['gp'];
    } else $alerta = 'vacio';
?>

<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Salida de productos</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li class="active">Productos</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<!--  Contenido  -->
<div class="row offset-md-3 mr-auto ml-auto">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="stat-widget-one">
                    <div class="stat-icon dib"><i class="ti-layout-grid2 text-warning border-warning"></i></div>
                    <div class="stat-content dib">
                        <div class="stat-text">Productos</div>
                        <div class="stat-digit">
                            <?php echo getNumOf('productos','idproducto'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="stat-widget-one">
                    <div class="stat-icon dib"><i class="ti-layout-grid2 text-success border-success"></i></div>
                    <div class="stat-content dib">
                        <div class="stat-text">Materiales</div>
                        <div class="stat-digit">
                            <?php echo getNumOf('materiales','idmaterial'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-6 offset-md-3 mr-auto ml-auto">
        <div class="card">
            <div class="card-body card-block">
                <div class="form-group">
                    <label class=" form-control-label">Categoria del producto:</label>
                    <select id="ddlCat" onchange="getPros();" class="form-control">
                        <?php getCategorias(); ?>
                    </select>
                </div>
                <div class="form-group ddls">
                    <label class=" form-control-label">Producto:</label>
                    <select name="ddlPro" id="ddlPro" class="form-control">
                       
                    </select>
                </div>
                <div class="form-group">
                    <label id="txtCant" class=" form-control-label">Cantidad</label>
                    <input type="text" id="txtCant" placeholder="Cantidad" class="form-control">
                </div>
                <div class="form-group">
                    <button id='agg' type="button" class="btn btn-success btn-lg btn-block">
                        Agregar
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<table>
    <thead>
        <tr>
            <th>Producto</th>
            <th>Categoría</th>
            <th>Cantidad</th>
            <th>Precio</th>
            <th>Subtotal</th>
            <tr>
            </thead>
            <tbody id="lista"></tbody>
        </table>

        <!-- boton de Salida -->
        <div class="row">
            <div class="col-lg-6 offset-md-3 mr-auto ml-auto">
                <div class="card">
                    <div class="card-body card-block">
                        <button type="button" class="btn btn-success btn-lg btn-block">
                            Descontar Productos
                        </button>
                    </div>
                </div>
            </div>
        </div>


        <!--  Contenido  -->
    </div><!-- /#right-panel -->

    <!-- Right Panel -->

    <script src="assets/js/vendor/jquery-3.3.1.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/salidas.js"></script>

<script type="text/javascript">
        function getPros() {
            datos = {cat:jQuery('#ddlCat').val()};
            jQuery.ajax({
            url: "includes/getPros.php", 
            type: "POST",             
            data: JSON.stringify(datos), 
            contentType: false,      
            cache: false,             
            processData:false,        
            success: function(data)   
            {   
                jQuery("#ddlPro").empty();
                jQuery.each(JSON.parse(data), function(id,pro){
                   jQuery("#ddlPro").append('<option value="'+id+'">'+pro+'</option>');
               });
            }
        });
    }
</script>

</body>
</html>