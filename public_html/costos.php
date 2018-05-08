<?php include "includes/header.php"; ?>
<?php include "includes/navbar.php"; ?>
<?php include "includes/barraSuperior.php"; ?>

<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Dashboard</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li class="active">Dashboard</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<!--  Contenido  -->
<?php
    $query = "SELECT idproducto, pro_nombre, cat_nombre, pro_img FROM productos P 
    INNER JOIN categorias C ON C.idcategorias = P.idcategoria 
    WHERE P.eliminado = 0;";
    $result = mysqli_query($conn,$query);
    confirmQuery($result);
    while($row = mysqli_fetch_assoc($result)) {
        $id = $row['idproducto'];
        $nombre = $row['pro_nombre'];
        $categoria = $row['cat_nombre'];
        $img = $row['pro_img'];

        $totalMD = getTotalMateriales(true,$id);
        $totalMI = getTotalMateriales(false,$id);
        $totalMOD = getTotalManoObra(true,$id);
        $totalMOI = getTotalManoObra(false,$id);
        $total = $totalMD+ $totalMI+ $totalMOI + $totalMOD;

       ?>
        <div class="col-md-4">
            <section class="card">
                <div class="card-header user-header alt bg-dark">
                    <div class="media">
                            <img class="align-self-center rounded-circle mr-3"
                                 style="width:85px; height:85px;" alt="" src="images/products/<?php echo $img;?>">
                        <div class="media-body">
                            <h4 class="text-light"><?php echo $nombre;?></h4>
                            <p> <?php echo $categoria;?> </p>
                        </div>
                    </div>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <a href="#"> <i class="fa fa-home"></i> Materiales Directos
                            <span class="badge badge-primary pull-right">
                                $<?php echo $totalMD;?></span></a>
                    </li>
                    <li class="list-group-item">
                        <a href="#"> <i class="fa fa-road"></i> Materiales Indirectos
                            <span class="badge badge-primary pull-right">
                                $<?php echo $totalMI;?></span></a>
                    </li>
                    <li class="list-group-item">
                        <a href="#"> <i class="fa fa-male"></i> Mano de Obra Directa
                            <span class="badge badge-primary pull-right">
                                $<?php echo $totalMOD;?></span></a>
                    </li>
                    <li class="list-group-item">
                        <a href="#"> <i class="fa fa-truck"></i> Mano de Obra Indirecta
                            <span class="badge badge-primary pull-right">
                                $<?php echo $totalMOI;?></span></a>
                    </li>
                    <li class="list-group-item"> <h4> TOTAL:
                                <span class="badge badge-success pull-right">
                                    $<?php echo $total;?></span></a>
                    </li>
                </ul>
            </section>
        </div>

        <?php
    }
?>


<!--  Contenido  -->
</div><!-- /#right-panel -->

<!-- Right Panel -->

<script src="assets/js/vendor/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
<script src="assets/js/plugins.js"></script>
<script src="assets/js/main.js"></script>


</body>
</html>