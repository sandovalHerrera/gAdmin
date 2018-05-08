<?php ob_start(); ?>
<?php session_start(); ?>

<?php 

$_SESSION['usuario'] = null;
$_SESSION['tipo_u'] = null;
    
header("Location: ../index.php");

?>

