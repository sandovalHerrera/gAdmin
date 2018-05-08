<?php include "includes/header.php"; ?>
<?php include "includes/navbar.php"; ?>
<?php include "includes/barraSuperior.php"; ?>
<?php 
$resultUM = '';
if (isset($_POST["btnUnidadMedida"])) {
    if ($_POST['txtUnidadMedida'] != '' && $_POST['txtAbreviatura'] != '') {
        if (aggUnidadMedida($_POST['txtUnidadMedida'], $_POST['txtAbreviatura'])) {
            $resultUM = "Unidad de medida agregada correctamente";
        } else $resultUM = "Llene los campos correctamente o la unidad de medida ya esta agregada";
    }
    else {
        $resultUM = "Llene los campos correctamente.";
    }

}
?>
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Configuración</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li class="active">Configuración</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<!--  Contenido  -->
<div class="row">
    <div class="col-md-6 ">
        <div class="card">
            <div class="card-header"><strong>Categoria nueva</strong>
                <small> -Categoria-</small>
            </div>
            <div class="card-body card-block">
                <div class="form-group">
                    <label for="cat_nombre" class=" form-control-label">Nombre</label>
                    <input type="text" id="cat_nombre" placeholder="Categoria" class="form-control">
                </div>

                <!-- boton de agregar -->
                <div class="row">
                    <div class="col-lg-6 offset-md-3 mr-auto ml-auto">
                        <button type="button" class="btn btn-success btn-lg btn-block">Agregar
                        </button>
                    </div>
                </div><!-- row -->

            </div>
        </div>
    </div>

    <div class="col-md-6 ">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Lista de Categorias</strong>
            </div>
            <div class="card-body">

               <table id="bootstrap-data-table" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <td> <b> ID </b></td>
                        <td><b>Categoría</b></td>
                        <td ><b>Editar</b></td>
                        <td ><b>Eliminar</b></td>
                    </tr>
                </thead>
                <tbody >
                    <?php 

                    if(isset($_SESSION['consulta'])){
                        if($_SESSION['consulta'] > 0){
                            $idp=$_SESSION['consulta'];
                            $sql="SELECT idcategorias,cat_nombre
                            from categorias where idcategorias='$idp' and eliminado=0";
                        }else{
                            $sql=$sql="SELECT idcategorias,cat_nombre
                            from categorias where eliminado=0";
                        }
                    }else{
                        $sql="SELECT idcategorias,cat_nombre
                        from categorias where eliminado=0";
                    }

                    $result=mysqli_query($conn,$sql);
                    while($ver=mysqli_fetch_row($result)){ 

                        $datos=$ver[0]."||".
                        $ver[1];

                        ?>

                        <tr>
                            <td><?php echo $ver[0] ?></td>
                            <td><?php echo $ver[1] ?></td>

                            <td align="center">
                                <button  class="btn btn-warning fa fa-pencil-square" data-toggle="modal" data-target="#modalEdicion" onclick="agregaformC('<?php echo $datos ?>')">  </button>
                            </td> 
                            <td align="center">
                                <button class="btn btn-danger fa fa-minus-circle"
                                onclick="preguntarSiNoC('<?php echo $ver[0] ?>')">

                            </button>
                        </td>
                    </tr>
                    <?php 
                }
                ?>
            </tbody>
        </table>


    </div>
</div>
</div>
</div> <!--  row categorias  -->


