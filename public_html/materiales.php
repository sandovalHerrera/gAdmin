<?php include "includes/header.php"; ?>
<?php include "includes/navbar.php"; ?>
<?php include "includes/barraSuperior.php"; ?>


<div class="breadcrumbs" >
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Materiales</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li class="active">Materiales</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<!--  Contenido  -->

<div class="content mt-3" >
    <div class="animated fadeIn">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Lista de Materiales</strong>
                    </div>
                    <div class="card-body" > 
                       
<table id="bootstrap-data-table" class="table table-striped table-bordered">
            <thead>
            <tr>
                <td>ID</td>
                <td>Categoría</td>
                <td>Nombre</td>
                <td>Cantidad</td>
                <td>Precio</td>
                <td>Editar</td>
                <td>Eliminar</td>
            </tr>
</thead>
<tbody >
            <?php 

                if(isset($_SESSION['consulta'])){
                    if($_SESSION['consulta'] > 0){
                        $idp=$_SESSION['consulta'];
                        $sql="SELECT idmaterial,mat_nombre,cantidad,precio
                        from materiales where idmaterial='$idp' and eliminado=0";
                    }else{
                        $sql="SELECT idmaterial,mat_nombre,cantidad,precio 
                        from materiales where eliminado=0";
                    }
                }else{
                    $sql="SELECT idmaterial,cat_nombre,mat_nombre,cantidad,precio 
                        from materiales M
                        INNER JOIN categorias C ON C.idcategorias = M.idcategoria 
                        where M.eliminado=0";
                }

                $result=mysqli_query($conn,$sql);
                confirmQuery($result);
                while($ver=mysqli_fetch_row($result)){ 

                    $datos=$ver[0]."||".
                           $ver[2]."||".
                           $ver[3]."||".
                           $ver[4];
                           
             ?>

            <tr>
                <td><?php echo $ver[0] ?></td>
                <td><?php echo $ver[1] ?></td>
                <td><?php echo $ver[2] ?></td>
                <td><?php echo $ver[3] ?></td>
                <td><?php echo $ver[4] ?></td>
                <td align="center">
                    <button  class="btn btn-warning fa fa-pencil-square" data-toggle="modal" data-target="#modalEdicion" onclick="agregaform('<?php echo $datos ?>')">  </button>
                </td> 
                <td align="center">
                    <button class="btn btn-danger fa fa-minus-circle"
                    onclick="preguntarSiNo('<?php echo $ver[0] ?>')">
                        
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


        </div>
    </div><!-- .animated -->
</div><!-- .content -->

<!--  Contenido  -->

</div><!-- /#right-panel -->



<!-- Modal para edicion de datos -->

<div class="modal fade" id="modalEdicion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Actualizar datos</h4>
      </div>
      <div class="modal-body">
      		<input type="text" hidden="" id="idmaterial" name="">
        	<label>Nombre</label>
        	<input type="text" name="" id="nombreM" class="form-control input-sm">
        	<label>Cantidad</label>
        	<input type="text" name="" id="cantidadM" class="form-control input-sm">
        	<label>Precio</label>
        	<input type="text" name="" id="precioM" class="form-control input-sm">
        	<p></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" id="actualizadatos" data-dismiss="modal">Actualizar</button>
        
      </div>
    </div>
  </div>
</div>


<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>



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
<script src="tabla/librerias/alertifyjs/alertify.js"></script>
<script src="tabla/funcionesT.js"></script>







<script type="text/javascript">
    $(document).ready(function () {
        $('#bootstrap-data-table-export').DataTable();
    });
</script>



</body>
</html>

<!-- <script type="text/javascript">
	$(document).ready(function(){
		$('#tabla').load('tabla/tabla.php');
	});
</script> -->

<script type="text/javascript">
    $(document).ready(function(){

        $('#actualizadatos').click(function(){
          actualizaDatos();
        });

    });
</script>
