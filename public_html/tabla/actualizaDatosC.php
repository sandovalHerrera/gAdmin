
<?php 
	require_once "../includes/db.php";
	$conexion=conexion();

	$id=$_POST['idcategorias'];
	$n=$_POST['cat_nombre'];


	$sql="UPDATE categorias set cat_nombre='$n'
				where idcategorias=$id";
				
	$result=mysqli_query($conexion,$sql);



 ?>