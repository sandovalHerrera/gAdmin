<?php include "includes/header.php"; ?>
<?php include "includes/navbar.php"; ?>
<?php include "includes/barraSuperior.php"; ?>

<?php 

$query = "SELECT M.idmaterial, M.cantidad FROM materiales M
WHERE M.eliminado = 0;";
$result = mysqli_query($conn, $query);
confirmQuery($result);

$aMateriales = array();
while ($row = mysqli_fetch_assoc($result)) {
    $aMateriales[$row['idmaterial']] = $row['cantidad'];
}

$query = "SELECT P.idproducto, M.idmaterial, MP.cantidad, P.pro_nombre, P.pro_img FROM productos P
INNER JOIN mat_x_pro MP ON P.idproducto = MP.idproducto
INNER JOIN materiales M ON M.idmaterial = MP.idmaterial
WHERE P.eliminado = 0
ORDER BY P.idproducto;";

$result = mysqli_query($conn, $query);
confirmQuery($result);

$cont = 0;

$arrayTotal = array();
$arraySinPro = array();
$arrayIMG = array();
while ($row = mysqli_fetch_assoc($result)) {

        if ($cont == 0) {
            $idAux = $row['idproducto'];
        }
        if ($row['idproducto'] != $idAux) {
            $arraySinPro = array();
        }

        for ($i=0; $i < count($aMateriales); $i++) {
            $idmaterial = $row['idmaterial']; 
            $stock = $aMateriales[$idmaterial];
            $sinpro = floor($stock / $row['cantidad']);
            array_push($arraySinPro, $sinpro);
            $arrayTotal[$row['pro_nombre']] = min($arraySinPro);
            $arrayIMG[$row['pro_nombre']] = $row['pro_img'];
        }
    $cont++;
}

?>

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

<div class="col-sm-12 mb-4">
    <?php 
    while ($nombre = current($arrayTotal)) {
        ?>

        <div class="card col-md-2">
          <img class="card-img-top img-responsive" src="images/products/<?php echo $arrayIMG[key($arrayTotal)]; ?>" height="150">
          <div class="card-body">
            <h5 class="card-title"> <?php echo key($arrayTotal); ?> </h5>
            <h3 class="card-text"> <?php echo $arrayTotal[key($arrayTotal)]; ?> </h3>
          </div>
        </div>
    <?php
        next($arrayTotal); 
    }
    ?>
</div>

<!--  Contenido  -->
</div><!-- /#right-panel -->

<!-- Right Panel -->

<script src="assets/js/vendor/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
<script src="assets/js/plugins.js"></script>
<script src="assets/js/main.js"></script>


</body>
</html>