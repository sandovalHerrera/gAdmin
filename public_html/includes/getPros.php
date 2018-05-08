<?php
    include 'db.php';
    include '../functions.php';

    $datos = json_decode(file_get_contents('php://input'),true);    
    $cat = $datos['cat'];

    $query = "SELECT idproducto,pro_nombre FROM productos
                WHERE idcategoria = {$cat} and eliminado = 0;";
    $result = mysqli_query($conn,$query);
    confirmQuery($result);
    $pros = array();
    while (($row = mysqli_fetch_array($result))) {
        $pros[$row['idproducto']] = $row['pro_nombre'];
    }
    print_r(json_encode($pros));
?>