<div class="row">
    <div class="col-md-6 ">
        <div class="card">
            <div class="card-header"><strong>Nuevo Lote</strong>
                <small> -Lotes-</small>
            </div>
            <div class="card-body card-block">
                <div class="form-group">
                    <label for="cat_nombre" class=" form-control-label">Nombre del lote</label>
                    <input type="text" id="txtLote" placeholder="Nombre del lote" class="form-control">
                </div>
                <div class="form-group">
                    <label for="cat_nombre" class=" form-control-label">Fecha de Inicio</label>
                    <input type="text" id="txtFechaInicio" placeholder="Nombre del lote" class="form-control">
                </div>
                <div class="form-group">
                    <label for="cat_nombre" class=" form-control-label">Fecha de Expiración</label>
                    <input type="text" id="txtFechaExp" placeholder="Nombre del lote" class="form-control">
                </div>

                <!-- boton de agregar -->
                <div class="row">
                    <div class="col-lg-6 offset-md-3 mr-auto ml-auto">
                        <button type="button" class="btn btn-success btn-lg btn-block">Agregar
                        </button>
                    </div>
                </div><!-- row -->

            </div>
        </div>
    </div>

    <div class="col-md-6 ">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Lista de Lotes</strong>
            </div>
            <div class="card-body">

               <table id="bootstrap-data-table2" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th> <b> ID </b></td>
                            <th><b>Lote</b></td>
                                <th><b>Fecha Inicio</b></td>
                                    <th><b>Fecha Expira</b></td>
                                        <th><b>Editar</b></td>
                                            <th><b>Eliminar</b></td>
                                            </tr>
                                        </thead>
                                        <tbody >
                                            <?php 

                                            $sql = "SELECT * FROM lote;";
                                            $result=mysqli_query($conn,$sql);
                                            confirmQuery($result);
                                            while($ver=mysqli_fetch_row($result)){ 

                                             ?>

                                             <tr>
                                                <td><?php echo $ver[0] ?></td>
                                                <td><?php echo $ver[1] ?></td>
                                                <td><?php echo $ver[2] ?></td>
                                                <td><?php echo $ver[3] ?></td>
                                                <td align="center">
                                                    <button  class="btn btn-warning fa fa-pencil-square" data-toggle="modal" data-target="#modalEdicion")">  </button>
                                                </td> 
                                                <td align="center">
                                                    <button class="btn btn-danger fa fa-minus-circle")"></button>
                                                </td>
                                            </tr>
                                            <?php 
                                        }
                                        ?>
                                    </tbody>
                                </table>


                            </div>
                        </div>
                    </div>

                </div>

                <!-- row lotes -->

                <!-- row unidades de medida -->
                <div class="row">
                    <div class="col-md-6 ">
                        <div class="card">
                            <div class="card-header"><strong>Unidad de medida nueva</strong>
                                <small> -Unidad de Medida-</small>
                            </div>
                            <div class="card-body card-block">
                                <form action="config.php" method="POST">
                                    <div class="form-group">
                                        <label for="cat_nombre" class=" form-control-label">Nombre unidad de medida</label>
                                        <input type="text" name="txtUnidadMedida" placeholder="Unidad de medida" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="cat_nombre" class=" form-control-label">Abreviatura</label>
                                        <input type="text" name="txtAbreviatura" placeholder="Abreviatura" class="form-control">
                                    </div>

                                    <!-- boton de agregar -->
                                    <div class="row">
                                        <div class="col-lg-6 offset-md-3 mr-auto ml-auto">
                                            <button type="submit" name="btnUnidadMedida" class="btn btn-success btn-lg btn-block">Agregar
                                            </button>
                                        </div>
                                    </form>
                                </div><!-- row -->

                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 ">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Lista de Unidades de medidas</strong>
                            </div>
                            <div class="card-body">

                               <table id="bootstrap-data-table3" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <td> <b> ID </b></td>
                                        <td><b>Unidad de medida</b></td>
                                        <td><b>Abreviatura</b></td>
                                        <td ><b>Editar</b></td>
                                        <td ><b>Eliminar</b></td>
                                    </tr>
                                </thead>
                                <tbody >
                                    <?php 
                                    $sql="SELECT * FROM unidad_medida";

                                    $result=mysqli_query($conn,$sql);
                                    while($ver=mysqli_fetch_row($result)){ 

                                        ?>

                                        <tr>
                                            <td><?php echo $ver[0] ?></td>
                                            <td><?php echo $ver[1] ?></td>
                                            <td><?php echo $ver[2] ?></td>
                                            <td align="center">
                                                <button  class="btn btn-warning fa fa-pencil-square" data-toggle="modal" data-target="#modalEdicion">  </button>
                                            </td> 
                                            <td align="center">
                                                <button class="btn btn-danger fa fa-minus-circle">

                                                </button>
                                            </td>
                                        </tr>
                                        <?php 
                                    }
                                    ?>
                                </tbody>
                            </table>


                        </div>
                    </div>
                </div>
            </div> <!--  row categorias  -->

            <!-- Modal para edicion de datos -->

            <div class="modal fade" id="modalEdicion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Actualizar datos</h4>
                </div>
                <div class="modal-body">
                    <input type="text" hidden="" id="idcategoria" name="">
                    <label>Nombre Categoria</label>
                    <input type="text" name="" id="nombreC" class="form-control input-sm">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" id="actualizadatos" data-dismiss="modal">Actualizar</button>

                </div>
            </div>
        </div>
    </div>





    <div class="row"> <!--  row logo  -->
        <div class="col-md-6 ">
            <div class="card">
                <div class="card-header"><strong>Datos de la empresa</strong>
                    <small> -Datos-</small>
                </div>
                <div class="card-body card-block">
                    <div class="form-group">
                        <img src="images/admin.jpg" alt="">
                        <input type="file" name="image">
                    </div>
                    <div class="form-group">
                        <label for="nombre" class=" form-control-label">Nombre de la empresa</label>
                        <input type="text" id="nombre" placeholder="Nombre" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="direccion" class=" form-control-label">Dirección de la empresa</label>
                        <input type="text" id="direccion" placeholder="Direccion" class="form-control">
                    </div>

                    <!-- boton de agregar -->
                    <div class="row">
                        <div class="col-lg-6 offset-md-3 mr-auto ml-auto">
                            <button type="button" class="btn btn-success btn-lg btn-block">Modificar
                            </button>
                        </div>
                    </div><!-- row -->

                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="mx-auto d-block">
                        <img class="rounded-circle mx-auto d-block" src="images/admin.jpg" alt="Card image cap">
                        <h5 class="text-sm-center mt-2 mb-1">Nombre de la empresa</h5>
                        <div class="location text-sm-center"><i class="fa fa-map-marker"></i>Santa Ana, El Salvador</div>
                    </div>
                    <hr>
                    <div class="card-text text-sm-center">

                    </div>
                </div>
                <div class="card-footer">
                    <strong class="card-title mb-3">Datos de la empresa</strong>
                </div>
            </div>
        </div>
    </div>
    <!--  Contenido  -->
