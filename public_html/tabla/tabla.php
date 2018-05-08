
<?php 
    session_start();
    require_once "../includes/db.php";
    $conexion=conexion();

 ?>

<table id="bootstrap-data-table" class="table table-striped table-bordered">
            <thead>
            <tr>
                <td>ID</td>
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
                        from materiales where idmaterial='$idp'";
                    }else{
                        $sql="SELECT idmaterial,mat_nombre,cantidad,precio 
                        from materiales";
                    }
                }else{
                    $sql="SELECT idmaterial,mat_nombre,cantidad,precio 
                        from materiales";
                }

                $result=mysqli_query($conexion,$sql);
                while($ver=mysqli_fetch_row($result)){ 

                    $datos=$ver[0]."||".
                           $ver[1]."||".
                           $ver[2]."||".
                           $ver[3];
                           
             ?>

            <tr>
                <td><?php echo $ver[0] ?></td>
                <td><?php echo $ver[1] ?></td>
                <td><?php echo $ver[2] ?></td>
                <td><?php echo $ver[3] ?></td>
                <td>
                    <button  class="btn btn-warning glyphicon glyphicon-pencil" data-toggle="modal" data-target="#modalEdicion" onclick="agregaform('<?php echo $datos ?>')">  </button>
                </td>
                <td>
                    <button class="btn btn-danger glyphicon glyphicon-remove"
                    onclick="preguntarSiNo('<?php echo $ver[0] ?>')">
                        
                    </button>
                </td>
            </tr>
            <?php 
        }
             ?>
             </tbody>
        </table>