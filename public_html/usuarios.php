<?php include "includes/header.php"; ?>
<?php include "includes/navbar.php"; ?>
<?php include "includes/barraSuperior.php"; ?>

<?php 

if (isset($_POST['nuevo_user'])) {
    $user = $_POST['user'];
    $pass1 = $_POST['pass1'];
    $pass2 = $_POST['pass2'];
    $tipo = $_POST['ddlTipo'];

    add_user($user,$pass1,$tipo);
}

?>

<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Usuarios</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li class="active">Usuarios</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<!--  Contenido  -->

<div class="col-md-6 ">
    <div class="card">
        <div class="card-header"><strong>Usuario nuevo</strong>
            <small> -Usuario-</small>
        </div>
        <div class="card-body card-block">

            <div class="login-form">
                <form id="agg_usuario" action="usuarios.php" method="POST">
                    <div class="form-group">
                        <label>Nombre de usuario</label>
                        <input name="user" type="text" class="form-control" placeholder="Usuario">
                    </div>
                    <div class="form-group">
                        <label>Contrasena</label>
                        <input name="pass1" type="password" class="form-control" placeholder="Contrasena">
                    </div>
                    <div class="form-group">
                        <label>Contrasena</label>
                        <input name="pass2" type="password" class="form-control" placeholder="Repita la Contrasena">
                    </div>
                    <div class="form-group">
                        <label for="categoria" class=" form-control-label">Tipo de usuario</label>
                        <select name="ddlTipo" id="ddlTipo" class="form-control">
                            <?php
                            $query = "SELECT idtipo_u, tu_nombre FROM tipo_usuario 
                            WHERE tu_nombre != 'Root';";
                            $tipo_us = mysqli_query($conn,$query);
                            confirmQuery($tipo_us);
                            while($row = mysqli_fetch_assoc($tipo_us)) {
                                $id = $row['idtipo_u'];
                                $tipo = $row['tu_nombre'];
                                echo "<option value='$id'>{$tipo}</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <button type="submit" name="nuevo_user" class="btn btn-primary btn-flat m-b-30 m-t-30">Register</button>
                </form>
            </div>

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
                    <td><b>Usuario</b></td>
                    <td ><b>Tipo</b></td>
                    <td ><b>Contrasena</b></td>
                    <td ><b>Editar</b></td>
                    <td ><b>Eliminar</b></td>
                </tr>
            </thead>
            <tbody >
                <?php 
                $sql="SELECT idusuario, tu_nombre, nombre, contrasena FROM usuario U
                INNER JOIN tipo_usuario T ON T.idtipo_u = U.idtipo_u 
                where eliminado=0";

                $result=mysqli_query($conn,$sql);
                confirmQuery($result);
                while($ver=mysqli_fetch_row($result)){ 

                    ?>

                    <tr>
                        <td><?php echo $ver[0] ?></td>
                        <td><?php echo $ver[1] ?></td>
                        <td><?php echo $ver[2] ?></td>
                        <td><?php echo substr($ver[3], 6,8) . '...'; ?></td>

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
    <div class="progress mb-2" style="height: 5px;">
        <div class="progress-bar bg-danger" role="progressbar" style="width: 100%;" aria-valuenow="100"
        aria-valuemin="0" aria-valuemax="100"></div>
    </div>
</div>
<!--  Contenido  -->

</div><!-- /#right-panel -->

<!-- Right Panel -->

<script src="assets/js/vendor/jquery-3.3.1.min.js"></script>
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
    });
</script>

</body>
</html>
