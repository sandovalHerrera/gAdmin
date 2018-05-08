<?php include "includes/header.php"; ?>
<?php include "includes/navbar.php"; ?>
<?php include "includes/barraSuperior.php"; ?>

<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Producto Nuevo</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li class="active">Producto Nuevo</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<!--  Contenido  -->  
<form action="" type="POST" id="fPro" enctype="multipart/form-data">

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <strong>Producto nuevo</strong>
                    <small> -Formulario-</small>
                </div>
                <div class="card-body card-block">
                    <div class="form-group col-md-4 col-12">
                        <div class="col">
                            <label class=" form-control-label">Nombre del producto</label>
                            <input type="text" id="nombreP" placeholder="Nombre" class="form-control">
                        </div>
                        <div class="col">
                            <label class=" form-control-label">Cantidad</label>
                            <input type="text" id="cantidadP" placeholder="Cantidad" class="form-control">
                        </div>
                    </div>
                    <div class="form-group col-md-4 col-12">
                        <div class="col">
                            <label  class=" form-control-label">Categoria</label>
                            <select name="categoriaP" id="categoriaP" class="form-control">
                                <?php getCategorias(); ?>
                            </select>
                        </div>
                        <div class="col">
                            <label  class=" form-control-label">Lote</label>
                            <select name="select" id="ddlLotes" class="form-control">
                                <?php
                                $query = "SELECT idlote, lote_nombre
                                FROM lote 
                                WHERE eliminado = 0;";
                                $lotes = mysqli_query($conn,$query);
                                confirmQuery($lotes);
                                while($row = mysqli_fetch_assoc($lotes)) {
                                    $id = $row['idlote'];
                                    $lote = $row['lote_nombre'];
                                    echo "<option value='$id'>{$lote}</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group col-md-4 col-12">
                        <div class="col">
                            <img id="imagen" width="100" src="" alt="">
                        </div>

                        <div class="col">
                            <label class=" form-control-label">Una imagen .png, .jpg, jpeg no mayor a 10mb</label>
                            <input id="subirImg" onchange="PreviewImage();" class="form-control" type="file" name="file">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Relacion productos / materiales -->
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <strong>Mostrar/Ocultar Opciones </strong>
                </div>
                <div class="card-body">
                    <div class="col-md-3">
                        <button class="colls btn btn-secondary btn-lg" type="button" id="collD" 
                        data-toggle="collapse" data-target="#materialD" aria-expanded="false" aria-controls="materialD"> 
                        <i class="fa fa-flask"></i> Materiales Directos
                    </button>
                </div>
                <div class="col-md-3">
                    <button class="colls btn btn-secondary btn-lg" type="button" id="collI" 
                    data-toggle="collapse" data-target="#materialI" aria-expanded="false" aria-controls="materialI"> 
                    <i class="fa fa-gears"></i> Materiales Indirectos
                </button>
            </div>
            <div class="col-md-3">
                <button class="colls btn btn-secondary btn-lg" type="button" id="collMD"
                data-toggle="collapse" data-target="#obraD" aria-expanded="false" aria-controls="obraD"> 
                <i class="fa fa-gavel"></i>Mano de Obra Directa
            </button>
        </div>
        <div class="col-md-3">
            <button class="colls btn btn-secondary btn-lg" type="button" id="collMI"
            data-toggle="collapse" data-target="#obraI" aria-expanded="false" aria-controls="obraI">
            <i class="fa fa-envelope-o"></i>Mano de Obra Indirecta
        </button>
    </div>
</div>
</div>
</div>


<!-- Materiales Directos -->
<div class="collapse col-lg-6" id="materialD">
    <div class="card">
        <div class="card-header user-header alt bg-dark">
            <div class="media">
                <div class="media-body">
                    <h2 class="text-light display-6">Materiales</h2>
                    <p>DIRECTOS</p>
                </div>
            </div>
        </div>
        <div class="card-body card-block">
            <div class="form-group"><label for="categoria" class=" form-control-label">Material</label>
                <select name="select" id="ddlPD" class="form-control">
                    <option value='0'> Seleccione un material</option>
                    <?php
                    $preciosD = array(); $medidasD = array();
                    $query = "SELECT idmaterial,mat_nombre,precio, um_simbolo ,m.idun_med 
                    FROM materiales m 
                    INNER JOIN unidad_medida u ON u.idun_med = m.idun_med 
                    WHERE m.eliminado = 0 and m.indirecto = 0;";
                    $directos = mysqli_query($conn,$query);
                    confirmQuery($directos);
                    while($row = mysqli_fetch_assoc($directos)) {
                        $id = $row['idmaterial'];
                        $material = $row['mat_nombre'];
                        $precio =   $row['precio'];
                        $um =   $row['um_simbolo'];
                        array_push($preciosD, $precio);
                        array_push($medidasD, $um);
                        echo "<option value='$id'>{$material}</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="row">
                <div class="col-6 cantidad">
                    <div class="form-group">
                        <label class="form-control-label">Cantidad</label>
                        <input type="text" id='cantidadD' placeholder="Cantidad" class="form-control">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label class=" form-control-label">Agregar este material</label>
                        <button id="btnAggMD" type="button" 
                        class="btn btn-outline-success btn-block agg">
                        <i class="fa fa-plus"></i>Agregar
                    </button>
                </div>
            </div>
        </div>
        <ul class="list-group list-group-flush">
            <div id="materialesD"></div>
        </ul>
    </div>
</div>
</div> <!-- Materiales Directos -->

<!-- Materiales Indirectos -->
<div class="collapse col-lg-6" id="materialI">
    <div class="card">
        <div class="card-header user-header alt bg-dark">
            <div class="media">
                <div class="media-body">
                    <h2 class="text-light display-6">Materiales</h2>
                    <p>INDIRECTOS</p>
                </div>
            </div>
        </div>
        <div class="card-body card-block">
            <div class="form-group"><label for="categoria" class=" form-control-label">Material</label>
                <select name="select" id="ddlMI" class="form-control">
                    <option value='0'> Seleccione un material</option>
                    <?php
                    $preciosI = array(); $medidasI = array();
                    $query = "SELECT idmaterial, mat_nombre, precio, um_simbolo, m.idun_med 
                    FROM materiales m 
                    INNER JOIN unidad_medida u ON u.idun_med = m.idun_med 
                    WHERE m.eliminado = 0 and m.indirecto = 1;";
                    $indirectos = mysqli_query($conn,$query);
                    confirmQuery($indirectos);
                    while($row = mysqli_fetch_assoc($indirectos)) {
                        $id = $row['idmaterial'];
                        $material = $row['mat_nombre'];
                        $precio =   $row['precio'];
                        $um =   $row['um_simbolo'];
                        array_push($preciosI, $precio);
                        array_push($medidasI, $um);
                        echo "<option value='$id'>{$material}</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-group"><label for="cantidad" class=" form-control-label">Cantidad</label>
                        <input type="text" id="cantidadI" placeholder="Cantidad" class="form-control"></div>
                    </div>
                    <div class="col-6">
                        <div class="form-group"><label class=" form-control-label">Agregar este
                        material</label>
                        <button id="btnAggMI" type="button" class="btn btn-outline-success btn-block agg">
                            <i class="fa fa-plus"></i>&nbsp; Agregar
                        </button>
                    </div>
                </div>
            </div>
            <ul class="list-group list-group-flush">
                <div id="materialesI"></div>
            </ul>
        </div>
    </div>
</div> <!-- Materiales Indirectos -->

<!-- Mano de obra Directos -->
<div class="collapse col-lg-6" id="obraD">
    <div class="card">
        <div class="card-header user-header alt bg-dark">
            <div class="media">
                <div class="media-body">
                    <h2 class="text-light display-6">Mano de Obra</h2>
                    <p>DIRECTA</p>
                </div>
            </div>
        </div>
        <div class="card-body card-block">
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label class=" form-control-label">Cantidad de horas:</label>
                        <input type="text" id="horasMOD" placeholder="Horas" class="form-control">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="precioHora" class=" form-control-label">Precio por hora:</label>
                        <input type="text" id="phMOD" placeholder="Precio" class="form-control">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="descripcion" class=" form-control-label"> Descripción:</label>
                        <textarea name="textarea-input" id="descMOD" rows="2"
                        placeholder="Descripcion del trabajo"
                        class="form-control"></textarea>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group"><label for="cantidad" class=" form-control-label">Agregar este
                    material</label>
                    <button id="btnAggOD" type="button" class="btn btn-outline-success btn-block agg">
                        <i class="fa fa-plus"></i>Agregar
                    </button>
                </div>
            </div>
        </div>
    </div>
    <ul class="list-group list-group-flush">
        <div id="obraDdiv"></div>
    </ul>
</div>
</div><!-- Mano de Ora Directa -->

<!-- Mano de obra Indirectos -->
<div class="collapse col-lg-6" id="obraI">
    <div class="card">
        <div class="card-header user-header alt bg-dark">
            <div class="media">
                <div class="media-body">
                    <h2 class="text-light display-6">Mano de Obra</h2>
                    <p>INDIRECTA</p>
                </div>
            </div>
        </div>
        <div class="card-body card-block">
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label class=" form-control-label">Cantidad de horas:</label>
                        <input type="text" id="horasMOI" placeholder="Horas" class="form-control">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label class=" form-control-label">Precio por hora:</label>
                        <input type="text" id="phMOI" placeholder="Precio" class="form-control">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label class=" form-control-label"> Descripción:</label>
                        <textarea name="textarea-input" id="descMOI" rows="2"
                        placeholder="Descripcion del trabajo"
                        class="form-control"></textarea>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group"><label for="cantidad" class=" form-control-label">Agregar este
                    material</label>
                    <button id="btnAggOI" type="button" class="btn btn-outline-success btn-block agg">
                        <i class="fa fa-plus"></i>Agregar
                    </button>
                </div>
            </div>
        </div>
    </div>
    <ul class="list-group list-group-flush">
        <div id="obraIdiv"></div>
    </ul>
</div>
</div><!-- Mano de Obra Indirecta -->

</div><!-- producto -->

<!-- Tipo de ganancia -->
<div class="row">
    <div class="col-md-6 offset-md-4 mr-auto ml-auto">
        <select name="categoriaP" id="ddlGan" class="form-control">
            <option value='0'> Por Porcentaje</option>
            <option value='1'> Por Precio Fijo</option>
        </select>
        
    </div>  
</div>
<div class="row">
    <div class="col-md-4 offset-md-3 mr-auto ml-auto">
        <div class="input-group">
            <div class="input-group-btn">
                <button type="button" class="btn btn-success"><i class="fa fa-money"> %</i></button>
            </div>
            <input type="text" id="txtG" class="form-control">
            <div class="input-group-btn">
                <button type="button" id="btnGancia" class="btn btn-success" onclick="calcularGanancia();"><i class="fa fa-usd">Calcular</i></button>
            </div>
        </div>
    </div>
</div>


<!-- boton de agregar -->
<br/>
<div class="row">
    <div class="col-lg-6 offset-md-3 mr-auto ml-auto">
        <div class="card">
            <div class="card-body card-block">
                <button id="btnAgg" type="submit"   
                class="btn btn-success btn-lg btn-block">
                Agregar Producto $
            </button>
        </div>
    </div>
</div>
</div>

<!--  Contenido  -->
</div><!-- /#right-panel -->
</form>
<!-- Right Panel -->

<!--  -->
<script src="assets/js/vendor/jquery-3.3.1.min.js"></script>
<script src="assets/js/aggProductos.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/plugins.js"></script>
<script src="assets/js/main.js"></script>
<script src="assets/js/lib/alertifyjs/alertify.js"></script>


<script type="text/javascript">
 jQuery(document).ready(function () {
    function eliminar(elemento, tipo) {
        recalcular(id,tipo);
    }
    
});

 function PreviewImage() {
    var oFReader = new FileReader();
    oFReader.readAsDataURL(document.getElementById("subirImg").files[0]);

    oFReader.onload = function (oFREvent) {
        document.getElementById("imagen").src = oFREvent.target.result;
    };
};

    getPreciosD('<?php echo implode(',',$preciosD); ?>');
    getPreciosI('<?php echo implode(',',$preciosI); ?>');
    getMedidasD('<?php echo implode(',',$medidasD); ?>');
    getMedidasI('<?php echo implode(',',$medidasI); ?>');

</script>

</body>
</html>