</div><!-- /#right-panel -->

<!-- Right Panel -->
<script src="assets/js/vendor/jquery-3.3.1.min.js"></script>

<script src="tabla/librerias/alertifyjs/alertify.js"></script>
<script src="tabla/funcionesT.js"></script>

<script src="assets/js/popper.min.js"></script>
<script src="assets/js/plugins.js"></script>
<script src="assets/js/main.js"></script>

<script src="assets/js/lib/data-table/datatables.min.js"></script>
<script src="assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
<script src="assets/js/lib/data-table/dataTables.buttons.min.js"></script>
<script src="assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
<script src="assets/js/lib/data-table/jszip.min.js"></script>
<script src="assets/js/lib/data-table/pdfmake.min.js"></script>
<script src="assets/js/lib/data-table/vfs_fonts.js"></script>
<script src="assets/js/lib/data-table/buttons.html5.min.js"></script>
<script src="assets/js/lib/data-table/buttons.print.min.js"></script>
<script src="assets/js/lib/data-table/buttons.colVis.min.js"></script>
<script src="assets/js/lib/data-table/datatables-init.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
        $('#bootstrap-data-table-export').DataTable();
        $('#bootstrap-data-table2').DataTable();
        $('#bootstrap-data-table3').DataTable();

        $('#actualizadatos').click(function(){
          actualizaDatosC();
        });

        mensajeUM = '<?php echo $resultUM; ?>';
        alertify.error(mensajeUM);
    });
</script>

</body>
</html>


